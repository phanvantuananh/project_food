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
                    <h1>Register</h1>
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
                                <label for="" class="login__section__form__title">Register</label>
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" id="" class="full_name" placeholder="Enter full name..." >
                            </div>
                            <div class="mb-4">
                                <input type="number" class="form-control" id="" class="age" placeholder="Enter age..." >
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" id="" class="address" placeholder="Enter address..." >
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" id="" class="email" placeholder="Enter email..." >
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" id="" class="phone" placeholder="Enter phone..." >
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" id="" class="password" placeholder="Enter password...">
                            </div>
                            <div class="mb-4">
                                <input type="file" class="form-control" id="" class="image" placeholder="Enter image...">
                            </div>
                            <div class="mb-3 login__section__form__rdo__gender">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">Female</label>
                                </div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <div class="login__section__form__text mb-3">
                                <a href="login" class="login__section__form__text__register">Exit</a>
                            </div>
                            <button type="submit" class="login__section__form__btn">Submit</button>
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
