<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\KokiController;



Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware(['auth', 'verified']);



Route::get('/', function () {
    return view('layouts.master');
})->middleware('auth');


Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

#PELANGGAN
Route::resource('pelanggan', PelangganController::class);

#MENU
Route::resource('menu', MenuController::class);
Route::get('/gambar-menu/{id}', [MenuController::class, 'tampilGambar'])->name('menu.gambar');

#PESANAN
Route::resource('/pesanan', PesananController::class);

#PEMBAYARAN
Route::resource('pembayaran', PembayaranController::class);



#PELAYANNNNN
Route::resource('pelayan', \App\Http\Controllers\PelayanController::class);


#KASIR
Route::resource('kasir', KasirController::class);

#KOKI
Route::resource('koki', KokiController::class);

#CETAK STRUK
Route::get('/pembayaran/{id}/cetak', [App\Http\Controllers\PembayaranController::class, 'cetak'])->name('pembayaran.cetak');


