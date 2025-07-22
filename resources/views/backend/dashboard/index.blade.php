@extends('backend.layouts.master')

@section('styles')
<style>
    
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
        <div class="col-md-6 col-xl-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="icon-layers float-end m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Orders</h6>
                    <h3 class="my-3" data-plugin="counterup">1,587</h3>
                    <span class="badge bg-success me-1"> +11% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="icon-paypal float-end m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Revenue</h6>
                    <h3 class="my-3">$<span data-plugin="counterup">46,782</span></h3>
                    <span class="badge bg-danger me-1"> -29% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="icon-chart float-end m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Average Price</h6>
                    <h3 class="my-3">$<span data-plugin="counterup">15.9</span></h3>
                    <span class="badge bg-danger me-1"> 0% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="icon-rocket float-end m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Product Sold</h6>
                    <h3 class="my-3" data-plugin="counterup">1,890</h3>
                    <span class="badge bg-warning me-1"> +89% </span> <span class="text-muted">Last year</span>
                </div>
            </div>
        </div>
    </div> <!-- end row -->

    <div class="row">
        <div class="col-lg-6 col-xl-8">
            <div class="card card-body">
                <h4 class="header-title mb-3">Sales Statistics</h4>

                <div class="text-center">
                    <ul class="list-inline chart-detail-list mb-0">
                        <li class="list-inline-item">
                            <h6 class="text-info"><i class="mdi mdi-circle-outline me-1"></i>Series A</h6>
                        </li>
                        <li class="list-inline-item">
                            <h6 class="text-success"><i class="mdi mdi-triangle-outline me-1"></i>Series B</h6>
                        </li>
                        <li class="list-inline-item">
                            <h6 class="text-muted"><i class="mdi mdi-square-outline me-1"></i>Series C</h6>
                        </li>
                    </ul>
                </div>

                <div id="morris-bar-stacked" class="morris-chart" style="height: 320px;"></div>

            </div>
        </div><!-- end col-->

        <div class="col-lg-6 col-xl-4">
            <div class="card card-body">
                <h4 class="header-title mb-3">Trends Monthly</h4>

                <div class="text-center mb-3">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-sm btn-secondary">Today</button>
                        <button type="button" class="btn btn-sm btn-secondary">This Week</button>
                        <button type="button" class="btn btn-sm btn-secondary">Last Week</button>
                    </div>
                </div>

                <div id="morris-donut-example" class="morris-chart" style="height: 268px;"></div>

                <div class="text-center">
                    <ul class="list-inline chart-detail-list mb-0 mt-2">
                        <li class="list-inline-item">
                            <h6 class="text-info"><i class="mdi mdi-circle-outline me-1"></i>English</h6>
                        </li>
                        <li class="list-inline-item">
                            <h6 class="text-success"><i class="mdi mdi-triangle-outline me-1"></i>Italian</h6>
                        </li>
                        <li class="list-inline-item">
                            <h6 class="text-muted"><i class="mdi mdi-square-outline me-1"></i>French</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- end col-->
    </div> <!-- end row -->
</div> <!-- container -->
@endsection
@section('scripts')

@endsection
