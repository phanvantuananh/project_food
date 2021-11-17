@extends('admin.layouts.app')
@push('style')
    <style>
        .form-add-new {
            background-color: #f5f5f5;
            padding: 40px 20px;
            margin-top: 50px;
        }

        .title {
            font-size: 30px;
            color: #6f42c1;
            opacity: 0.8;
        }

        .btn-sub {
            background-color: #6f42c1;
            opacity: 0.8;
            color: #fff;
        }
    </style>
@endpush

@section('content-table')
    <div class="form-add-new">
        <form class="mt-10" action="{{route('product.update',$product->id)}}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 title">
                <label for="" class="form-label">UPDATE PRODUCT</label>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="" name="product_name"
                               placeholder="Enter product name..." value="{{$product->product_name}}">
                        @error('product_name')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Price</label>
                        <input type="text" class="form-control" id="" name="product_price"
                               placeholder="Enter product price..." value="{{$product->product_price}}">
                        @error('product_price')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            @foreach($categories as $cat)
                                <option
                                    value="{{$cat->id}}" {{$product->category->id == $cat->id ? "selected" : " "}}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('product_price')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Product Quantity</label>
                        <input type="number" class="form-control" id="" name="product_quantity"
                               placeholder="Enter product quantity..." value="{{$product->product_quantity}}">
                        @error('product_quantity')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="" name="product_image"
                               placeholder="Enter product quantity...">
                        <img src="/image/{{ $product->product_image }}" width="150px">

                    </div>
                    <div class="mb-3">
                        <label for="floatingTextarea2">Content</label>
                        <div class="form-floating mt-2">
                            <textarea class="form-control" id=""
                                      name="product_content">{{$product->product_content}}</textarea>
                        </div>
                        @error('product_content')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sub mt-2">Submit</button>
            <a href="{{route('product.index')}}" class="btn btn-sub mt-2">Back</a>
        </form>
    </div>
@endsection
@push('script')

@endpush
@push('js')

@endpush
