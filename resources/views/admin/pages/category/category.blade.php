@extends('main')

@section('content')
<div class="card pb-3">
    <div class="card-header">
        <h5 class="card-title mb-3">Category List ({{ $categories->total() }}) <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary float-end"> Add New Category </a></h5>
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
                    <th>Slug</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td> {{ $category->name }} </td>
                    <td>{{ $category->slug }}</td>
                    <td><img src="{{ asset('/category/'.$category->image) }}" height="70" /> </td>
                    <td> <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="post" style="display:inline">
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
                {{ $categories->links() }}
            </ul>
        </nav>
    </div>
</div>
@endsection