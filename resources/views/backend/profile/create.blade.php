@extends('backend.layouts.master')

@section('styles')
<style>
</style>
@endsection

@section('main-content')
<div class="page-container">
    <div class="page-title-box">
        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="font-18 mb-0">Profile Update</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Profile Setting</a></li>
                    
                    <li class="breadcrumb-item active">Profile Setting</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pt-2">
                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#profile-b1" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                <i class="ti ti-user-circle font-18 me-md-1"></i>
                                <span class="d-none d-md-inline-block">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#home-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="ti ti-lock font-18 me-md-1"></i>
                                <span class="d-none d-md-inline-block">Password</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="profile-b1">
                            <form action="{{ route('profile_update') }}" method="POST">
                                @csrf
                                <!-- @method('POST') -->
                                <div class="row g-2">
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="basiInput" class="form-label">Name</label>
                                            <input type="text"name="name" value="{{ old('name', $user->name ?? '' ) }}" class="form-control" id="basiInput" placeholder="Enter Name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">Email</label>
                                            <input type="email" name="email" value="{{ old('email', $user->email ?? '' ) }}" class="form-control" id="labelInput" placeholder="Enter Email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-xxl-3 col-md-4">
                                        <div class="form-group">
                                            <label for="basiInput" class="form-label"></label>
                                            <input type="submit" class="btn btn-purple" value="Update">
                                            <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="home-b1">
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
                                            <input type="submit" class="btn btn-purple" id="updateBtn" value="Update">
                                            <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
</div> <!-- container -->
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
