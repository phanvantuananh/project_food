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
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="login__section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="login__section__form">
                        <form method="post" action="">
                            @csrf
                            <div class="mb-4">
                                <label for="" class="login__section__form__title text-center">Contact Us</label>
                            </div>
                            <div class="mb-4">
                                <input type="hidden" class="form-control" value="{{Auth::id()}}" name="user_id">
                            </div>
                            <div class="mb-4">
                                <textarea class="form-control" id="" rows="6" name="content" placeholder="Enter Content..."></textarea>
                                @error('content')
                                <div class="mess-err" style="color: red; padding-left: 20px">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-outline-success login__section__form__btn-login mt-2">Submit</button>
                            <a href="{{route('home')}}" class="btn btn-outline-success login__section__form__btn-login mt-2">Back</a>
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
