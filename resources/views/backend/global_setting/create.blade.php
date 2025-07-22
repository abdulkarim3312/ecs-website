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
                <h4 class="font-18 mb-0">Global Setting Update</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Global Setting</a></li>
                    
                    <li class="breadcrumb-item active">Global Setting</li>
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
                        Update Global Setting
                    </h4>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('global.store') }}">
                        @csrf
                        @method('POST')
                        <div class="row">
                             <div class="form-group col-md-6">
                                <label for="contact">Contact No</label>
                                <input type="text" name="contact" class="form-control" id="contact"
                                    value="{{ $globalSettings->contact ?? ''}}"
                                    placeholder="Contact No">
                                @if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email ID</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    value="{{ $globalSettings->email ?? ''}}"
                                    placeholder="e.g; info@ecs.gov.bd">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="facebook">Facebook Page</label>
                                <input type="text" name="facebook" class="form-control" id="facebook"
                                    value="{{ $globalSettings->facebook ?? ''}}"
                                    placeholder="e.g; BangladeshECS">
                                @if ($errors->has('facebook'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="twitter">Twitter Page</label>
                                <input type="text" name="twitter" class="form-control" id="twitter"
                                    value="{{ $globalSettings->twitter ?? ''}}"
                                    placeholder="e.g; BangladeshECS">
                                @if ($errors->has('twitter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="google_plus">Google Plus</label>
                                <input type="text" name="google_plus" class="form-control" id="google_plus"
                                    value="{{ $globalSettings->google_plus ?? ''}}"
                                    placeholder="">
                                @if ($errors->has('google_plus'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('google_plus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-purple pull-right">Update</button>
                    </form>
                </div>

            </div> <!-- end card-->
        </div>
    </div>
</div> <!-- container -->
@endsection
@section('scripts')
@endsection
