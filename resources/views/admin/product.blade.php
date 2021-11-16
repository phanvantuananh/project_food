@extends('admin.layouts.app')

@section('content-table')
    <div class="btn-option mb-3">
        <a href="resources/views/admin/user/create" class="btn btn-sm btn-primary">Create Product</a>
    </div>
    <table
        id="example"
        class="table table-striped table-bordered dt-responsive nowrap"
        style="width: 100%"
    >
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Division</th>
            <th>Position</th>
            <th>Role</th>
            <td>Option</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            {{--            @foreach($users as $user)--}}
            {{--                <td>{{$user->id}}</td>--}}
            {{--                <td>{{$user->name}}</td>--}}
            {{--                <td>{{$user->email}}</td>--}}
            {{--                <td>{{$user->phone}}</td>--}}
            {{--                <td>{{$user->address}}</td>--}}
            {{--                <td>--}}
            {{--                </td>--}}
            {{--            @endforeach--}}
            <td>abc</td>
            <td>abc</td>
            <td>abc</td>
            <td>abc</td>
            <td>abc</td>
            <td>abc</td>
            <td>abc</td>
        </tr>
        </tbody>
    </table>
@endsection
