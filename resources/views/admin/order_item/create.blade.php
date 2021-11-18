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
        <form class="mt-10" action="{{route('order_item.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3 title">
                <label for="" class="form-label">ADD NEW ORDER ITEM</label>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Order code</label>
                        <select class="form-select" aria-label="Default select example" name="order_id" id="order_id">
                            @foreach($orders as $order)
                                <option value="{{$order->id}}">{{$order->order_user}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity"
                               placeholder="Enter address...">
                        @error('quantity')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Product code</label>
                        <select class="form-select" aria-label="Default select example" name="product_id" id="product_id">
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Total</label>
                        <input type="number" class="form-control" id="total" name="total"
                               placeholder="Enter role...">
                        @error('total')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sub mt-2">Submit</button>
            <a href="{{route('order_item.index')}}" class="btn btn-sub mt-2">Back</a>
        </form>
    </div>
@endsection
@push('script')

@endpush
@push('js')

@endpush
