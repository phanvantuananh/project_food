<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function index()
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

        if (auth()->guard('admin')->attempt($credentials)) {
//            $user = auth()->guard('admin')->user();
//            Session::put('success', 'You are Login successfully!!');
            return redirect()->route('dashboard');
        }
        return redirect()->route('admin');
    }
}
