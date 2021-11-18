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
        <form class="mt-10" action="{{route('order.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3 title">
                <label for="" class="form-label">ADD NEW ORDER</label>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Account</label>
                        <select class="form-select" aria-label="Default select example" name="user_id" id="user_id">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Order Status</label>
                        <select class="form-select" aria-label="Default select example" name="order_status"
                                id="order_status">
                            <option value="0">Pending</option>
                            <option value="1">Done</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Order User</label>
                        <input type="text" class="form-control" id="order_user" name="order_user"
                               placeholder="Enter password...">
                        @error('order_user')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Order Email</label>
                        <input type="text" class="form-control" id="order_email" name="order_email"
                               placeholder="Enter age...">
                        @error('order_email')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Order Phone</label>
                        <input type="text" class="form-control" id="order_phone" name="order_phone"
                               placeholder="Enter phone...">
                        @error('order_phone')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Order Address</label>
                        <input type="text" class="form-control" id="order_address" name="order_address"
                               placeholder="Enter address...">
                        @error('order_address')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Order Total</label>
                        <input type="number" class="form-control" id="order_total" name="order_total"
                               placeholder="Enter role...">
                        @error('order_total')
                        <div class="mess-err">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sub mt-2">Submit</button>
            <a href="{{route('order.index')}}" class="btn btn-sub mt-2">Back</a>
        </form>
    </div>
@endsection
@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('change', '#user_id', function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('order.store') }}",
                data: {id: id},
                type: "GET",
                dataType: 'json',
                success: function (res) {
                    $('#order_user').val(res.name);
                    $('#order_address').val(res.address);
                    $('#order_phone').val(res.phone);
                    $('#order_email').val(res.email);
                    console.log({res})
                }
            })
        })
    </script>
@endpush
@push('js')

@endpush
