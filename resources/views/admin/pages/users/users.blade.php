@extends('main')

@section('content')
<div class="card pb-3">
    <div class="card-header">
        <h5 class="card-title mb-3">Users List ({{ $users->total() }})<button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addUser"> Add New User </button></h5>

    </div>
    <div class="card-datatable table-responsive">
        <div class="alert alert-success d-none" role="alert" id="success"></div>
        <table id="userTable" class="table table-bordered table-striped">
            <thead class="border-top">
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role->name) }}</td>
                    <td>{{ ($user->status ===1 ? "Active" : "InActive") }}</td>
                    <td> <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">Edit</button>
                        <form method="POST" action="{{ route('users.destroy',['user'=> $user->id]) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure?')">Delete</button>
                        </form>
                    </td>

                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                            <div class="modal-content p-3 p-md-5">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="text-center mb-4">
                                        <h3 class="mb-2">Edit User Information</h3>
                                    </div>
                                    <form class="row g-3" id="userForm" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" id="userId" value="{{ $user->id }}">
                                        <div class="col-12">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" />
                                            <span id="nameError" class="text-danger"> </span>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control" value="{{ $user->email }}" />
                                            <span id="emailError" class="text-danger"> </span>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Role</label>
                                            <select name="roleId" class="select2 form-select">
                                                <option value="{{ $user->role->id }}">{{ $user->role->name }}</option>
                                                @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <span id="roleIdError" class="text-danger"> </span>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="image" class="form-control" accept="jpeg,png,jpg">
                                            <span id="imageError" class="text-danger"> </span>
                                        </div>

                                        <div class="col-12">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" {{ $role->status ? 'checked' : '' }}>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off" ></span>
                                                </span>
                                                <span class="switch-label">Active?</span>
                                            </label>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="button" class="btn btn-primary me-sm-3 me-1 userUpdate">Submit</button>
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
                {{ $users->links() }}
            </ul>
        </nav>
    </div>

    @include('admin.utility.addUserModal')

</div>

<script>
    $('.userUpdate').on('click', function() {
        var modal = $(this).closest('.modal');
        var formData = modal.find('form').serialize();

        $.ajax({
            url: '/admin/users/' + modal.find('#userId').val(),
            method: 'PUT',
            data: formData,
            success: function(response) {
                if (response.success) {
                    modal.modal('hide');
                    $('#userTable').load(location.href + " #userTable");
                    toastr.success(response.message);
                }
            },
            error: function(error) {
                $.each(error.responseJSON.errors, function(key, value) {
                    $('#' + key + 'Error').text(value[0]);
                })
            }
        });
    });
</script>
@endsection