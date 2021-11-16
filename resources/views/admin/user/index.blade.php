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
    <div class="btn-option mb-3">
        <a href="{{route('user.create')}}" class="btn btn-create" style="">Create User</a>
    </div>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap mt-3" style="">
        <thead>
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                        <form action="{{route('user.destroy', $user->id)}}" method="POST">
                            <a href="{{route('user.edit', $user->id)}}" class="btn-sm btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn-sm btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}"><i class="fas fa-eye"></i></a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm btn btn-danger" ><i class="fas fa-trash-alt"></i></button>

                        </form>
                    </td>
                </tr>
                <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">User Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <img src="/image/{{ $user->image }}" width="200px" style="border-radius: 200px" class="mb-3">
                                    </div>
                                    <div class="col-md-8 mb-auto ">
                                        <div class="modal-body__text mt-2" style="margin-left: 100px">
                                            <p>Name: <span><strong> {{$user->name}}</strong></span></p>
                                            <p>Email: <span><strong> {{$user->email}}</strong></span></p>
                                            <p>Age: <span><strong> {{$user->age}}</strong></span></p>
                                            <p>Address: <span><strong> {{$user->address}}</strong></span></p>
                                            <p>Phone: <span><strong> {{$user->phone}}</strong></span></p>
                                            <p>role: <strong> {{$user->role == 1 ? "Manager" : "User"}}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
{{--    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--        Launch demo modal--}}
{{--    </button>--}}

    <!-- Modal -->

{{--    {!! $users->links() !!}--}}
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
