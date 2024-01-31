@extends('main')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"> @if(isset($product)) Edit @else Add @endif Product</h5>
                <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary float-end"> Back </a>
            </div>
            <div class="card-body">
                @if (isset($product))
                <form method="post" class="row g-3" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @else
                    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data" class="row g-3">
                        @endif
                        @csrf
                        <div class="col-12">
                            <label class="form-label"> Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter a title name" tabindex="-1" value="{{ old('title', $product->title ?? '') }}" />
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label"> Category Name</label>
                            <select name="cat_id" id="cat_id" class="form-control @error('cat_id') is-invalid @enderror" onchange="getSubcategories()">
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)

                                @if (isset($product))
                                <option value="{{ $cat->id }}" {{($product->cat_id==$cat->id)? 'selected':''}}>{{ $cat->name }}</option>
                                @else
                                <option value="{{ $cat->id }}" {{(old('cat_id')==$cat->id)? 'selected':''}}>{{ $cat->name }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('cat_id') <span class="text-danger">{{$message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Subcategory:</label>
                            <select name="sub_id" id="subcategory_id" class="form-control">
                            @if (isset($product))
                                @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ $product->sub_id == $subcategory->id ? 'selected' : '' }}> {{ $subcategory->name }} </option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label"> Buy Price </label>
                            <input type="number" name="buy_price" class="form-control @error('buy_price') is-invalid @enderror" value="{{ old('buy_price', $product->buy_price ?? '' ) }}">
                            @error('buy_price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Sell Price</label>
                            <input type="number" name="sell_price" class="form-control" value="{{ old('sell_price', $product->sell_price ?? '') }}">
                            @error('sell_price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">SKU</label>
                            <input type="number" name="sku" class="form-control" value="{{ old('sku', $product->sku ?? '') }}">
                            @error('sku') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control"> {{ old('description', $product->description ?? '') }}</textarea>
                            @error('description') <span class="text-danger"> {{$message}} </span>@enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label"> Image</label>
                            <input type="file" name="image" class="form-control" accept=".jpg,.png,.jpeg" value="{{ old('image') }}" />
                            @if(isset($product))
                            <img src="{{ asset('/product/'.$product->image) }}" alt="{{ $product->name }}" height="150" class="d-block ms-0  rounded mt-2">
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

<script>
    function getSubcategories() {
        var categoryId = document.getElementById('cat_id').value;
        if (categoryId) {
            $.ajax({
                url: '/admin/get-subcategories/' + categoryId,
                method: 'get',
                success: function(response) {
                    var subcategories = Array.isArray(response) ? response : [];

                    var subcategorySelect = document.getElementById('subcategory_id');
                    subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';

                    if (subcategories.length > 0) {
                        subcategories.forEach(function(subcategory) {
                            var option = document.createElement('option');
                            option.value = subcategory.id;
                            option.text = subcategory.name;
                            subcategorySelect.add(option);
                        });
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            })
        } else {
            document.getElementById('subcategory_id').innerHTML = '<option value="">Select Subcategory</option>';
        }
    }
</script>
@endsection