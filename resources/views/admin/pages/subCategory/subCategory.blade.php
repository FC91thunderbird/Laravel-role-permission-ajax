@extends('main')

@section('content')

<div class="card pb-3">
    <div class="card-header">
        <h5 class="card-title mb-3">Sub-Category List ({{ $subcategories->total() }}) <a href="{{ route('subcategory.create') }}" class="btn btn-sm btn-primary float-end"> Add New Sub-Category </a></h5>
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

        <table id="permissionTable" class="table table-bordered table-striped">
            <thead class="border-top">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subcategories as $sub)
                <tr>
                    <td>{{ $sub->id }}</td>
                    <td> {{ $sub->name }} </td>
                    <td> {{ $sub->category->name }} </td>
                    <td>{{ $sub->slug }}</td>
                    <td><img src="{{ asset('/subcategory/'.$sub->image) }}" height="70" /> </td>
                    <td> <a href="{{ route('subcategory.edit', $sub->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('subcategory.destroy', $sub->id) }}" method="post" style="display:inline">
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
                {{ $subcategories->links() }}
            </ul>
        </nav>
    </div>
</div>

@endsection