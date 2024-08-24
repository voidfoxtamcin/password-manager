<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function login()
	{
		if (!empty(Auth::user())) {
			return redirect()->back();
		}

		if (DB::table('users')->count() == 0) {
			return redirect()->back();
		}
		return view('auth.login', ['title' => 'Password Manager | Login']);
	}

	public function register()
	{
		$row = DB::table('users')->count();
		if ($row > 0) {
			return redirect()->route('login');
		}
		if (!empty(Auth::user())) {
			return redirect()->back();
		}
		return view('auth.register', ['title' => 'Password Manager | Register']);
	}

	public function proses_register(Request $request)
	{
		$validated = $request->validate([
			'fname' => 'required',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:8',
			'ulangi_password' => 'required|same:password|min:8'
		]);

		if ($validated) {
			$user = new \App\Models\User();

			$user->name = $request->post('fname');
			$user->email = $request->post('email');
			$user->password = Hash::make($request->post('password'));
			$user->personal_identification_number = '';
			$user->save();

			return to_route('welcome');
		}
	}

	public function proses_login(Request $request)
	{
		$validated = $request->validate([
			'email' => 'required|email',
			'password' => 'required|min:8',
		]);

		if ($validated) {
			$data = [
				'email' => $request->post('email'),
				'password' => $request->post('password'),
			];

			if (Auth::attempt($data)) {
				$request->session()->regenerate();
				return to_route('admin');
			} else {
				return to_route('login')->with('error', __('validation.custom.error.login'));
			}
		}
	}

	public function proses_simpan_pin(Request $request){
		$validated = $request->validate([
			'personal_identification_number' => 'required|numeric|max:6'
		]);

		$user = \App\Models\User::all()->find(Auth::id());
		$user->personal_identification_number = $validated['personal_identification_number'];
		$user->update();
	}

	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return to_route('welcome');
	}
}
