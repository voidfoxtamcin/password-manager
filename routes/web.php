<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (!empty(Auth::user())) {
        return redirect()->back();
    }
    // dd(Auth::user());
    return view('welcome', ['user' => User::count(['email'])]);
})->name('welcome');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'proses_register'])->name('proses-register');
Route::post('/login', [AuthController::class, 'proses_login'])->name('proses-login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/', [PasswordController::class, 'index'])->name('admin');
    Route::get('/add', [PasswordController::class, 'tambah_view'])->name('admin.tambah');
    Route::get('/edit/{id}', [PasswordController::class, 'edit_view'])->name('admin.edit');
    Route::post('/add', [PasswordController::class, 'tambah'])->name('admin.tambah.post');
    Route::post('/edit/{id}', [PasswordController::class, 'edit'])->name('admin.edit.post');
    Route::post('/delete/{id}', [PasswordController::class, 'hapus'])->name('admin.hapus.post');
})->middleware('auth');

Route::prefix('profile')->group(function () {
    Route::get("/", [ProfileController::class, 'index'])->name('profile');
    Route::get('/change-password', [ProfileController::class, 'ubah_password_view'])->name('profile.ubah_password_view');
    Route::get('/change-profile', [ProfileController::class, 'ubah_profile_view'])->name('profile.ubah_profile_view');
    Route::post('/change-password', [ProfileController::class, 'ubah_password'])->name('profile.ubah_password');
    Route::post('/change-profile', [ProfileController::class, 'ubah_profile'])->name('profile.ubah_profile');
})->middleware('auth');

Route::get('lang/{locale}', [LocalizationController::class, 'set_lang'])->name('lang');
