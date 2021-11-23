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
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 " style="border-right: 2px solid #a0aec0;">
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
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                <input type="text" class="form-control" name="phone"
                                       value="{{ old('name', $user->phone) }}">
                            </div>
                            <button type="submit" class="btn btn-outline-success login__section__form__btn-login mt-2">
                                Edit Profile
                            </button>
                            <a href="{{route('change-pass', [ Auth::id()])}}" class="btn btn-outline-success login__section__form__btn-login mt-2">change
                                password</a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <ul class="nav nav-pills mb-3 mt-4" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Order List
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Cart
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Favorite
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
                                                <th scope="col">Order User</th>
                                                <th scope="col">Receiver</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <th scope="row">{{++$i}}</th>
                                                    <td>{{$order->user->name}}</td>
                                                    <td>{{$order->order_user}}</td>
                                                    <td>{{$order->order_phone}}</td>
                                                    <td>{{$order->order_address}}</td>
                                                    <td>{{$order->order_email}}</td>
                                                    <td>${{$order->order_total}}</td>
                                                    <td>
                                                        @if($order->order_status == 1)
                                                            <a href="" class="btn btn-sm btn-success"
                                                               style="pointer-events: none"><i
                                                                    class="fal fa-check"></i></a>
                                                        @else
                                                            <a href="" class="btn btn-sm btn-danger"
                                                               style="pointer-events: none"><i
                                                                    class="fas fa-minus"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {!! $orders->links() !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                 aria-labelledby="pills-profile-tab">ádasda
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                 aria-labelledby="pills-contact-tab">ádas.
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
