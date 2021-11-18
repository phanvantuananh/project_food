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
        <form class="mt-10" action="{{route('order.update', $order->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 title">
                <label for="" class="form-label">ADD NEW ORDER</label>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">User Id</label>
                        <select class="form-select" aria-label="Default select example" name="user_id" id="user_id">
                            @foreach($users as $user)
                                <option value="{{$user->id}}" {{$order->user->id == $user->id ? "selected" : " "}}>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Order Status</label>
                        <select class="form-select" aria-label="Default select example" name="order_status" id="order_status">
                            <option value="{{$order->order_status}}" selected>{{$order->order_status == 1?"Done":"Pending"}}</option>
                            <option value="0">Pending</option>
                            <option value="1">Done</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">order_user</label>
                        <input type="text" class="form-control" id="order_user" name="order_user"
                               placeholder="Enter order user" value="{{$order->order_user}}">
                        {{--                        @error('password')--}}
                        {{--                        <div class="mess-err">{{ $message }}</div>--}}
                        {{--                        @enderror--}}
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">order_email</label>
                        <input type="text" class="form-control" id="order_email" name="order_email"
                               placeholder="Enter age..." value="{{$order->order_email}}">
                        {{--                        @error('age')--}}
                        {{--                        <div class="mess-err">{{ $message }}</div>--}}
                        {{--                        @enderror--}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">order_phone</label>
                        <input type="text" class="form-control" id="order_phone" name="order_phone"
                               placeholder="Enter phone..." value="{{$order->order_phone}}">
                        {{--                        @error('phone')--}}
                        {{--                        <div class="mess-err">{{ $message }}</div>--}}
                        {{--                        @enderror--}}
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">order_address</label>
                        <input type="text" class="form-control" id="order_address" name="order_address"
                               placeholder="Enter address..." value="{{$order->order_address}}">
                        {{--                        @error('address')--}}
                        {{--                        <div class="mess-err">{{ $message }}</div>--}}
                        {{--                        @enderror--}}
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">order_total</label>
                        <input type="number" class="form-control" id="order_total" name="order_total"
                               placeholder="Enter role..." value="{{$order->order_total}}">
                        {{--                        @error('role')--}}
                        {{--                        <div class="mess-err">{{ $message }}</div>--}}
                        {{--                        @enderror--}}
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sub mt-2">Submit</button>
            <a href="{{route('order.index')}}" class="btn btn-sub mt-2">Back</a>
        </form>
    </div>
@endsection
@push('script')

@endpush
@push('js')

@endpush
