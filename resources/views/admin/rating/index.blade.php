@extends('admin.layouts.app')
@push('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.0.1/date-1.1.1/r-2.2.9/sb-1.3.0/sp-1.4.0/datatables.min.css"/>
@endpush
@push('style')
    <style>
        .btn-create {
            background-color: #6f42c1;
            color: #fff;
            opacity: 0.8
        }
        .table {
            width: 100%;
            border: 1px solid #bebebf;
        }
    </style>
@endpush
@section('content-table')
    <div class="btn-option mb-3">
        <a href="{{route('rating.create')}}" class="btn btn-create" style="">Create Rating</a>
    </div>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap mt-3" style="">
        <thead>
        <tr>
            <th>Number</th>
            <th>User Code</th>
            <th>Product Code</th>
            <th>Star Number</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ratings as $rating)
            <tr>
                <td>{{$rating->id}}</td>
                <td>{{$rating->user->name}}</td>
                <td>{{$rating->product->product_name}}</td>
                <td>{{$rating->star_number}}</td>
                <td>
                    <form action="{{route('rating.destroy', $rating->id)}}" method="POST">
                        <a href="{{route('rating.edit', $rating->id)}}" class="btn-sm btn btn-success"><i
                                class="fas fa-edit"></i></a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-sm btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@push('script')
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.0.1/date-1.1.1/r-2.2.9/sb-1.3.0/sp-1.4.0/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush
@push('js')

@endpush
