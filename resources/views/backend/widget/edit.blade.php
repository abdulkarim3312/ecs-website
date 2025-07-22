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
                        Edit Widget
                    </h4>
                    <a href="{{ route('widget.index') }}" class="btn btn-primary btn-sm btn-back">
                        <i class="fas fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('widget.update', $widget->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Bangla Title</label>
                                    <input type="text" name="title" value="{{ $widget->bn_title() }}" class="form-control" id="title" placeholder="উইজেট শিরোনাম">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="en_title">English Title</label>
                                    <input type="text" name="en_title" value="{{ $widget->en_title() }}" class="form-control" id="en_title" placeholder="Widget title">
                                    @if ($errors->has('en_title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('en_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <select class="form-control" name="position">
                                        <option value="">Select a position</option>
                                        <option value="1" {{ $widget->position == 1 ? 'selected' : '' }}>Left</option>
                                        <option value="2" {{ $widget->position == 2 ? 'selected' : '' }}>Right</option>
                                    </select>
                                    @if ($errors->has('position'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-inline">
                                    <select class="form-control col-md-6" name="promote">
                                        <option value="">Promote to</option>
                                        <option value="1" {{ $widget->promote == 1 ? 'selected' : '' }}>Front Page</option>
                                        <option value="2" {{ $widget->promote == 2 ? 'selected' : '' }}>Inner Pages</option>
                                        <option value="3" {{ $widget->promote == 3 ? 'selected' : '' }}>All Pages</option>
                                    </select>
                                    <br>
                                    <input type="number" name="order" value="{{ $widget->order ?? '' }}" class="form-control col-md-6" id="order" placeholder="Set order">
                                    @if ($errors->has('promote'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('promote') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Bangla :: Widget Contents</label>
                                    <textarea class="form-control editor" name="description" id="description" rows="5">{{ $widget->bn_description() }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="en_description">English :: Widget Contents</label>
                                    <textarea class="form-control editor" name="en_description" id="en_description" rows="5">{{ $widget->en_description() }}</textarea>
                                    @if ($errors->has('en_description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('en_description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-purple pull-right">Update</button>
                        <a href="{{ route('widget.index') }}" class="btn btn-success mdi mdi-undo-variant width-sm mx-1">Back</a>
                    </form>
                </div>
            </div> <!-- end card-->
        </div>
    </div>
</div> <!-- container -->
@endsection
@section('scripts')
@endsection
