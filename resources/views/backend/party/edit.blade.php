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
                        Edit Party
                    </h4>
                    <a href="{{ route('party.index') }}" class="btn btn-primary btn-sm btn-back">
                        <i class="fas fa-arrow-left me-2"></i> Back to List
                    </a>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('party.update', $party->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="party_name">Bangla :: Party Name</label>
                            <input type="text" name="party_name"
                                value="{{ $party->bn_name() }}"
                                class="form-control" id="party_name" placeholder="দলের নাম">
                            @if ($errors->has('party_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('party_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="en_party_name">English :: Party Name</label>
                            <input type="text" name="en_party_name"
                                value="{{ $party->en_name() }}"
                                class="form-control" id="en_party_name" placeholder="Party Name (English)">
                            @if ($errors->has('en_party_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('en_party_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" name="registration_no"
                                value="{{ $party->registration_no }}"
                                class="form-control" id="registration_no" placeholder="Registration No. (নিবন্ধন নম্বর)">
                            @if ($errors->has('registration_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('registration_no') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="date" name="registration_date"
                                value="{{ $party->registration_date }}"
                                class="form-control" id="registration_date" placeholder="Registration Date. (নিবন্ধনের তারিখ)">
                            @if ($errors->has('registration_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('registration_date') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" name="symbol_name"
                                value="{{ $party->symbol_name }}"
                                class="form-control" id="symbol_name" placeholder="Symbol Name. (প্রতীকের নাম)">
                            @if ($errors->has('symbol_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('symbol_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-inline">
                            <input type="text" name="president"
                                value="{{ $party->bn_president() }}"
                                class="form-control col-md-6" id="president" placeholder="প্রেসিডেন্টের নাম">
                            @if ($errors->has('president'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('president') }}</strong>
                                </span>
                            @endif
                            <input type="text" name="en_president"
                                value="{{ $party->en_president() }}"
                                class="form-control col-md-6" id="president" placeholder="President Name">
                        </div>
                        <div class="form-inline">
                            <input type="text" name="secretary_general"
                                value="{{ $party->bn_secretary() }}"
                                class="form-control col-md-6" id="secretary_general" placeholder="মহাসচিব">
                            @if ($errors->has('secretary_general'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('secretary_general') }}</strong>
                                </span>
                            @endif
                            <input type="text" name="en_secretary_general"
                                value="{{ $party->en_secretary() }}"
                                class="form-control col-md-6" id="secretary_general" placeholder="Secretary General">
                        </div>

                        <div class="form-inline">
                            <input type="text" name="chairman" class="form-control col-md-6" id="chairman" value="{{ $party->bn_chairman() }}">
                            @if ($errors->has('chairman'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('chairman') }}</strong>
                                </span>
                            @endif
                            <input type="text" name="en_chairman" class="form-control col-md-6" id="chairman" value="{{$party->en_chairman()}}">
                        </div>

                        <div class="form-inline">
                            <input type="text" name="chairperson" class="form-control col-md-6" id="chairperson" value="{{$party->bn_chairperson()}}">
                            @if ($errors->has('chairperson'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('chairperson') }}</strong>
                                </span>
                            @endif
                            <input type="text" name="en_chairperson" class="form-control col-md-6" id="chairperson" value="{{$party->en_chairperson()}}">
                        </div>

                        <div class="form-inline">
                            <input type="text" name="general_secretary" class="form-control col-md-6" id="general_secretary" value="{{$party->bn_general_secretary()}}">
                            @if ($errors->has('general_secretary'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('general_secretary') }}</strong>
                                </span>
                            @endif
                            <input type="text" name="en_general_secretary" class="form-control col-md-6" id="secretary_general" value="{{$party->en_general_secretary()}}">
                        </div>

                        <div class="form-inline">
                            <input type="text" name="aamir" class="form-control col-md-6" id="aamir" value="{{$party->bn_aamir()}}">
                            @if ($errors->has('aamir'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('aamir') }}</strong>
                                </span>
                            @endif
                            <input type="text" name="en_aamir" class="form-control col-md-6" id="aamir" value="{{$party->en_aamir()}}">
                        </div>

                        <div class="form-inline">
                            <input type="text" name="bod" class="form-control col-md-6" id="secretary_general" value="{{$party->bn_bod()}}">
                            @if ($errors->has('bod'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bod') }}</strong>
                                </span>
                            @endif
                            <input type="text" name="en_bod" class="form-control col-md-6" id="bod" value="{{$party->en_bod()}}">
                        </div>

                        <div class="form-inline">
                            <textarea name="address" class="form-control col-md-6" id="address" placeholder="কার্যালয়ের ঠিকানা">{{ $party->bn_address() }}</textarea>
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                            <textarea name="en_address" class="form-control col-md-6" id="address" placeholder="Office Address">{{ $party->en_address() }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" value="{{$party->phone}}" class="form-control" id="phone" placeholder="Phone No.">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" name="mobile" value="{{$party->mobile}}" class="form-control" id="mobile" placeholder="Mobile No.">
                            @if ($errors->has('mobile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" value="{{$party->email}}" class="form-control" id="email" placeholder="Email ID (If any)">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" name="website" value="{{ $party->website }}" class="form-control" id="website" placeholder="Website (If any)">
                            @if ($errors->has('website'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('website') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="file">Upload Symbol (প্রতীক)</label>
                            <input type="file" name="party_symbol" class="form-control-file" id="file">
                            @if ($errors->has('docs'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('docs') }}</strong>
                                </span>
                            @endif
                        </div>
                         <button type="submit" class="btn btn-purple pull-right">Update</button>
                        <a href="{{ route('party.index') }}" class="btn btn-success mdi mdi-undo-variant width-sm mx-1">Back</a>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div> 
@endsection
@section('scripts')
@endsection
