<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Models\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (!empty(Auth::user())) {
        return redirect()->back();
    }
    // dd(Auth::user());
    return view('welcome', ['user' => User::count(['email'])]);
})->name('welcome');

Route::get('/login', function () {
    if (!empty(Auth::user())) {
        return redirect()->back();
    }

    if (DB::table('users')->count() == 0) {
        return redirect()->back();
    }
    return view('auth.login', ['title' => 'Password Manager | Login']);
})->name('login');

Route::get('/register', function () {
    $row = DB::table('users')->count();
    if ($row > 0) {
        return redirect()->route('login');
    }
    if (!empty(Auth::user())) {
        return redirect()->back();
    }
    return view('auth.register', ['title' => 'Password Manager | Register']);
})->name('register');

Route::post('/register', [AuthController::class, 'proses_register'])->name('proses-register');
Route::post('/login', [AuthController::class, 'proses_login'])->name('proses-login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index', [
            'title' => 'Password Manager | Admin Panel',
            'user' => Auth::user(),
            'passwords' => DB::table('passwords')->where('user_id', '=', Auth::user()->id)->paginate(10)
        ]);
    })->name('admin');

    Route::get('/add', function () {
        return view('admin.tambah', [
            'title' => 'Password Manager | ' . __('public.addNewPassword'),
            'user' => Auth::user()
        ]);
    })->name('admin.tambah');

    Route::get('/edit/{id}', function ($id) {
        return view('admin.edit', [
            'password' => Password::all()->where('id', '=', $id)->first(),
            'title' => 'Password Manager | Edit Password',
            'user' => Auth::user()
        ]);
    })->name('admin.edit');

    Route::post('/add', [PasswordController::class, 'tambah'])->name('admin.tambah.post');
    Route::post('/edit/{id}', [PasswordController::class, 'edit'])->name('admin.edit.post');
    Route::post('/delete/{id}', [PasswordController::class, 'hapus'])->name('admin.hapus.post');
})->middleware('auth');

Route::prefix('profile')->group(function () {
    Route::get("/", function () {
        return view('profile.index', [
            'title' => 'Password Manager | ' . __('public.myProfile'),
            'user' => Auth::user(),
        ]);
    })->name('profile');

    Route::get('/change-password', [ProfileController::class, 'ubah_password_view'])->name('profile.ubah_password_view');
    Route::post('/change-password', [ProfileController::class, 'ubah_password'])->name('profile.ubah_password');

    Route::get('/change-profile', function () {
        return view('profile.edit', [
            'title' => 'Password Manager | ' . __('public.editProfile'),
            'user' => Auth::user()
        ]);
    })->name('profile.ubah_profile_view');

    Route::post('/change-profile', [ProfileController::class, 'ubah_profile'])->name('profile.ubah_profile');
})->middleware('auth');

Route::get('lang/{locale}', [LocalizationController::class, 'set_lang'])->name('lang');
