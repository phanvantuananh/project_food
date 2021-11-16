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
        return view('client.login');
    }

    public function customLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validate = validator()->make($credentials, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!$validate->validated()) {
            return redirect()->back()->withErrors($validate->errors()->first());
        }
        if (auth()->attempt($credentials, $request->input('remember'))) {
            return redirect('home');
        }

        return redirect()->route('login');
    }

    public function register()
    {
        return view('client.register');
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
            'image' => $registerRequest['image'],
            'role' => $registerRequest['role'],
        ]);
        return redirect('login');
    }

    public function signOut()
    {
        Auth::logout();
        return redirect('login');
    }
}
