<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->get();
        return view('client.contact-us.index', compact('user'));
    }

    public function createContactUs(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);
        ContactUs::create($request->all());
        return redirect()->route('home');
    }
}
