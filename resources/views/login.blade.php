@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('/css/login.css') }}">
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
                        <form>
                            <div class="mb-4">
                                <label for="" class="login__section__form__title">Login</label>
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" id="" placeholder="Enter email..." >
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" id="" placeholder="Enter password...">
                            </div>
                            <div class="mb-4 login__section__form__with">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <a href="{{ route('auth/google') }}" class="btn btn-outline-danger login__section__form__with__gg">Login with google</a>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <a href="" class="btn btn-outline-primary login__section__form__with__fb">Login with facebook</a>
                                    </div>
                                </div>
                            </div>
                            <div class="login__section__form__text mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="register" class="login__section__form__text__register">Create new account</a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
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