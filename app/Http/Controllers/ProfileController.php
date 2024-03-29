<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
	public function index()
	{
		return view('profile.index', [
			'title' => 'Password Manager | ' . __('public.myProfile'),
			'user' => Auth::user(),
		]);
	}

	public function ubah_password_view()
	{
		return view('profile.ubah_password', [
			'title' => 'Password Manager | Admin Panel',
			'user' => Auth::user(),
		]);
	}

	public function ubah_password(Request $request)
	{
		$request->validate([
			'password_lama' => 'required',
			'password_baru' => 'required|min:8',
			'ulangi_password' => 'required|same:password_baru'
		]);

		$user = DB::table('users')->where('id', '=', Auth::user()->id)->first();
		if (!password_verify($request->password_lama, $user->password)) {
			return redirect()->route('profile.ubah_password_view')->withErrors(['password_lama' => __('validation.custom.oldPassword.not_match')])->onlyInput();
		}

		$user = User::all()->find(Auth::user()->id);
		$user->password = $request->password_baru;
		$user->update();

		return redirect()->route('profile')->with('success', __('validation.custom.success.update', ['attribute' => 'Password']));
	}

	public function ubah_profile_view()
	{
		return view('profile.edit', [
			'title' => 'Password Manager | ' . __('public.editProfile'),
			'user' => Auth::user()
		]);
	}

	public function ubah_profile(Request $request)
	{
		$request->validate([
			'fname' => 'required',
			'email' => 'required|email',
		]);

		$user = User::all()->find(Auth::user()->id);
		$user->name = $request->fname;
		$user->email = $request->email;
		$user->update();

		return redirect()->route('profile')->with('success', __('validation.custom.success.update', ['attribute' => 'Profile']));
	}
}
