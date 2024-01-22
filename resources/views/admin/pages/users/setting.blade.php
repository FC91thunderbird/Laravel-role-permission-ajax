@extends('main')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">Profile</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">Security</button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                    <form id="formAccountSettings" method="post" onsubmit="return false">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" value="{{ Auth::user()->name; }}" />
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email" value="{{ Auth::user()->email; }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="language" class="form-label">Role</label>
                                <select class="select2 form-select" name="roleId">
                                    <option value="{{ Auth::user()->roleId }}">{{ ucfirst(Auth::user()->role->name) }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                    <span class="text-danger" id="errors"></span>
                    <form id="passwordResetForm" method="post" onsubmit="return false">
                    @csrf
                    <input type="hidden" name="userId" id="userId" value="{{ Auth::user()->userId }}" >
                        <div class="row">
                            <div class="mb-3 col-md-6 form-password-toggle">
                                <label class="form-label" for="currentPassword">Current Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" name="old_password"  />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                <span class="text-danger" id="old_passwordError"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6 form-password-toggle">
                                <label class="form-label" for="newPassword">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" name="new_password" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                <span class="text-danger" id="new_passwordError"></span>
                            </div>

                            <div class="mb-3 col-md-6 form-password-toggle">
                                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" name="confirm_password" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                <span class="text-danger" id="confirm_passwordError"></span>
                            </div>
                            <div class="col-12 mb-4">
                                <h6>Password Requirements:</h6>
                                <ul class="ps-3 mb-0">
                                    <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                    <li class="mb-1">At least one lowercase character</li>
                                    <li>At least one number, symbol, or whitespace character</li>
                                </ul>
                            </div>
                            <div>
                                <button type="submit" onclick="passwordReset()" class="btn btn-primary me-2">Update Password</button>
                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function passwordReset(){
        $('#old_passwordError').val('')
        $('#new_passwordError').val('')
        $('#confirm_passwordError').val('')

        var userId = $('#userId').val();
        var formData = $('#passwordResetForm').serialize();

        $.ajax({
            url: '{{ route("setting.update") }}',
            data: formData,
            method:"POST",
            success:function(res){
                if (res.success) {
                    $('#passwordResetForm')[0].reset();
                    toastr.success(response.message);
                }else{
                    $('#errors').text(res.message)
                }
            },
            error:function(error){
                console.log(error.responseJSON.errors)
                $.each(error.responseJSON.errors, function(key, value) {
                    $('#' + key + 'Error').text(value[0]);
                })
            }
        })
    }
</script>
@endsection