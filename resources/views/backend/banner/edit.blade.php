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
                <h4 class="font-18 mb-0">Banner</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Banner</a></li>
                    
                    <li class="breadcrumb-item active">Banner</li>
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
                        Edit Banner
                    </h4>
                    <a href="{{ route('notice.index') }}" class="btn btn-primary btn-sm btn-back">
                        <i class="fas fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" name="title"
                                value="{{ $banner->title }}"
                                class="form-control" id="title" placeholder="Title">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Photo Description (Optional)</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{!! $banner->description !!}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <img src="{{ asset('storage/' . $banner->image) }}" width="120" />
                            <br/><br/><br/>
                            <label for="file">Upload new photo</label>
                            <input type="file" name="image" class="form-control-file" id="file">
                            @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-purple pull-right">Update</button>
                        <a href="{{ route('banner.index') }}" class="btn btn-success mdi mdi-undo-variant width-sm mx-1">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container -->
@endsection
@section('scripts')
@endsection
