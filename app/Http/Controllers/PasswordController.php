<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'nama_password' => 'required',
            'deskripsi_password' => 'required',
            'username' => 'required',
            'password' => 'required',
            'ulangi_password' => 'required|same:password'
        ]);

        if ($validated) {
            $password = new Password();

            $password->user_id = Auth::user()->id;
            $password->nama_password = $request->post('nama_password');
            $password->deskripsi_password = $request->post('deskripsi_password');
            $password->username = $request->post('username');
            $password->password = $request->post('password');

            $password->save();

            return to_route('admin')->with('success', __('validation.custom.success.create', ['attribute' => 'Password']));
        }
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'nama_password' => 'required',
            'deskripsi_password' => 'required',
            'username' => 'required',
            'password_lama' => 'required',
            'password_baru' => 'required',
            'ulangi_password' => 'required|same:password_baru'
        ]);

        $password_lama = Password::all()->where('id', '=', $id)->first()->password;

        if ($request->post('password_lama') != $password_lama) {
            return back()->withErrors(['password_lama' => __('validation.custom.oldPassword.not_match')])->withInput();
        }

        $password = Password::all()->find($id);
        $password->user_id = Auth::user()->id;
        $password->nama_password = $request->post('nama_password');
        $password->deskripsi_password = $request->post('deskripsi_password');
        $password->username = $request->post('username');
        $password->password = $request->post('password_baru');

        // dd($password);

        $password->update();
        return to_route('admin')->with('success', __('validation.custom.success.update', ['attribute' => 'Password']));
    }

    public function hapus(Password $password, $id = '')
    {
        $password = new Password();
        $password->destroy($id);
        return to_route('admin')->with('success', __('validation.custom.success.delete', ['attribute' => 'Password']));
    }
}
