@extends('client.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('/css/client/login.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/client/information.css') }}">
@endpush
@push('style')
    <style>
        .nav-link {
            color: #F28123;
            font-weight: 700;
        }

        .nav-link:hover {
            color: #F28123;
        }

        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color: #F28123;
        }
    </style>
@endpush
@section('content')
    <div class="header">
        <div class="container">
            <div class="header__title">
                <div class="header__title__text">
                    <p>NUTRITION & QUALITY</p>
                    <h1>User Information</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="login__section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 " style="border-right: 2px solid #a0aec0;">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg"/>
                                <label for="imageUpload"><i class="fas fa-pen pen"></i></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                     style="background-image: url('{{asset( 'storage/' . $user->image)}}');">
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="mb-4">
                                <label for="" class="login__section__form__title">Update User Information</label>
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="name"
                                       value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                <input type="text" class="form-control" name="email"
                                       value="{{ old('name', $user->email) }}">
                            </div>
                            <div class="input-group mb-4">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fas fa-sort-numeric-up-alt"></i></span>
                                <input type="text" class="form-control" name="age"
                                       value="{{ old('name', $user->age) }}">
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                <input type="text" class="form-control" name="phone"
                                       value="{{ old('name', $user->phone) }}">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fas fa-map-marker-alt"></i></span>
                                <input type="text" class="form-control" name="address"
                                       value="{{ old('name', $user->address) }}">
                            </div>
                            <button type="submit" class="btn btn-outline-success login__section__form__btn-login mt-2">
                                Edit Profile
                            </button>
                            <a href="{{route('change-pass', Auth::id())}}"
                               class="btn btn-outline-success login__section__form__btn-login mt-2">change
                                password</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">

                    <ul class="nav nav-pills mb-3 mt-4" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Order List
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab">
                            <div class="login__section__form">
                                <div class="table-responsive" id="tableLstOrder" style="margin-top: 30px">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Receiver</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Details</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->orders as $order)
                                            <tr>

                                                <th scope="row">{{++$i}}</th>
                                                <td>{{$order->order_user}}</td>
                                                <td>{{$order->order_phone}}</td>
                                                <td>{{$order->order_email}}</td>
                                                <td>{{$order->order_address}}</td>
                                                <td>${{$order->order_total}}</td>
                                                <td>
                                                    @if($order->order_status == 1)
                                                        <a href="" class="btn btn-sm btn-success"
                                                           style="pointer-events: none">
                                                            <i class="fal fa-check"></i>
                                                        </a>
                                                    @else
                                                        <a href="" class="btn btn-sm btn-danger"
                                                           style="pointer-events: none">
                                                            <i class="fas fa-minus"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="" class="btn-sm btn btn-primary"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#exampleModal{{$order->id}}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{--                                        {!! $orders->links() !!}--}}
                                </div>


                                @foreach($user->orderItems as $order)
                                    <div class="modal fade" id="exampleModal{{$order->order->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Order
                                                        Details</h5>
                                                    <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-auto ">
                                                            <div class="modal-body__text mt-2">
                                                                <p>Order code:
                                                                    <span><strong> {{$order->order->id}}</strong></span>
                                                                </p>
                                                                <p>Order User:
                                                                    <span><strong> {{$order->order->order_user}}</strong></span>
                                                                </p>
                                                                <p>Order Email:
                                                                    <span><strong> {{$order->order->order_email}}</strong></span>
                                                                </p>
                                                                <p>Order Phone:
                                                                    <span><strong> {{$order->order->order_phone}}</strong></span>
                                                                </p>
                                                                <p>Order Address:
                                                                    <span><strong> {{$order->order->order_address}}</strong></span>
                                                                </p>
                                                                <p>Order date:
                                                                    <span><strong> {{$order->order->created_at}}</strong></span>
                                                                </p>
                                                                <p>Order details:</p>

                                                                <table class="table">
                                                                    <thead>
                                                                    <tr class="text-center">
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Product</th>
                                                                        <th scope="col">Quantity</th>
                                                                        <th scope="col">Price</th>
                                                                        <th scope="col">Total</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($user->orderItems as $product)
                                                                        @if($product->order_id == $order->order->id)
                                                                            <tr class="text-center">
                                                                                <th scope="row">1</th>
                                                                                <td>{{$product->product->product_name}}</td>
                                                                                <td>{{$product->quantity}}</td>
                                                                                <td>{{$product->product->product_price}}
                                                                                    $
                                                                                </td>
                                                                                <td>{{$product->total}}$</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>

                                                                <p>Shipping:
                                                                    <span><strong> 30$</strong></span>
                                                                </p>
                                                                <p>Order Total:
                                                                    <span><strong> {{$order->order->order_total}}$</strong></span>
                                                                </p>
                                                                <p>Order Status:
                                                                    <span><strong> {{$order->order->order_status==1?'Đã Nhận Hàng':'Chưa Nhận Hàng'}}</strong></span>
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function () {
            readURL(this);
        });
    </script>
@endpush
@push('js')

@endpush
