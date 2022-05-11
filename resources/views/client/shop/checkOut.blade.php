@extends('client.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('/css/client/login.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/client/product-detail.css') }}">
@endpush
@push('style')
    <style>
        .check-out__section {
            margin: 100px 0px;
        }
    </style>
@endpush
@section('content')
    <div class="header">
        <div class="container">
            <div class="header__title">
                <div class="header__title__text">
                    <p>NUTRITION & QUALITY</p>
                    <h1>Check Out</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="check-out__section">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="" style="color: #F28123; font-weight: 700">Your cart</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @php $total = 0; $shipping = 30; $subtotal = 0; $i = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php $subtotal += $details['price'] * $details['quantity'] @endphp
                                @php $total =  $subtotal + $shipping @endphp
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0 mb-2">{{$details['name']}} <span style="background-color: #F28123; padding: 5px 10px; color: #fff; border-radius: 30px">{{$details['quantity']}}</span>
                                        </h6>
                                        <small class="text-muted">{{$details['category']}}</small>
                                    </div>
                                    <span><strong>${{$subtotal}}</strong></span>
                                </li>
                            @endforeach
                        @endif
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Shipping</span>
                            <strong>${{$shipping}}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span style="font-weight: 700; color: #F28123">Total (USD)</span>
                            <strong style="font-weight: 700; color: #F28123">${{$total}}</strong>
                        </li>
                    </ul>

                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3" style="color: #F28123; font-weight: 700">Billing address</h4>
                    <form class="needs-validation" method="POST">
                        @csrf
                        <div class="row g-3">
                            @foreach($users as $user)
                                <div class="col-12">
                                    <label for="username" class="form-label">Name</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" id="order_user"
                                               placeholder="Enter Username" name="order_user" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="username" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="text" class="form-control" id="order_email	"
                                               placeholder="Enter Email" name="order_email" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="username" class="form-label">Address</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <input type="text" class="form-control" id="order_address"
                                               placeholder="Enter Address" name="order_address" value="{{$user->address}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="username" class="form-label">Phone</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="text" class="form-control" id="order_phone"
                                               placeholder="Enter Phone" name="order_phone" value="{{$user->phone}}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" class="form-control" id="order_status" value="0" name="order_status">
                        <input type="hidden" class="form-control" id="order_total" value="{{$total}}"
                               name="order_total">
                        <input type="hidden" class="form-control" id="user_id" value="{{ Auth::id()}}" name="user_id">
                        <hr class="my-4">
                        <button class="w-100 btn btn-lg" type="submit" style="background-color: #F28123; color: #fff">
                            Continue to checkout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

@endpush
@push('js')

@endpush
