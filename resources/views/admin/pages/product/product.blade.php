@extends('main')

@section('content')
<div class="row">
    <div class="col-xl">
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-3">Products List ({{ $products->total() }}) <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary float-end"> Add New Product </a></h5>
    </div>
    <div class="card-datatable table-responsive">
        <!-- @if (session('success'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{session('message') }}
        </div>
    @endif -->


        @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="border-top">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $prod)
                <tr>
                    <td>{{ $prod->id }}</td>
                    <td> {{ $prod->title }} </td>
                    <td> {{ $prod->category->name }} </td>
                    <td> {{ $prod->subcategory->name }} </td>
                    <td>{{ $prod->sell_price }}</td>
                    <td><img src="{{ asset('/product/'.$prod->image) }}" height="70" /> </td>
                    <td> <a href="{{ route('product.edit', $prod->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('product.destroy', $prod->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm mt-1 float-end">
                <span>Total:</span>
                {{ $products->links() }}
            </ul>
        </nav>
    </div>
</div>
    </div>
</div>
@endsection