<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\Profile\AvatarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
    return view('about');
})->middleware(['auth', 'verified'])->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/member', [MemberController::class, 'index'])->name('member');
    Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
    Route::patch('/member/store', [MemberController::class, 'store'])->name('member.store');
    Route::get('/member/edit/{member}', [MemberController::class, 'edit'])->name('member.edit');
    Route::patch('/member/{member}', [MemberController::class, 'update'])->name('member.update');
    Route::delete('/member/{member}', [MemberController::class, 'delete'])->name('member.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
