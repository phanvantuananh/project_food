@extends('client.layouts.app')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
    <link rel="stylesheet" href="{{ mix('/css/client/home.css') }}">
@endpush
@section('content')
    <div class="header">
        <div class="container">
            <div class="header__title">
                <div class="header__title__text">
                    <p>NUTRITION & QUALITY</p>
                    <h1>Discover the flavors of wow food</h1>
                    <div class="row">
                        <div class="header__title__text__btn col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <a href="" class="header__title__text__btn__lst">Fruit Collection</a>
                        </div>
                        <div class="header__title__text__btn col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <a href="" class="header__title__text__btn__contact__us">Contact Us</a>
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
                        <h1><span style="color:#F28123">Our</span> Product</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero molestias praesentium iure optio nobis.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 sol-sm-12 col-xs-12 text-center">
                    <div class="product__section__single__item">
                        <div class="product__section__single__item__image">
                            <a href="">
                                <img src="https://technext.github.io/frutika/assets/img/products/product-img-1.jpg" alt="">
                            </a>
                        </div>
                        <h3>Strawberry</h3>
                        <p class="product__section__single__item__price"><span>Per kg</span> 85$</p>
                        <a href="" class="product__section__single__item__cart__btn"><i class="fas fa-shopping-cart"> Add To Cart</i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 sol-sm-12 col-xs-12 text-center">
                    <div class="product__section__single__item">
                        <div class="product__section__single__item__image">
                            <a href="">
                                <img src="https://technext.github.io/frutika/assets/img/products/product-img-2.jpg" alt="">
                            </a>
                        </div>
                        <h3>Strawberry</h3>
                        <p class="product__section__single__item__price"><span>Per kg</span> 85$</p>
                        <a href="" class="product__section__single__item__cart__btn"><i class="fas fa-shopping-cart"> Add To Cart</i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 sol-sm-12 col-xs-12 text-center">
                    <div class="product__section__single__item">
                        <div class="product__section__single__item__image">
                            <a href="">
                                <img src="https://technext.github.io/frutika/assets/img/products/product-img-3.jpg" alt="">
                            </a>
                        </div>
                        <h3>Strawberry</h3>
                        <p class="product__section__single__item__price"><span>Per kg</span> 85$</p>
                        <a href="" class="product__section__single__item__cart__btn"><i class="fas fa-shopping-cart"> Add To Cart</i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="product__section__btn text-center">
                        <a href="" class="product__section__btn__lst">List Product</a>
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
                        <a href="" class="cart__banner__img__cart__sale">SALE<span><br>30%</span></a>
                    </div>

                </div>
                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                    <div class="cart__banner__text text-left">
                        <h1><span style="color: #F28123">Deal</span> of the month</h1>
                        <h4>HIKAN STRWABERRY</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi adipisci asperiores voluptatibus odit veritatis rerum ad enim repellat dicta culpa exercitationem sit, facilis rem beatae veniam laborum explicabo minima soluta?</p>
                        <a href="" class="lst-btn"><i class="fas fa-shopping-cart"> Add To Cart</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end banner section --}}
    {{--  start feedback section  --}}
    <div class="feedback__section">
        <div class="container">
            <div id="carousel-slider">
                <div class="text-center">
                    <img src="https://technext.github.io/frutika/assets/img/avaters/avatar3.png" alt="">
                    <h3>Jacob Sikim </h3>
                    <h5>Local shop owner</h5>
                    <div class="feedback__section__text">
                        <p>" Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, totam voluptas non qui, earum deserunt beatae nemo delectus eveniet libero aut illum ratione amet ex incidunt eum sunt aliquid rem!"</p>
                    </div>
                    <i class="fas fa-quote-right"></i>
                </div>
                <div class="text-center">
                    <img src="https://technext.github.io/frutika/assets/img/avaters/avatar1.png" alt="">
                    <h3>Jacob Sikim </h3>
                    <h5>Local shop owner</h5>
                    <div class="feedback__section__text">
                        <p>" Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, totam voluptas non qui, earum deserunt beatae nemo delectus eveniet libero aut illum ratione amet ex incidunt eum sunt aliquid rem!"</p>
                    </div>
                    <i class="fas fa-quote-right"></i>
                </div>
                <div class="text-center">
                    <img src="https://technext.github.io/frutika/assets/img/avaters/avatar2.png" alt="">
                    <h3>Jacob Sikim </h3>
                    <h5>Local shop owner</h5>
                    <div class="feedback__section__text">
                        <p>" Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, totam voluptas non qui, earum deserunt beatae nemo delectus eveniet libero aut illum ratione amet ex incidunt eum sunt aliquid rem!"</p>
                    </div>
                    <i class="fas fa-quote-right"></i>
                </div>
            </div>
        </div>
    </div>
    {{--  end feedback section  --}}
@endsection
@push('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
    </script>
@endpush
@push('js')

@endpush
