@extends('client.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('/css/client/login.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/client/product-detail.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

@endpush
@push('style')
    <style>
        div#social-links {
            max-width: 500px;
        }

        div#social-links ul li {
            display: inline-block;
        }

        div#social-links ul li a {
            padding: 10px 12px ;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 20px;
            color: #000;
        }

        .share {
            padding-left: -20px;
            font-size: 22px;
            font-weight: 700
        }
    </style>
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
                        <img class="cart__banner__img" src="{{asset( 'storage/' . $products->product_image)}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                    <div class="cart__banner__text text-left">
                        <h1 class="mb-4">{{$products->product_name }}</h1>
                        <h4 class="mt-2 per-kg">Per Kg</h4>
                        <h4 class="mt-3 mb-4 price">${{$products->product_price }}</h4>
                        <p class=" mb-4" style="font-size: 18px">{{$products->product_content }}</p>
                        <a href="{{route('add-to-cart', $products->id)}}" class="lst-btn"><i
                                class="fas fa-shopping-cart"> Add To Cart</i></a>
                        <p class="mt-3" style="font-size: 20px">
                            <strong>Categories: </strong>{{$products->category->name}}
                        </p>
                        <p class="mt-2" style="font-size: 20px">
                            <strong>Quantity: </strong>{{$products->product_quantity}}
                        </p>
                        @guest()
                            <div id="rateYo1"></div>
                        @else
                            <div id="rateYo"></div>
                            <form action="{{route('rating', $products->id)}}" method="POST" id="formSubmit">
                                @csrf
                                <input type="hidden" name="star_number" id="star_number">
                                <input type="hidden" name="product_id" id="product_id" value="{{$products->id}}">
                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
                            </form>
                            <div class="mt-3" style="display: flex">
                                <p class="mb-3 share" style="font-size: 20px">Share: </p>
                                <span id="share"> {!! $shareComponent !!}</span>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="rating-section">
            <div class="rating-section__text">
                <h3 style="font-weight: 700">Đánh Giá Sản Phẩm</h3>
                <h1 class="rating-section__text__avg-star">{{$ratingAvg}} <span> trên 5</span></h1>
                <div id="rateYoAvg"></div>
            </div>
            <div class="rating-section__user-rating">
                @foreach($ratings as $key => $rating)
                    <div class="pt-2" style="display: flex">
                        <div class="">
                            <img class="image"
                                 src="{{asset( 'storage/' . $rating->user->image)}}" alt="">
                        </div>
                        <div class="rating-section__user-rating__text">
                            <p><strong>{{$rating->user->name}}</strong></p>
                            <p>{{$rating->created_at}}</p>
                            <p id="rateYoo{{$key++}}"></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(function () {
            $("#rateYo").rateYo({
                rating: {{$ratingAvg}}
            }).on("rateyo.set", function (e, data) {
                $('#star_number').val(data.rating);
                $('#formSubmit').submit();
            });
        });

        $(function () {
            $("#rateYo1").rateYo({
                rating: {{$ratingAvg}}
            }).on("rateyo.set", function (e, data) {
                alert("Please login to continue rating");
            });
        });

        $(function () {
            $("#rateYoAvg").rateYo({
                rating: {{$ratingAvg}},
                readOnly: true,
                starWidth: "30px"
            })
        });

        $(function () {
                @for ($i = 0; $i < count($ratings); $i++) {
                $("#rateYoo" + {{$i}}).rateYo({
                    rating: {{$ratings[$i]["star_number"]}},
                    readOnly: true,
                    starWidth: "20px"
                })
            }
            @endfor
        });

    </script>
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
@endpush
