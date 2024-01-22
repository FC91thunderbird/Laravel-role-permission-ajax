<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
    <div class="modal-content p-3 p-md-5">
      <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body">
        <div class="text-center mb-4">
          <h3 class="role-title mb-2">Add New Permission</h3>
        </div>
        <form id="addPermissionForm" class="row g-3">
            @csrf
          <div class="col-12 mb-4">
            <label class="form-label"> Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter a role name" tabindex="-1" />
            <span class="text-danger" id="nameError"></span>
          </div>
          <div class="col-12 text-center mt-4">
            <button type="button" onclick="permissionAdd()" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function permissionAdd(){
        var formData = $('#addPermissionForm').serialize();

        $.ajax({
            url: '{{ route("permissions.store") }}',
            data: formData,
            method:"POST",
            success:function(res){
                if (res.success) {
                    $('#permissionTable').load(location.href + " #permissionTable");
                    $('#addPermissionModal').modal('hide');
                    $('#addPermissionForm')[0].reset();
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