@extends('backend.layouts.master')

@section('styles')
<style>
    .select2-container .select2-selection--single {
        height: 38px !important;  /* Adjust height as needed */
        padding: 10px !important;
        font-size: 16px; /* Adjust text size */
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 6px!important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 18px!important;
    }
    .form-control {
        border: 1px solid rgba(0, 0, 0, 0.3); /* Always show light black border */
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-control:focus {
        border-color: #007bff; /* Stronger blue */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.6); /* Bigger and more visible glow */
        outline: none;
    }
</style>
@endsection

@section('main-content')
<div class="page-container">
    <div class="page-title-box">
        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="font-18 mb-0">Dashboard</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
                    
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Navigation</a></li>
                    
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">
                        <i class="fa-solid fa-users me-2 text-primary"></i>
                        Edit Role
                    </h4>
                    <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm btn-back">
                        <i class="fas fa-arrow-left me-2"></i> Back to Role
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Role Name -->
                        <div class="row mb-3">
                            <label for="roleName" class="col-12 col-md-2 col-form-label">Name</label>
                            <div class="col-12 col-md-10">
                                <input type="text" name="name" value="{{ old('name', $role->name ?? '') }}" class="form-control" id="roleName" placeholder="Enter Role Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        @php
                            $allChecked = $permissions->flatten()->count() > 0 && $permissionNames && $permissions->flatten()->every(function($perm) use ($permissionNames) {
                                return in_array($perm->name, $permissionNames);
                            });
                        @endphp

                        <!-- Global Check All -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" id="checkAll" class="form-check-input" {{ $allChecked ? 'checked' : '' }}>
                                    <label class="form-check-label" for="checkAll">Check All Permissions</label>
                                </div>
                            </div>
                        </div>

                        <!-- Module-wise Permissions (Left module name, right permissions) -->
                        <div class="row gy-3 mt-1">
                            @foreach ($permissions as $module => $modulePermissions)
                                <div class="col-12 border rounded p-2 mb-2 d-flex align-items-start">
                                    <!-- Module Name (left) -->
                                    <div class="col-12 col-md-2 fw-bold text-primary">
                                        {{ ucfirst($module) }}
                                    </div>

                                    <!-- Permissions checkboxes (right) -->
                                    <div class="col-12 col-md-10">
                                        <div class="row">
                                            @foreach ($modulePermissions as $permission)
                                                <div class="col-6 col-md-3">
                                                    <div class="form-check mt-1">
                                                        <input type="checkbox"
                                                            name="permissions[]"
                                                            class="form-check-input permission-checkbox"
                                                            id="permission-{{ $permission->id }}"
                                                            value="{{ $permission->name }}"
                                                            {{ in_array($permission->name, $permissionNames) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="permission-{{ $permission->id }}">
                                                            {{ str_replace('_', ' ', $permission->name) }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Submit -->
                        <div class="text-start mt-3 d-flex gap-2 flex-wrap">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-save me-1"></i> Update
                            </button>
                            <a href="{{ route('roles.index') }}" class="btn btn-dark btn-sm">
                                <i class="fas fa-arrow-left me-1"></i> Back
                            </a>
                        </div>
                    </form>
                </div>

            </div> <!-- end card-->
        </div>
    </div>
</div> <!-- container -->
@endsection
@section('scripts')
<script>
    document.getElementById('checkAll').addEventListener('change', function () {
        const isChecked = this.checked;
        const checkboxes = document.querySelectorAll('input[name="permissions[]"]');
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = isChecked;
        });
    });
</script>
@endsection
