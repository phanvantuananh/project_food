@extends('admin.layouts.app')
@push('style')
    <style>
        .form-add-new {
            background-color: #f5f5f5;
            padding: 40px 20px;
            margin-top: 50px;
        }
        .title {
            font-size: 30px;
            color: #6f42c1;
            opacity: 0.8;
        }
        .btn-sub {
            background-color: #6f42c1;
            opacity: 0.8;
            color: #fff;
        }
    </style>
@endpush

@section('content-table')
    <div class="form-add-new">
        <form class="mt-10" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('POST')
            <div class="mb-3 title">
                <label for="" class="form-label">ADD NEW USER</label>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" id="" name="name" placeholder="Enter name...">
                        @error('name')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" id="" name="email" placeholder="Enter email...">
                        @error('email')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" id="" name="password" placeholder="Enter password...">
                        @error('password')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Age</label>
                        <input type="number" class="form-control" id="" name="age" placeholder="Enter age...">
                        @error('age')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="" name="phone" placeholder="Enter phone...">
                        @error('phone')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control" id="" name="address" placeholder="Enter address...">
                        @error('address')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" class="form-control" id="" name="image">
                        @error('image')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="" name="role" value="2">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sub mt-2">Submit</button>
            <a href="{{route('user.index')}}" class="btn btn-sub mt-2">Back</a>
        </form>
    </div>
@endsection
@push('script')

@endpush
@push('js')

@endpush
