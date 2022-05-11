<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use App\Notifications\MyFirstNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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
//        dd($cart);
        session()->put('cart', $cart);
        return redirect()->route('cart');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            notify()->success('success!!');
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
            notify()->success('delete success!!');
        }
    }

    public function productDetail($id)
    {
        $products = Product::findOrFail($id);
        $ratings = Rating::where('product_id', $id)->get();
        $check = Rating::where('product_id', $id)->first();
        if ($check) {
            $ratingAvg = Rating::where('product_id', $id)->avg('star_number');
        } else {
            $ratingAvg = 0;
        }
        // share product detail
        $shareComponent = \Share::page(
            'http://127.0.0.1:8000/home/shop/product-detail/' . $id,
            'Your share text comes here',
        )->facebook();
        return view('client.shop.productDetail', compact('products', 'ratingAvg', 'ratings', 'check', 'shareComponent'));
    }

    public function productRating(Request $request, $id)
    {
        $model = Rating::where($request->only('product_id', 'user_id'))->first();
        if ($model) {
            Rating::where($request->only('product_id', 'user_id'))->update($request->only('star_number'));
        } else {
            Rating::create($request->all());
        }
        notify()->success('Thanks for your review!!');
        return redirect()->route('shop');
    }

    public function checkOut()
    {
        $users = User::where('id', Auth::id())->get();
        return view('client.shop.checkOut', compact('users'));
    }

    public function addNewOrder(Request $request)
    {
        $subtotal = 0;
        $order = Orders::create($request->all());
        $products = Product::all();
        $cart = session('cart');
        foreach ($cart as $rs) {
            foreach ($products as $product) {
                if ($rs['id'] == $product->id) {
                    $quantityProduct = $product->product_quantity;
                    $quantityTotal = $quantityProduct - $rs['quantity'];
                    $model = Product::find($rs['id']);
                    $model->product_quantity = $quantityTotal;
                    $model->save();
                }
            }
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
//        dd(OrderItem::all());
        $detailData = [
            'body' => 'Hãy xác nhận đơn hàng',
            'user' => $order->order_user,
            'phone' => $order->order_phone,
            'address' => $order->order_address,
            'total' => $order->order_total,
            'text' => 'xác nhận',
            'url' => url('/home'),
            'footer' => 'Chức bạn ngon miệng',
        ];
        $users = User::where('id', Auth::id())->get();
        foreach ($users as $user) {
            Notification::send($user, new MyFirstNotification($detailData));
        }

        $request->session()->remove('cart');
        return redirect()->route('home');
    }
}
