@extends('main')

@section('content')
<div class="card pb-3">
    <div class="card-header">
        <h5 class="card-title mb-3">Permission List ({{ $permissions->total() }}) <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-sm btn-primary float-end"> Add New Permission </button></h5>
    </div>
    <div class="card-datatable table-responsive">
        <div class="alert alert-success d-none" role="alert" id="success"></div>
        <table id="permissionTable" class="table table-bordered table-striped">
            <thead class="border-top">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $perms)
                <tr>
                    <td>{{ $perms->id }}</td>
                    <td>{{ $perms->name }}</td>
                    <td>Active</td>
                    <td>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $perms->id }}" data-permission-id="{{ $perms->id }}">Edit</button>
                        <form method="POST" action="{{ route('permissions.destroy',['permission'=> $perms->id]) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure?')">Delete</button>
                        </form>
                    </td>
                    <!-- Edit Role -->
                    <div class="modal fade" id="editModal{{ $perms->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                            <div class="modal-content p-3 p-md-5">
                                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body">
                                    <div class="text-center mb-4">
                                        <h3 class="role-title mb-2">Edit Permission</h3>
                                    </div>
                                    <!-- Add role form -->
                                    <form id="editPermissionForm" class="row g-3">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" id="permissionId" value="{{ $perms->id }}">
                                        <div class="col-12 mb-4">
                                            <label class="form-label"> Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter a role name" tabindex="-1" value="{{ $perms->name }}" />
                                            <span class="text-danger" id="nameErrors"></span>
                                        </div>
                                        
                                        <div class="col-12 text-center mt-4">
                                            <button type="button"  class="btn btn-primary me-sm-3 me-1 permissionEdit">Submit</button>
                                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm mt-1 float-end">
            <span>Total:</span>
                {{ $permissions->links() }}
            </ul>
        </nav>
    </div>
</div>
@include('admin.utility.addPermissionModal')
<script>
    $(document).ready(function () {
        $('.permissionEdit').on('click', function () {
            var modal = $(this).closest('.modal');
            var formData = modal.find('form').serialize();

            $.ajax({
                url: '/admin/permissions/' + modal.find('#permissionId').val(),
                method: 'PUT',
                data: formData,
                success: function (response) {
                    if (response.success) {
                        modal.modal('hide');
                        $('#permissionTable').load(location.href + " #permissionTable");
                        toastr.success(response.message);
                    } 
                },
                error: function (error) {
                    // Handle error, display validation errors, etc.
                    console.error('Error updating permission:', error);
                }
            });
        });
    });
</script>


@endsection

