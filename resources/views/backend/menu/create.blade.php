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
                <h4 class="font-18 mb-0">Page</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Page</a></li>
                    
                    <li class="breadcrumb-item active">Page</li>
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
                        Create Page
                    </h4>
                    <a href="{{ route('menu.index') }}" class="btn btn-primary btn-sm btn-back">
                        <i class="fas fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('menu.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="title">Bangla Title</label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="বাংলায় লিখুন"
                            >
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="en_title">English Title</label>
                            <input type="text" name="en_title" class="form-control" id="en_title" placeholder="English menu title">
                            @if ($errors->has('en_title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('en_title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-inline">
                            <input type="text" name="custom_link" class="form-control col-md-6"
                                id="custom_link" placeholder="Custom link: http://niwd.gov.bd">
                            @if ($errors->has('custom_link'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('custom_link') }}</strong>
                                </span>
                            @endif
                            <br />
                            <select class="form-control col-md-6" name="category_id">
                                <option value="">Link to category</option>
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
                        <br>
                        <div class="form-group">
                            <select class="form-control" name="page_id">
                                <option value="">Select a page</option>
                                @foreach($allPages as $page)
                                    <option value="{{$page->id}}">{{ $page->en_title() }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('page_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('page_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="parent_id">
                                <option value="">Select parent (if needed)</option>
                                @foreach($menus as $menu)
                                    <option value="{{$menu->id}}">{{ $menu->en_title() }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('parent_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('parent_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <select class="form-control @error('position') is-invalid @enderror" name="position">
                                <option value="">Select a position</option>
                                <option value="1">Top</option>
                                <option value="5">Top→AboutUs</option>
                                <option value="2">Navigation</option>
                                <option value="3">Side Nav</option>
                                <option value="4">Footer</option>
                            </select>

                            @error('position')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-purple pull-right">Save</button>
                        <a href="{{ route('menu.index') }}" class="btn btn-success mdi mdi-undo-variant width-sm mx-1">Back</a>
                    </form>
                </div>

            </div> <!-- end card-->
        </div>
    </div>
</div> <!-- container -->
@endsection
@section('scripts')
@endsection
