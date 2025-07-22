<!DOCTYPE html>
<html lang="en">
<!-- <html lang="en" data-layout="topnav"> -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <title>{{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('backend.layouts.partials.styles')
    @yield('styles')
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        
        @include('backend.layouts.partials.header')
        @include('backend.layouts.partials.sidebar')


        <div class="page-content">

            @yield('main-content')

            @include('backend.layouts.partials.footer')

        </div>
    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas" style="width: 260px;">
        <div class="bg-primary d-flex align-items-center gap-2 p-4 offcanvas-header">
            <h5 class="flex-grow-1 text-white mb-0">Theme Settings</h5>

            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-4 h-100" data-simplebar>
            <div class="mb-3">
                <h5 class="mb-3 font-16 fw-bold">Color Scheme</h5>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-light" value="light">
                    <label class="form-check-label" for="layout-color-light">Light</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-dark" value="dark">
                    <label class="form-check-label" for="layout-color-dark">Dark</label>
                </div>
            </div>


            <div class="mb-3">
                <h5 class="mb-3 font-16 fw-bold">Topbar Color</h5>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-light" value="light">
                    <label class="form-check-label" for="topbar-color-light">Light</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark" value="dark">
                    <label class="form-check-label" for="topbar-color-dark">Dark</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-brand" value="brand">
                    <label class="form-check-label" for="topbar-color-brand">Brand</label>
                </div>
            </div>

            <div class="mb-3">
                <h5 class="mb-3 font-16 fw-bold">Menu Color</h5>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-light" value="light">
                    <label class="form-check-label" for="sidenav-color-light">Light</label>
                </div>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-dark" value="dark">
                    <label class="form-check-label" for="sidenav-color-dark">Dark</label>
                </div>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-brand" value="brand">
                    <label class="form-check-label" for="sidenav-color-brand">Brand</label>
                </div>
            </div>

            <div class="mb-3" id="sidebarSize">
                <h5 class="mb-3 font-16 fw-bold">Sidebar Size</h5>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-default" value="default">
                    <label class="form-check-label" for="sidenav-size-default">Default</label>
                </div>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-compact" value="compact">
                    <label class="form-check-label" for="sidenav-size-compact">Compact</label>
                </div>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-small" value="condensed">
                    <label class="form-check-label" for="sidenav-size-small"> Condensed</label>
                </div>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-small-hover" value="sm-hover">
                    <label class="form-check-label" for="sidenav-size-small-hover">Hover View</label>
                </div>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-full" value="full">
                    <label class="form-check-label" for="sidenav-size-full">Full Layout</label>
                </div>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-fullscreen" value="fullscreen">
                    <label class="form-check-label" for="sidenav-size-fullscreen">Hidden</label>
                </div>
            </div>

            <div class="mb-3">
                <h5 class="mb-3 font-16 fw-bold">Layout Mode</h5>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-fluid" value="fluid">
                    <label class="form-check-label" for="layout-mode-fluid">Fluid</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-boxed" value="boxed">
                    <label class="form-check-labe" for="layout-mode-boxed">Boxed</label>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2 px-3 py-2 offcanvas-header border-top border-dashed">
            <button type="button" class="btn w-50 btn-soft-danger" id="reset-layout">Reset</button>
            <a href="https://1.envato.market/XY7j5" class="btn w-50 btn-soft-info" target="_blank">Buy Now</a>
        </div>

    </div>

    @include('backend.layouts.partials.scripts')
    @include('backend.layouts.partials.toastr')
    @yield('scripts')
</body>
</html>