@extends('client.layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('/css/client/login.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/client/shop.css') }}">
@endpush
@push('style')

@endpush
@section('content')
    <div class="header">
        <div class="container">
            <div class="header__title">
                <div class="header__title__text">
                    <p>NUTRITION & QUALITY</p>
                    <h1>CART</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-section">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-8 table-responsive">
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:10%">#</th>
                            <th style="width:20%">Image</th>
                            <th style="width:20%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:8%">Quantity</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $total = 0; $shipping = 30; $subtotal = 0; $i = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php $subtotal += $details['price'] * $details['quantity'] @endphp
                                @php $total =  $subtotal + $shipping @endphp
                                <tr data-id="{{ $id }}">
                                    <td>{{++$i}}</td>
                                    <td data-th="image">
                                        <img src="{{asset( 'storage/' . $details['image'])}}" width="50" class=""/>
                                    </td>
                                    <td data-th="name">{{$details['name']}}</td>
                                    <td data-th="Price">${{ $details['price'] }}</td>
                                    <td data-th="Quantity">
                                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart"/>
                                    </td>
                                    <td data-th="Subtotal" class="text-center">
                                        ${{ $details['price'] * $details['quantity'] }}
                                    </td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm remove-from-cart"><i
                                                class="far fa-window-close"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3 cart-section__total">
                    <div class="total">
                        <table class="table">
                            <thead class=" table-light">
                            <tr>
                                <th scope="col">Total</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th class="pt-3 pb-3">Subtotal:</th>
                                <th class="pt-3 pb-3">${{ $subtotal }}</th>
                            </tr>
                            <tr>
                                <th class="pt-3 pb-3">Shipping:</th>
                                <th class="pt-3 pb-3">${{ $shipping }}</th>
                            </tr>
                            <tr>
                                <th class="pt-3 pb-3"><h5 style="color: #F28123; font-weight: 700;">Total:</h5></th>
                                <th class="pt-3 pb-3">${{ $total }}</th>
                            </tr>
                            </tbody>
                            <tfoot style="border-top: none">
                            <tr>
                                <td colspan="5" class="text-right">
                                    <a href="{{ route('shop') }}" class="btn btn-warning"><i
                                            class="fa fa-angle-left"></i>
                                        Continue Shopping</a>
                                    <a href="{{route('check-out')}}" class="btn btn-success">
                                        CheckOut
                                    </a>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(".update-cart").change(function (e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).parents("tr").attr("data-id"),
                    quantity: $(this).parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: $(this).parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endpush
@push('js')

@endpush
