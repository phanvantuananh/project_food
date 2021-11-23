@extends('client.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('/css/client/login.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/client/product-detail.css') }}">
@endpush
@push('style')

@endpush
@section('content')
    <div class="header">
        <div class="container">
            <div class="header__title">
                <div class="header__title__text">
                    <p>NUTRITION & QUALITY</p>
                    <h1>Product Detail</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="cart__banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                    <div>
                        <img class="cart__banner__img" src="/image/{{$products->product_image}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                    <div class="cart__banner__text text-left">
                        <h1 class="mb-4">{{$products->product_name }}</h1>
                        <h4 class="mt-2 per-kg">Per Kg</h4>
                        <h4 class="mt-3 mb-4 price">${{$products->product_price }}</h4>
                        <p class=" mb-4">{{$products->product_content }}</p>
                        <a href="{{route('add-to-cart', $products->id)}}" class="lst-btn"><i class="fas fa-shopping-cart"> Add To Cart</i></a>
                        <p class="mt-3"><strong>Categories: </strong>{{$products->category->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

@endpush
@push('js')

@endpush
