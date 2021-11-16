@extends('admin.layouts.app')

@section('content-table')
    <div class="btn-option mb-3">
        <a href="resources/views/admin/user/create" class="btn btn-sm btn-primary">Create index</a>
    </div>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%">
        <thead>
        <tr>
            <th>Number</th>
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
            <th>Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Division</th>
            <th>Position</th>
            <th>Role</th>
            <td>Option</td>
        </tr>
        </tbody>
    </table>
@endsection
@push('script')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.0.1/date-1.1.1/r-2.2.9/sb-1.3.0/sp-1.4.0/datatables.min.css"/>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.0.1/date-1.1.1/r-2.2.9/sb-1.3.0/sp-1.4.0/datatables.min.js"></script>
@endpush
@push('js')

@endpush
