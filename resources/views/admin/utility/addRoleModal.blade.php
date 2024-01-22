<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
    <div class="modal-content p-3 p-md-5">
      <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body">
        <div class="text-center mb-4">
          <h3 class="role-title mb-2">Add New Role</h3>
          <p class="text-muted">Set role permissions</p>
        </div>
        <!-- Add role form -->
        <form id="addRoleForm" class="row g-3">
            @csrf
          <div class="col-12 mb-4">
            <label class="form-label">Role Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter a role name" tabindex="-1" />
            <span class="text-danger" id="nameError"></span>
          </div>
          <div class="col-12">
            <h5>Role Permissions</h5>
            <!-- Permission table -->
            <div class="table-responsive">
              <table class="table table-flush-spacing">
                <tbody>
                  <tr>
                    <td class="text-nowrap fw-medium">Administrator Access <i class="ti ti-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i></td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="selectAll" />
                        <label class="form-check-label" for="selectAll">
                          Select All
                        </label>
                      </div>
                    </td>
                  </tr>

                @php
                $category = ['user', 'role','permission'];
                @endphp
                 
                    @foreach($category as $cat)
                    <tr>
                        <td class="text-nowrap fw-medium">{{ ucfirst($cat). " Management" }}</td>
                        @foreach($permissions as $perms)
                        @php
                            $currentCategory = explode('-', $perms->name)[1];
                        @endphp
                        @if($currentCategory === $cat)
                        <td>
                            <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                        <input class="form-check-input" name="perms[]" type="checkbox" id="{{ $perms->name }}" value="{{ $perms->name }}" />
                                        <label class="form-check-label" for="{{ $perms->name }}">
                                            {{ $perms->name }}
                                        </label>
                                    </div>
                            </div>
                        </td>
                        @endif
                        @endforeach
                    </tr>
                    @endforeach
                    <span class="text-danger" id="permsError"></span>
                </tbody>
              </table>
            </div>
            <!-- Permission table -->
          </div>
          <div class="col-12 text-center mt-4">
            <button type="button" onclick="roleAdd()" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function roleAdd(){
        var formData = $('#addRoleForm').serialize();

        $.ajax({
            url: '{{ route("roles.store") }}',
            data: formData,
            method:"POST",
            success:function(res){
                if (res.success) {
                    $('#roleTable').load(location.href + " #roleTable");
                    $('#addRoleModal').modal('hide');
                    $('#addRoleForm')[0].reset();
                    toastr.success(response.message);
                }
            },
            error:function(error){
                $.each(error.responseJSON.errors, function(key, value) {
                    $('#' + key + 'Error').text(value[0]);
                })
            }
        })
    }
</script>