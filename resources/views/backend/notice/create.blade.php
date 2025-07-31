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
    img.note-float-left {
        float: left;
        margin-right: 15px;
    }
    img.note-float-right {
        float: right;
        margin-left: 15px;
    }
    img.note-float-none {
        display: block;
        margin: 0 auto;
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
                        Create Notice
                    </h4>
                    <a href="{{ route('notice.index') }}" class="btn btn-primary btn-sm btn-back">
                        <i class="fas fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('notice.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="title">Bangla Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="নোটিসের শিরোনাম">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="en_title">English Title</label>
                            <input type="text" name="en_title" class="form-control" id="en_title" placeholder="Notice title (English)">
                            @if ($errors->has('en_title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('en_title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Bangla :: Notice Description</label>
                            <textarea class="form-control" name="description" id="summernote_bn" rows="3"></textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="en_description">English :: Notice Description</label>
                            <textarea class="form-control" name="en_description" id="summernote_en" rows="3"></textarea>
                            @if ($errors->has('en_description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('en_description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="en_description">Category</label>
                            <select class="form-control col-md-6" name="category_id" data-toggle="select2">
                                <option value="">Select category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{ $category->en_title() }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="file">Upload file</label>
                            <input type="file" name="docs" class="form-control-file" id="file">
                            @if ($errors->has('docs'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('docs') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="file">Promote to Frontpage? (প্রথম পাতায় সাম্প্রতিক তথ্যসমূহ তে দেখা যাবে?) </label>
                            <select class="form-control col-md-6" name="promote" required="required">
                                <option value="">Select an option</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            @if ($errors->has('promote'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('promote') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="file">Specify a date</label>
                            <input type="date" name="noticeDate" class="form-control col-md-6">
                            @if ($errors->has('noticeDate'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('noticeDate') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-purple pull-right">Save</button>
                        <a href="{{ route('notice.index') }}" class="btn btn-success mdi mdi-undo-variant width-sm mx-1">Back</a>
                    </form>
                </div>

            </div> <!-- end card-->
        </div>
    </div>
</div> <!-- container -->
@endsection
@section('scripts')

<script>
    $(document).ready(function() {
        $('#summernote_bn').summernote({
            height: 300,
            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ]
            },
            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        uploadImage(files[i], '#summernote_bn');
                    }
                }
            }
        });
        $('#summernote_en').summernote({
            height: 300,
            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ]
            },
            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        uploadImage(files[i], '#summernote_en');
                    }
                }
            }
        });
    });

    function uploadImage(file, editorSelector) {
        let data = new FormData();
        data.append("file", file);
        data.append("_token", '{{ csrf_token() }}'); 

        $.ajax({
            url: '{{ route("summernote.upload") }}', 
            method: 'POST',
            data: data,
            contentType: false,
            processData: false,
            success: function(response) {
                $(editorSelector).summernote('insertImage', response.url);
            },
            error: function(err) {
                alert('Image upload failed!');
            }
        });
    }
</script>
@endsection
