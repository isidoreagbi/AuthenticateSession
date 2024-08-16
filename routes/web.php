<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    if (Auth::check())
        return redirect()->route('dashboard');

    return view('login');
})->name('login');

Route::get('/login', function () {

    if (Auth::check())
        return redirect()->route('dashboard');

    return view('login');
})->name('login');

Route::get('/registration', function () {

    if (Auth::check())
        return redirect()->route('dashboard');

    return view('registration');
})->name('registration');



Route::get('/forgotten-password', function () {

    if (Auth::check()) 
        return redirect()->route('dashboard');

    return view('forgottenPassword');

})->name('forgottenPassword');

Route::get('/otp-code', function () {

    if (Auth::check()) 
        return redirect()->route('dashboard');

    return view('otp');

})->name('otpCode');

Route::get('/new-password', function () {

    if (Auth::check()) 
        return redirect()->route('dashboard');

    return view('newPassword');

})->name('newPassword');



Route::get('/logout', function () {

    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration.process');
Route::post('/forgotten-password', [AuthController::class, 'forgottenPassword'])->name('forgottenPassword.process');
Route::post('/otp-code', [AuthController::class, 'checkOtpCode'])->name('checkOtpCode.process');
Route::post('/new-password', [AuthController::class, 'newPassword'])->name('newPassword.process');


