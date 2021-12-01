@extends('client.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('/css/client/login.css') }}">
@endpush
@section('content')
    <div class="header">
        <div class="container">
            <div class="header__title">
                <div class="header__title__text">
                    <p>NUTRITION & QUALITY</p>
                    <h1>Change Password</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="login__section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="login__section__form">
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="" class="login__section__form__title">Change Password</label>
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" id="" name="password" placeholder="Enter password..." >
                                @error('password')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" id="" name="password-new" placeholder="Enter new password..." >
                                @error('password-new')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" id="" name="password-new-c" placeholder="Enter new password..." >
                                @error('password-new-c')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-outline-success login__section__form__btn-login">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 login__section__contact">
                    <div class="login__section__contact__info mt-2">
                        <i class="fas fa-home"></i>
                        <div class="login__section__contact__info__text">
                            <h3>Buttonwood, California.</h3>
                            <p>Rosemead, CA 91770</p>
                        </div>
                    </div>
                    <div class="login__section__contact__info mt-3">
                        <i class="fa fa-tablet" aria-hidden="true"></i>
                        <div class="login__section__contact__info__text">
                            <h3>+1 253 565 2365</h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="login__section__contact__info mt-3">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <div class="login__section__contact__info__text">
                            <h3>support@colorlib.com</h3>
                            <p>Send us your query anytime!</p>
                        </div>
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
