<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;

class SocialiteAuthController extends Controller
{
    //
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        $role = 2;
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('google_id', $googleUser->id)->first();
        if ($user) {
            Auth::login($user);
        } else {
            $createUser = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'password' => Hash::make('123123123'),
                'image' => $googleUser->avatar,
                'role' => $role,
            ]);
            Auth::login($createUser);
        }
        return redirect('/home');
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        $role = 2;
        $facebookUser = Socialite::driver('facebook')->user();
        $isUser = User::where('facebook_id', $facebookUser->id)->first();

        if ($isUser) {
            Auth::login($isUser);
        } else {
            $createUser = User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'facebook_id' => $facebookUser->id,
                'password' => Hash::make('123123123'),
                'image' => $facebookUser->avatar,
                'role' => $role,
            ]);
            Auth::login($createUser);
        }
        return redirect('/home');
    }
}
