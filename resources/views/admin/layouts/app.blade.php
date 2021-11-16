<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.layouts.includes.head')
<body>
<div class="admin">
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
                <a href="/" class="sidebar__logo d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <i class="fas fa-utensils sidebar__logo__icon"></i>
                    <span class="fs-4">Manager WF</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto sidebar__menu">
                    <li class="nav-item sidebar__menu__li">
                        <a href="" class="nav-link text-white " aria-current="page">
                            <i class="fas fa-home"></i>
                            <span class="m-lg-2">Home</span>
                        </a>
                    </li>
                    <li class="nav-item sidebar__menu__li">
                        <a href="" class="nav-link text-white">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="m-lg-2">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item sidebar__menu__li">
                        <a href="#" class="nav-link text-white">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="m-lg-2">Orders</span>
                        </a>
                    </li>
                    <li class="nav-item sidebar__menu__li">
                        <a href="{{route('product')}}" class="nav-link text-white">
                            <i class="fas fa-table"></i>
                            <span class="m-lg-2">Products</span>
                        </a>
                    </li>
                    <li class="nav-item sidebar__menu__li">
                        <a href="{{route('user.index')}}" class="nav-link text-white">
                            <i class="fas fa-users"></i>
                            <span class="m-lg-2">Users</span>
                        </a>
                    </li>
                    <li class="nav-item sidebar__menu__li">
                        <a href="{{route('category.index')}}" class="nav-link text-white">
                            <i class="fas fa-book"></i>
                            <span class="m-lg-2">Categories</span>
                        </a>
                    </li>
                    <li class="nav-item sidebar__menu__li">
                        <a href="" class="nav-link text-white">
                            <i class="fas fa-star-half-alt"></i>
                            <span class="m-lg-2">Rating</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                       id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                             class="rounded-circle me-2">
                        <strong>{{ Auth::user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{route('adminLogout')}}">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10 mt-2">
            <div class="container-fluid">
                @yield('content-table')
            </div>
        </div>
    </div>
</div>
@stack('modal')
@push('script')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.0.1/date-1.1.1/r-2.2.9/sb-1.3.0/sp-1.4.0/datatables.min.css"/>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.0.1/date-1.1.1/r-2.2.9/sb-1.3.0/sp-1.4.0/datatables.min.js"></script>
@endpush
@include('admin.layouts.includes.script')
</body>
</html>
