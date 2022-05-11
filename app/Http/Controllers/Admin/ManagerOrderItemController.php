<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class ManagerOrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $orderItems = OrderItem::with('order', 'product')->get();
        return view('admin.order_item.index', compact('orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $orders = Orders::all();
        $products = Product::all();
        return view('admin.order_item.create', compact('orders', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
            'total' => 'required',
        ]);
        OrderItem::create($request->all());
        notify()->success('Add new successfully!!');
        return redirect()->route('order_item.index');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(OrderItem $orderItem)
    {
        $orders = Orders::all();
        $products = Product::all();
        return view('admin.order_item.edit', compact('orderItem', 'orders', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'quantity' => 'required',
            'total' => 'required',
        ]);
        $orderItem->update($request->all());
        notify()->success('Update successfully!!');
        return redirect()->route('order_item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('order_item.index');
    }
}
