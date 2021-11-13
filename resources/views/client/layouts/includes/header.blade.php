<div class="menu__top">
    <div class="">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="menu__top__logo">
                    <a class="logo" href="{{route('home')}}" >Wow Food</a>
                </div>
                <div class="menu__top__icon__toggle">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <nav class="menu__top__main__menu">
                    <ul>
                        <li><a href="{{route('home')}}" style="color: #F28123;">Home</a></li>
                        <li><a href="">News</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="shop">Shop</a></li>
                        <li>
                            <div class="menu__top__main__menu__icons">
                                @guest()
                                    <a class="menu__top__main__menu__icons__shopping__cart" href=""><i class="fas fa-shopping-cart"></i></a>
                                    <a class="menu__top__main__menu__icons__heart" href=""><i class="fa fa-heart" aria-hidden="true"></i></a>
                                    <a href="{{ route('login') }}"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
                                @else
                                    <a class="menu__top__main__menu__icons__shopping__cart" href=""><i class="fas fa-shopping-cart"></i></a>
                                    <a class="menu__top__main__menu__icons__heart" href=""><i class="fa fa-heart" aria-hidden="true"></i></a>
                                    <a class="">{{ Auth::user()->name }}</a>
                                    <a class="nav-link" href="{{route('logout')}}">Logout</a>
                                @endguest
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>



