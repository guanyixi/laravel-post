<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $home = '/dashboard';

            $user = Socialite::driver('google')->user();

            // dd($user->user);

            $hubUser = User::where('email', $user->email)->first();

            if ($hubUser) {

                Auth::login($hubUser);

                return redirect($home);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'first_name' => $user->user['given_name'],
                    'last_name' => $user->user['family_name'],
                    'avatar' => $user->avatar,
                    'email' => $user->email,
                ]);

                Auth::login($newUser);

                return redirect($home);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
