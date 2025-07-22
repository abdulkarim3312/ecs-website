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
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-2 col-form-label">Name</label>
                            <div class="col-10">
                                <input type="text" name="name" value="{{ old('name', $role->name ?? '') }}" class="form-control" id="basiInput" placeholder="Enter Role Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @php
                            $allChecked = $permissions->count() > 0 && $permissionNames && $permissions->every(function($perm) use ($permissionNames) {
                                return in_array($perm->name, $permissionNames);
                            });
                        @endphp
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-2 col-form-label"></label>
                            <div class="col-10">
                                <input type="checkbox" id="checkAll" class="form me-1" {{ $allChecked ? 'checked' : '' }}>Check All
                            </div>
                        </div>
                        <div class="row gy-4 mt-1">
                            <label for="basiInput" class="form-label col-sm-2">Permission</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    @if ($permissions->isNotEmpty())
                                        @foreach ($permissions as $permission)
                                            <div class="col-md-3">
                                                <label for="{{ 'permission-' . $permission->id }}" class="mt-1">
                                                    <input type="checkbox" name="permissions[]" class="form mt-0"
                                                        id="{{ 'permission-' . $permission->id }}"
                                                        {{ $permissionNames && in_array($permission->name, $permissionNames) ? 'checked' : '' }}
                                                        value="{{ $permission->name }}">
                                                    {{ str_replace('_', ' ', $permission->name) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-purple waves-effect waves-light width-sm">Update</button>
                                <a href="{{ route('roles.index') }}" class="btn btn-success mdi mdi-undo-variant width-sm mx-1">Back</a>
                            </div>
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
