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
        <form class="mt-10" action="{{route('category.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3 title">
                <label for="" class="form-label">ADD NEW CATEGORY</label>
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

                </div>
            </div>
            <button type="submit" class="btn btn-sub mt-2">Submit</button>
            <a href="{{route('category.index')}}" class="btn btn-sub mt-2">Back</a>
        </form>
    </div>
@endsection
@push('script')

@endpush
@push('js')

@endpush
