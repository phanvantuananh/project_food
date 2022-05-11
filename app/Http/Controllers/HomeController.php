<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function index()
    {
        $features = Product::with('rating')->get();
        $feedbacks = Rating::with('user')->where('star_number', '>', '4.5')->get();
        return view('client.home', compact('features', 'feedbacks'));
    }
}
