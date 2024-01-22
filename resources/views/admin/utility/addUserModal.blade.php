   <!-- Add User Modal -->
   <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
       <div class="modal-dialog modal-lg modal-simple modal-edit-user">
           <div class="modal-content p-3 p-md-5">
               <div class="modal-body">
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   <div class="text-center mb-4">
                       <h3 class="mb-2">Add User</h3>
                   </div>
                   <form class="row g-3" id="addUserForm" enctype="multipart/form-data">
                       @csrf
                       <div class="col-12">
                           <label class="form-label">Name</label>
                           <input type="text" name="name" class="form-control" placeholder="Enter Name" />
                           <span id="nameErrors" class="text-danger"> </span>
                       </div>
                       <div class="col-12 col-md-6">
                           <label class="form-label">Email</label>
                           <input type="text" name="email" class="form-control" placeholder="example@domain.com" />
                           <span class="text-danger" id="emailErrors"></span>
                       </div>
                       <div class="col-12 col-md-6">
                           <label class="form-label">Password</label>
                           <input type="password" name="password" class="form-control" placeholder="****" />
                           <span class="text-danger" id="passwordErrors"></span>
                       </div>
                       <div class="col-12 col-md-6">
                           <label class="form-label" for="modalEditUserStatus">Role</label>
                           <select name="roleId" class="select2 form-select">
                               <option value="">Select Role</option>
                               @foreach($roles as $role)
                               <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                               @endforeach
                           </select>
                           <span class="text-danger" id="roleIdErrors"></span>
                       </div>
                       <div class="col-12 col-md-6">
                           <label class="form-label">Image</label>
                           <input type="file" name="image" class="form-control">
                           <span id="imageError" class="text-danger"> </span>
                       </div>

                       <div class="col-12">
                           <label class="switch">
                               <input type="checkbox" class="switch-input">
                               <span class="switch-toggle-slider">
                                   <span class="switch-on"></span>
                                   <span class="switch-off"></span>
                               </span>
                               <span class="switch-label">Active</span>
                           </label>
                       </div>
                       <div class="col-12 text-center">
                           <button onclick="addUser()" type="button" class="btn btn-primary me-sm-3 me-1">Submit</button>
                           <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>

   <script>
       function addUser() {
           $('.text-danger').text('');
           var formData = $('#addUserForm').serialize();

           // Send AJAX request to the server
           $.ajax({
               url: '{{ route("users.store") }}',
               type: 'POST',
               data: formData,
               success: function(response) {
                   if (response.success) {
                       $('#myTable').load(location.href + " #myTable");
                       $('#addUser').modal('hide');
                       $('#addUserForm')[0].reset();
                       $('#success').removeClass('d-none')
                       $('#success').html(response.message)
                       toastr.success(response.message);
                   }
               },
               error: function(error) {
                   $.each(error.responseJSON.errors, function(key, value) {
                       $('#' + key + 'Errors').text(value[0]);
                   })
               }
           });
       }
   </script>