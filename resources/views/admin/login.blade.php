@extends('admin.layouts.dashboard')
@push('css')
    <link rel="stylesheet" href="{{ mix('/css/admin/login.css') }}">
@endpush
@section('content')
    <div class="background-page"></div>
    <div class="login-section">
        <div class="container">
            <form action="" method="POST">
                @csrf
                <div class="mb-4 mt-3 login-section__text">
                    <label for="">Login</label>
                </div>
                <div class="input-group flex-nowrap mb-4 login-section__inp">
                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-envelope"></i></span>
                    <input type="text" class="form-control" placeholder="Enter email..." name="email">
                </div>
                @error('email')
                <div class="mess-err" style="margin-top: -15px">{{ $message }}</div>
                @enderror
                <div class="input-group flex-nowrap mb-5 login-section__inp">
                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-unlock"></i></span>
                    <input type="password" class="form-control" placeholder="Enter password..." name="password">
                </div>
                @error('password')
                <div class="mess-err" style="margin-top: -35px; padding-bottom: 10px">{{ $message }}</div>
                @enderror
                <button type="submit" class=" login-section__btn">Submit</button>
            </form>
        </div>
    </div>
@endsection
@push('script')

@endpush
@push('js')

@endpush
