<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManagerOrderRequest;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ManagerOrderController extends Controller
{
    /**
     */
    public function index()
    {
        $orders = Orders::with('user')->get();
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $users = User::all();
        return view('admin.order.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(ManagerOrderRequest $request)
    {
        Orders::create($request->all());
        notify()->success('Add new successfully!!');
        return redirect()->route('order_item.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     */
    public function edit(Orders $order)
    {
        $users = User::all();
        return view('admin.order.edit', compact('users', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Orders $order)
    {
        $order->update($request->all());
        notify()->success('Update successfully!!');
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Orders $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }
}
