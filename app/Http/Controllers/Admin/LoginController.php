<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function formLogin()
    {
        return view('admin.login');
    }

    public function Login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validate = validator()->make($credentials, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!$validate->validated()) {
            return redirect()->back()->withErrors($validate->errors()->first());
        }

        if (auth()->attempt($credentials)) {
//            $user = auth()->guard('admin')->user();
//            Session::put('success', 'You are Login successfully!!');
            return view('admin.index');
        }
        return redirect()->route('admin-login');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin-login');
    }
}
