@extends('admin.layouts.app')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.0.1/date-1.1.1/r-2.2.9/sb-1.3.0/sp-1.4.0/datatables.min.css"/>
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
        .modal-dialog {
            max-width: 700px;
        }

    </style>
@endpush
@section('content-table')

    <table id="example" class="table table-striped table-bordered dt-responsive nowrap mt-3" style="">
        <thead>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contactUs as $cs)
            <tr>
                <td>{{$cs->id}}</td>
                <td>{{$cs->user->name}}</td>
                <td>{{$cs->content}}</td>
                <td>
                    <form action="{{route('contact_us.destroy', $cs->id)}}" method="POST">
                       @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-sm btn btn-danger" ><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@push('script')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.0.1/date-1.1.1/r-2.2.9/sb-1.3.0/sp-1.4.0/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
@push('js')

@endpush
