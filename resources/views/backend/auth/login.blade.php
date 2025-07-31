<!DOCTYPE html>
<html lang="en">
<!-- <html lang="en" data-layout="topnav"> -->


<!-- Mirrored from coderthemes.com/uplon/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Feb 2025 18:27:51 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- Vendor css -->
    <link href="{{ asset('backend/assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{ asset('backend/assets/js/config.js') }}"></script>
</head>
{{-- background class bg-primary border border-primary border-primary --}}
<body class="authentication-bg bg-primary">

    <div class="account-pages pt-5 my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="account-card-box bg-light rounded-2 p-2">
                        <div class="card mb-0  border-4">
                            <div class="card-body p-4">
                                
                                <div class="text-center">
                                    {{-- <div class="my-3">
                                        <a href="index.html">
                                            <span><img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="28"></span>
                                        </a>
                                    </div> --}}
                                    <h5 class="text-muted text-uppercase py-3 font-16">Sign In</h5>
                                </div>

                                <form method="POST" action="{{ route('admin-login-post') }}" class="mt-2">
                                    @csrf
                                    <div class="form-group mb-3" @error('email')style="margin-bottom: 0px !important" @enderror>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email')form-control-danger @enderror" placeholder="Enter your email">
                                    </div>
                                    @error('email')
                                        <span class="messages">
                                            <p class="text-danger error text-left">{{ $message }}</p>
                                        </span>
                                    @enderror

                                    <div class="form-group mb-3" @error('password')style="margin-bottom: 0px !important" @enderror>
                                        <input type="password" name="password" class="form-control password-input @error('password')form-control-danger @enderror" placeholder="Enter your password" id="password-input">
                                    </div>
                                    @error('password')
                                        <span class="messages">
                                            <p class="text-danger error text-left" style="margin-bottom: 0px !important">{{ $message }}</p>
                                        </span>
                                    @enderror

                                    <div class="form-group text-center mb-3">
                                        <button class="btn btn-success btn-block waves-effect waves-light w-100" type="submit"> Log In </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    <!-- Vendor js -->
    <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

</body>
</html>