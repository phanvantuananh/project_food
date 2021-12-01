<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManagerProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ManagerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
//        $categories = Category::all();
        $products = Product::with('category')->get();
//        dd($products);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**s
     * Store a newly created resource in storage.
     *
     */
    public function store(ManagerProductRequest $managerProductRequest)
    {
        $model = new Product();
        $model->fill($managerProductRequest->all());
        if ($managerProductRequest->hasFile('product_image')) {
            $newFileName = uniqid() . '-' . $managerProductRequest->product_image->getClientOriginalName();
            $path = $managerProductRequest->product_image->storeAs('public/uploads/image', $newFileName);
            $model->product_image = str_replace('public/', '', $path);
        }
        $model->save();
        notify()->success('Add new product successfully!!');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ManagerProductRequest $managerProductRequest, $id)
    {
        $model = Product::find($id);
        $model->fill($managerProductRequest->all());
        if ($managerProductRequest->hasFile('product_image')) {
            $newFileName = uniqid() . '-' . $managerProductRequest->product_image->getClientOriginalName();
            $path = $managerProductRequest->product_image->storeAs('public/uploads/image', $newFileName);
            $model->product_image = str_replace('public/', '', $path);
        }
        $model->save();
        notify()->success('Update successfully!!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
