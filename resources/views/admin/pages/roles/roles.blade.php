@extends('main')

@section('content')
<div class="card pb-3">
    <div class="card-header">
        <h5 class="card-title mb-3">Roles List ({{ $roles->total() }}) <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-sm btn-primary float-end"> Add New Role </button></h5>
    </div>
    <div class="card-datatable table-responsive">
        <div class="alert alert-success d-none" role="alert" id="success"></div>
        <table id="roleTable" class="table table-bordered table-striped">
            <thead class="border-top">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Status</th>
                    <th width="170px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>@if($role->perms) {{ implode(", ", $role->perms) }} @endif </td>
                    <td>Active</td>
                    <td> <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $role->id }}">Edit</button>
                        <form method="POST" action="{{ route('roles.destroy',['role'=> $role->id]) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure?')">Delete</button>
                        </form>
                    </td>
                    <!-- Edit Role -->
                    <div class="modal fade" id="editModal{{ $role->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                            <div class="modal-content p-3 p-md-5">
                                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body">
                                    <div class="text-center mb-4">
                                        <h3 class="role-title mb-2">Edit Role</h3>
                                    </div>
                                    <!-- Add role form -->
                                    <form class="row g-3" method="post" onsubmit="return false">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" id="roleId" value="{{ $role->id }}">
                                        <div class="col-12 mb-4">
                                            <label class="form-label">Role Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter a role name" tabindex="-1" value="{{ $role->name }}" />
                                            <span class="text-danger" id="nameErrors"></span>
                                        </div>
                                        <div class="col-12">
                                            <h5>Role Permissions</h5>

                                            @php
                                            $category = ['user', 'role','permission'];
                                            @endphp

                                            @foreach($category as $cat)

                                            @foreach($permissions as $perms)
                                            @php
                                            $currentCategory = explode('-', $perms->name)[1];
                                            @endphp
                                            @if($currentCategory === $cat)
                                            <div class="row">
                                                <div class="col-md-6 col-12 mb-md-0 mb-3">
                                                    <input class="form-check-input" name="perms[]" type="checkbox" id="{{ $perms->name }}" value="{{ $perms->name }}" {{ in_array($perms->name, $role->perms) ? 'checked' : '' }} />


                                                    <label class="form-check-label" for="{{ $perms->name }}">
                                                        {{ $perms->name }}
                                                    </label>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                            @endforeach
                                            <span class="text-danger" id="permsErrors"></span>
                                        </div>
                                        <div class="col-12 text-center mt-4">
                                            <button type="button" class="btn btn-primary me-sm-3 me-1 roleEdit">Submit</button>
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
                {{ $roles->links() }}
            </ul>
        </nav>
    </div>
</div>
@include('admin.utility.addRoleModal')

<script>
    $('.roleEdit').on('click', function() {
        var modal = $(this).closest('.modal');
        var formData = modal.find('form').serialize();

        $.ajax({
            url: '/admin/roles/' + modal.find('#roleId').val(),
            method: 'PUT',
            data: formData,
            success: function(response) {
                if (response.success) {
                    modal.modal('hide');
                    $('#roleTable').load(location.href + " #roleTable");
                    toastr.success(response.message);
                }
            },
            error: function(error) {
                $.each(error.responseJSON.errors, function(key, value) {
                    $('#' + key + 'Errors').text(value[0]);
                })
            }
        });
    });
</script>
@endsection