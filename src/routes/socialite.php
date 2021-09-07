<?php

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\GoogleController;


// Route::get('/login/google/redirect', function () {
//     return Socialite::driver('google')->redirect();
// });

// Route::get('/login/google/callback', function () {
//     $user = Socialite::driver('google')->user();

//     // $user->token
// });

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


// Route::get('/',[PagesController::class, 'index']);