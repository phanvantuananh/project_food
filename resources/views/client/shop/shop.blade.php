@extends('client.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('/css/client/login.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/client/shop.css') }}">
@endpush
@push('style')

@endpush
@section('content')
    <div class="header">
        <div class="container">
            <div class="header__title">
                <div class="header__title__text">
                    <p>NUTRITION & QUALITY</p>
                    <h1>SHOP</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="product__section">
        <div class="container">
            <div class="product__section__filter">
                <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation" style="margin-left: 10px; background-color: #F28123">
                        <a href="{{route('shop')}}" class="nav-link btn btn-primary " style="color: #fff; font-size: 18px">
                            Home
                        </a>
                    </li>
                    @foreach($categories as $category)
                        <li class="nav-item" role="presentation" style="margin-left: 10px">
                            <a href="/home/shop/category?id={{$category->id}}" class="nav-link btn btn-primary btn-cat-id">
                                {{$category->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent" style="margin-top: -30px" >
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-4 sol-sm-12 col-xs-12 text-center">
                                <div class="product__section__single__item">
                                    <div class="product__section__single__item__image">
                                        <a href="">
                                            <img src="/image/{{ $product->product_image }}" alt="">
                                        </a>
                                    </div>
                                    <h3>{{$product->product_name}}</h3>
                                    <p class="product__section__single__item__price">
                                        <span>Per kg</span> {{$product->product_price}}$</p>
                                    <a href="{{route('add-to-cart', $product->id)}}" class="product__section__single__item__cart__btn"><i
                                            class="fas fa-shopping-cart"> Add To Cart</i></a>
                                </div>
                            </div>
                        @endforeach
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
