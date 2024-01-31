@extends('main')

@section('content')
<div class="card pb-3">
    <div class="card-header">
        <h5 class="card-title mb-3">Banners List ({{ $banners->total() }}) <a href="{{ route('banner.create') }}" class="btn btn-sm btn-primary float-end"> Add New banner </a></h5>
    </div>
    <div class="card-datatable table-responsive">
        @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif

        <table id="permissionTable" class="table table-bordered table-striped">
            <thead class="border-top">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $ban)
                <tr>
                    <td>{{ $ban->id }}</td>
                    <td> {{ $ban->name }} </td>
                    <td><img src="{{ asset('/banner/'.$ban->image) }}" height="70" /> </td>
                    <td> <a href="{{ route('banner.edit', $ban->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('banner.destroy', $ban->id) }}" method="post" style="display:inline">
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
                {{ $banners->links() }}
            </ul>
        </nav>
    </div>
</div>
@endsection