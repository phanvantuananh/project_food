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
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="login__section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="login__section__form">
                        <form method="POST" action="">
                            @csrf
                            <div class="mb-4">
                                <label for="" class="login__section__form__title text-center">Login</label>
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" id="" placeholder="Enter email..." name="email">
                                @error('email')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" id="password" placeholder="Enter password..." name="password">
                                @error('password')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-4 login__section__form__with">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <a href="{{ route('auth/google') }}" class="btn btn-outline-danger login__section__form__with__gg">Login with google</a>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <a href="{{route('auth/facebook')}}" class="btn btn-outline-primary login__section__form__with__fb">Login with facebook</a>
                                    </div>
                                </div>
                            </div>
                            <div class="login__section__form__text mb-3">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                        <a href="{{ route('register') }}" class="login__section__form__text__register">Create new account</a>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                        <div class="form-check">
                                            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Remember</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-outline-success login__section__form__btn-login">Login</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 login__section__contact">
                    <div class="login__section__contact__info">
                        <i class="fas fa-home"></i>
                        <div class="login__section__contact__info__text">
                            <h3>Buttonwood, California.</h3>
                            <p>Rosemead, CA 91770</p>
                        </div>
                    </div>
                    <div class="login__section__contact__info">
                        <i class="fa fa-tablet" aria-hidden="true"></i>
                        <div class="login__section__contact__info__text">
                            <h3>+1 253 565 2365</h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="login__section__contact__info">
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
