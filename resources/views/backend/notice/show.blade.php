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

   <div class="row mt-2">
        <div class="col-12">
            <div class="card">                                   
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-sm-start">
                            <h4 class="text-uppercase mt-0">Uplon</h4>
                        </div>
                        <div class="float-sm-end mt-4 mt-sm-0">
                            
                        </div>
                    </div>
                    <hr>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="15%">Bangla Title</th>
                                <td>{{ $notice->bn_title() ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>English Title</th>
                                <td>{{ $notice->bn_description() ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="d-print-none">
                        <div class="float-end">
                            <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container -->
@endsection
@section('scripts')
<script>

</script>
@endsection
