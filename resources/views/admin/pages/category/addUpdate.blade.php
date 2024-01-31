@extends('main')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"> @if(isset($category)) Edit @else Add @endif Category</h5>
                <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary float-end"> Back </a>
            </div>
            <div class="card-body">
                @if (isset($category))
                <form method="post" class="row g-3" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @else
                    <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data" class="row g-3">
                        @endif
                        @csrf
                        <div class="col-12">
                            <label class="form-label"> Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter a category name" tabindex="-1" value="{{ old('name', $category->name ?? '') }}" />
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label"> Image</label>
                            <input type="file" name="image" class="form-control" accept=".jpg,.png,.jpeg" value="{{ old('image') }}" />
                            @if(isset($category))
                            <img src="{{ asset('/category/'.$category->image) }}" alt="{{ $category->name }}" height="150" class="d-block ms-0  rounded mt-2">
                            @endif
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 ">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            <button type="reset" class="btn btn-sm btn-label-secondary">Cancel</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection