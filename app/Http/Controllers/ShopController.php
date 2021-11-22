<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('client.shop.shop', compact('products'));
    }

    public function lstProduct(Request $request)
    {
        $categoryIds = explode(',', $request->get('id'));
        $products = Product::whereHas('category', function ($query) use ($categoryIds) {
            $query->whereIn('id', $categoryIds);
        })->get();
        return view('client.shop.shop', compact('products'));
    }

    public function cart()
    {
        return view('client.shop.cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->product_name,
                'quantity' => 1,
                'price' => $product->product_price,
                'image' => $product->product_image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('cart');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
