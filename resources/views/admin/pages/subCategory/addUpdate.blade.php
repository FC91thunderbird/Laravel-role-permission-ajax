@extends('main')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"> @if(isset($subcategory)) Edit @else Add @endif Sub-category</h5>
                <a href="{{ route('subcategory.index') }}" class="btn btn-sm btn-primary float-end"> Back </a>
            </div>
            <div class="card-body">
                @if (isset($subcategory))
                <form method="post" class="row g-3" action="{{ route('subcategory.update', $subcategory->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @else
                    <form method="post" action="{{ route('subcategory.store') }}" enctype="multipart/form-data" class="row g-3">
                        @endif
                        @csrf
                        <div class="col-12">
                            <label class="form-label"> Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter a subcategory name" tabindex="-1" value="{{ old('name', $subcategory->name ?? '') }}" />
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label"> Category Name</label>
                            <select name="cat_id" class="form-control @error('cat_id') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)

                                @if (isset($subcategory))
                                <option value="{{ $cat->id }}" {{($subcategory->cat_id==$cat->id)? 'selected':''}}>{{ $cat->name }}</option>
                                @else
                                <option value="{{ $cat->id }}" {{(old('cat_id')==$cat->id)? 'selected':''}}>{{ $cat->name }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('cat_id') <span class="text-danger">{{$message }}</span>  @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label"> Image</label>
                            <input type="file" name="image" class="form-control" accept=".jpg,.png,.jpeg" value="{{ old('image') }}" />
                            @if(isset($subcategory))
                            <img src="{{ asset('/subcategory/'.$subcategory->image) }}" alt="{{ $subcategory->name }}" height="150" class="d-block ms-0  rounded mt-2">
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