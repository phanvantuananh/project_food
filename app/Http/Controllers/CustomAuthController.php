<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    public function customLogin(RegisterRequest $registerRequest)
    {
        $remember = $registerRequest['remember'];
        $email = $registerRequest['email'];
        $password = $registerRequest['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
             return redirect('home');
        }
        return redirect('login');
    }

    public function register()
    {
        return view('register');
    }

    public function customRegister(RegisterRequest $registerRequest)
    {
        $user = User::Create([
            'name' => $registerRequest['name'],
            'email' => $registerRequest['email'],
            'password' => Hash::make($registerRequest['password']),
            'age' => $registerRequest['age'],
            'address' => $registerRequest['address'],
            'phone' => $registerRequest['phone'],
            'image' => $registerRequest['image']
        ]);
        return redirect('login');
    }

    public function signOut()
    {
        Auth::logout();
        return redirect('home');
    }
}
