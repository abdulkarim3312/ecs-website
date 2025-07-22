@extends('backend.layouts.master')

@section('main-content')
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Profile Password</h5>
                        </div>
                        <div class="card-body">
                            <div class="live-preview">
                            <form id="passwordForm" name="passwordForm" method="POST" data-parsley-validate data-parsley-focus="first">
                                    @csrf
                                    <div class="row g-2">
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="basiInput" class="form-label">Old Password</label>
                                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="labelInput" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-4">
                                            <div>
                                                <label for="labelInput" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-xxl-3 col-md-4">
                                            <div class="form-group">
                                                <label for="basiInput" class="form-label"></label>
                                                <input type="submit" class="btn btn-primary" id="updateBtn" value="Update">
                                                <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div> <!-- end .h-100-->
    </div> <!-- end col -->
</div>
@endsection
@section('scripts')
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // update password
        $('#updateBtn').click(function (e) {
            e.preventDefault();
            let formData = {
                old_password: $('#passwordForm input[name="old_password"').val(),
                password: $('#passwordForm input[name="password"').val(),
                password_confirmation: $('#passwordForm input[name="password_confirmation"').val(),
            };
           
            $.ajax({
                data: formData,
                type: "POST",
                url: "{{ route('update_password') }}",
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if(response.success){
                       toastr.success(response.message); 
                    }else{
                        toastr.error(response.message); 
                    }
                    
                },
                error: function (error) {
                    $.each(error.responseJSON.errors, function(index, value){
                        toastr.error(value);
                    })
                }
            });
        });
        
    });
</script>
@endsection
