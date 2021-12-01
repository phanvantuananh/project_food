<div class="menu__top">
    <div class="">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="menu__top__logo">
                    <a class="logo" href="{{route('home')}}" style="list-style: none; color: #fff">Wow Food</a>
                </div>
                <div class="menu__top__icon__toggle">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <nav class="menu__top__main__menu">
                    <ul>
                        <li><a href="{{route('home')}}" style="color: #F28123;">Home</a></li>
                        <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                        <li><a href="{{route('shop')}}">Shop</a></li>
                        @guest()
                            <li ><a href="{{ route('login') }}" class="li-login">Login</a></li>
                            <li ><a href="" class="li-cart">Cart</a></li>
                        @else
                            <li><a href="{{route('cart')}}">Cart</a></li>
                            <li><a href="{{route('user-information', [ Auth::id()])}}">{{ Auth::user()->name }}</a></li>
                            <a class="nav-link" href="{{route('logout')}}" style="color: #F28123"><i class="fas fa-sign-out-alt"></i></a>
                        @endguest
                        <li>
                            <div class="menu__top__main__menu__icons">
                                @guest()
                                    <a class="menu__top__main__menu__icons__shopping__cart" href=""><i class="fas fa-shopping-cart"></i></a>
                                    <a href="{{ route('login') }}"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
                                @else
                                    <a class="menu__top__main__menu__icons__shopping__cart" href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i></a>
                                    <a class="" href="{{route('user-information', [ Auth::id()])}}">{{ Auth::user()->name }}</a>
                                    <a class="nav-link" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i></a>
                                @endguest
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>



