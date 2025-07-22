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
                <h4 class="font-18 mb-0">Widget</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Widget</a></li>
                    
                    <li class="breadcrumb-item active">Widget</li>
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
                        Create Widget
                    </h4>
                    <a href="{{ route('widget.index') }}" class="btn btn-primary btn-sm btn-back">
                        <i class="fas fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('widget.store') }}">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Bangla Title</label>
                                    <input
                                        type="text"
                                        name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        id="title"
                                        placeholder="উইজেট শিরোনাম"
                                        value="{{ old('title') }}"
                                    >
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="en_title">English Title</label>
                                    <input
                                        type="text"
                                        name="en_title"
                                        class="form-control @error('en_title') is-invalid @enderror"
                                        id="en_title"
                                        placeholder="Widget title"
                                        value="{{ old('en_title') }}"
                                    >
                                    @error('en_title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <select
                                        class="form-control @error('position') is-invalid @enderror"
                                        name="position"
                                        id="position"
                                    >
                                        <option value="">Select a position</option>
                                        <option value="1" {{ old('position') == '1' ? 'selected' : '' }}>Left</option>
                                        <option value="2" {{ old('position') == '2' ? 'selected' : '' }}>Right</option>
                                    </select>
                                    @error('position')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-inline">
                                    <select
                                        class="form-control col-md-6 @error('promote') is-invalid @enderror"
                                        name="promote"
                                    >
                                        <option value="">Promote to</option>
                                        <option value="1" {{ old('promote') == '1' ? 'selected' : '' }}>Front Page</option>
                                        <option value="2" {{ old('promote') == '2' ? 'selected' : '' }}>Inner Pages</option>
                                        <option value="3" {{ old('promote') == '3' ? 'selected' : '' }}>All Pages</option>
                                    </select>
                                    @error('promote')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <br>
                                    <input
                                        type="number"
                                        name="order"
                                        class="form-control col-md-6 @error('order') is-invalid @enderror"
                                        id="order"
                                        placeholder="Set order"
                                        value="{{ old('order') }}"
                                    >
                                    @error('order')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Bangla :: Widget Contents</label>
                                    <textarea
                                        class="form-control editor @error('description') is-invalid @enderror"
                                        name="description"
                                        id="description"
                                        rows="5"
                                    >{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="en_description">English :: Widget Contents</label>
                                    <textarea
                                        class="form-control editor @error('en_description') is-invalid @enderror"
                                        name="en_description"
                                        id="en_description"
                                        rows="5"
                                    >{{ old('en_description') }}</textarea>
                                    @error('en_description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-purple pull-right mt-3">Save</button>
                        <a href="{{ route('widget.index') }}" class="btn btn-success mdi mdi-undo-variant width-sm mx-1 mt-3">Back</a>
                    </form>
                </div>

            </div> <!-- end card-->
        </div>
    </div>
</div> <!-- container -->
@endsection
@section('scripts')
@endsection
