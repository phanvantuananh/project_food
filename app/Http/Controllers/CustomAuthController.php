<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Orders;
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
        $model = new User();
        $model->fill($registerRequest->all());
        $model->password = Hash::make($registerRequest['password']);
        if ($registerRequest->hasFile('image')) {
            $newFileName = uniqid() . '-' . $registerRequest->image->getClientOriginalName();
            $path = $registerRequest->image->storeAs('public/uploads/image', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect('login');
    }

    public function signOut()
    {
        Auth::logout();
        return redirect('login');
    }

    public function userViewInfo(Request $request, $id)
    {
        $user = User::find($id);
        $orders = Orders::where('user_id', $id)->get();
        return view('client.user-information.information', compact('user', 'orders'));
    }

    public function updateUserInformation(Request $request, $id)
    {
        $model = User::find($id);
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/uploads/image', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect()->route('home');
    }

    public function viewChangePassword($id)
    {
        $user = User::find($id);
        return view('client.user-information.changePass', compact('user'));
    }

    public function changePassword(Request $request, $id)
    {
        $model = User::find($id);
        $validate = $request->validate([
            'password' => 'required',
            'password-new' => 'required',
            'password-new-c' => 'required',
        ]);
//        dd(Hash::check($request['password'], $model->password));
        if (Hash::check($request['password'], $model->password)) {
            if ($request['password-new'] == $request['password-new-c']) {
                $model->password = Hash::make($request['password-new']);
            }
        }
        $model->save();
        return redirect()->route('logout');
    }
}
