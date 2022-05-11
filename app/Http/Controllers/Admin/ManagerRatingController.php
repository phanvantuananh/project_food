<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $ratings = Rating::all();
        return view('admin.rating.index', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('admin.rating.create', compact('users', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'star_number' => 'required',
        ]);
        Rating::create($request->all());
        return redirect()->route('rating.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Rating $rating)
    {
        $users = User::all();
        $products = Product::all();
        return view('admin.rating.edit', compact('rating', 'users', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Rating $rating)
    {
        $request->validate([
            'star_number' => 'required',
        ]);
        $rating->update($request->all());
        notify()->success('Update successfully!!');
        return redirect()->route('rating.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Rating $rating)
    {
        $rating->delete();
        return redirect()->route('rating.index');
    }
}
