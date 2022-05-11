@extends('client.layouts.app')
@push('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"/>
    <link rel="stylesheet" href="{{ mix('/css/client/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
@endpush
@section('content')
    <div class="header">
        <div class="container">
            <div class="header__title">
                <div class="header__title__text">
                    <p>NUTRITION & QUALITY</p>
                    <h1>Discover the flavors of wow food</h1>
                    <div class="row">
                        <div class="header__title__text__btn col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-2">
                            <a href="{{route('shop')}}" class="header__title__text__btn__lst">Fruit Collection</a>
                        </div>
                        <div class="header__title__text__btn col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-2">
                            <a href="{{route('contact-us')}}" class="header__title__text__btn__contact__us">Contact
                                Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- start list section -->
    <div class="list__section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="list__section__shipping">
                        <i class="fas fa-shipping-fast" aria-hidden="true"></i>
                        <div class="list__section__shipping__text">
                            <h3>Free Shipping</h3>
                            <p>When order over $75</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="list__section__phone">
                        <i class="fas fa-phone-volume" aria-hidden="true"></i>
                        <div class="list__section__phone__text">
                            <h3>24/7 Support</h3>
                            <p>Get support all day</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="list__section__load">
                        <i class="fas fa-sync" aria-hidden="true"></i>
                        <div class="list__section__load__text">
                            <h3>Refund</h3>
                            <p>Get refund within 3 days!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end list section -->
    <!-- start list product section -->
    <div class="product__section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="product__section__title">
                        <h1><span style="color:#F28123">Featured</span> Product</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero molestias praesentium iure
                            optio nobis.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($features as $featured)
                    @if($featured->rating->avg('star_number') > 3.6)
                        <div class="col-lg-4 col-md-4 sol-sm-12 col-xs-12 text-center">
                            <div class="product__section__single__item">
                                <div class="product__section__single__item__image">
                                    <a href="{{route('product-detail',$featured->id)}}">
                                        <img src="{{asset( 'storage/' . $featured->product_image)}}" alt="">
                                    </a>
                                </div>
                                <h3>{{$featured->product_name}}</h3>
                                <p class="product__section__single__item__price">
                                    <span>Per kg</span> {{$featured->product_price}}$</p>
                                <a href="{{route('add-to-cart', $featured->id)}}"
                                   class="product__section__single__item__cart__btn"><i class="fas fa-shopping-cart">
                                        Add To
                                        Cart</i></a>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="product__section__btn text-center">
                            <a href="{{route('shop')}}" class="product__section__btn__lst">List Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end list product section -->
    <!-- start banner section -->
    <div class="cart__banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                    <div class="cart__banner__img">
                        <img src="https://technext.github.io/frutika/assets/img/a.jpg" alt="">
                        {{--                        <a href="" class="cart__banner__img__cart__sale">SALE<span><br>30%</span></a>--}}
                    </div>

                </div>
                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                    <div class="cart__banner__text text-left">
                        <h1><span style="color: #F28123">Deal</span> of the month</h1>
                        <h4>HIKAN STRWABERRY</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi adipisci asperiores
                            voluptatibus odit veritatis rerum ad enim repellat dicta culpa exercitationem sit,
                            facilis rem beatae veniam laborum explicabo minima soluta?</p>
                        {{--                        <a href="" class="lst-btn"><i class="fas fa-shopping-cart"> Add To Cart</i></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end banner section --}}
    {{--  start feedback section  --}}
    <div class="feedback__section mb-5" >
        <div class="container">
            <div id="carousel-slider">
                @foreach($feedbacks as $key => $featured)
                    <div class="text-center">
                        <img src="{{asset( 'storage/' . $featured->user->image)}}" alt="" width="100">
                        <h3>{{$featured->user->name}}</h3>
                        {{--                            <h5>{{$featured->star_number}}</h5>--}}
                        <p id="rateYoo{{$key++}}" style="text-align: center; margin: 0 auto"></p>
                        <div class="feedback__section__text">
                            <p>" Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, totam
                                voluptas non qui, earum deserunt beatae nemo delectus eveniet libero aut illum
                                ratione amet ex incidunt eum sunt aliquid rem!"</p>
                        </div>
                        <i class="fas fa-quote-right"></i>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--  end feedback section  --}}
@endsection
@push('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
            type="text/javascript"></script>
    <!-- Calling jQuery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Calling Slick Library -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $("#carousel-slider").slick({
            arrows: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            mobileFirst: true
        });

        $(function () {
                @for ($i = 0; $i < count($feedbacks); $i++) {
                $("#rateYoo" + {{$i}}).rateYo({
                    rating: {{$feedbacks[$i]["star_number"]}},
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
