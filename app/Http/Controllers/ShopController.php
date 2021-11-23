<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

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
                'id' => $product->id,
                'name' => $product->product_name,
                'quantity' => 1,
                'price' => $product->product_price,
                'image' => $product->product_image,
                'category' => $product->category->name,
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

    public function productDetail($id)
    {
        $products = Product::findOrFail($id);
        return view('client.shop.productDetail', compact('products'));
    }

    public function checkOut()
    {
        $users = User::where('id', Auth::id())->get();
        return view('client.shop.checkOut', compact('users'));
    }

    public function AddNewOrder(Request $request)
    {
        $subtotal = 0;
        $order = Orders::create($request->all());
        $cart = session('cart');
        foreach ($cart as $rs) {
            $subtotal += $rs['price'] * $rs['quantity'];
            $quantity = $rs['quantity'];
            $productId = $rs['id'];
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $quantity,
                'total' => $subtotal,
            ]);
        }
        $request->session()->remove('cart');
        return redirect()->route('home');
    }
}
