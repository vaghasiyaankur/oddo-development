@php
$logoFavicon = Modules\Admin\Http\Controllers\AdminController::logoFavicon();
$generalSetting = App\Models\GeneralSetting::select('site_name')->first();
@endphp

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">
    <head>
        <meta charset="utf-8" />
        <title>{{ $generalSetting->site_name }} / Sign In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="oddo Development">
        <meta name="keywords" content="oddo admin">
        <meta name="author" content="oddo">
        <!-- App favicon -->
        <link rel="shortcut icon"
        class="favicon_image" href="{{ $logoFavicon->favicon == null ? asset('storage/' . $logoFavicon->default_favicon) : asset('storage/' . $logoFavicon->favicon) }}">

        <!-- Layout config Js -->
        <script src="{{ asset('assets/Admin/assets/js/layout.js') }}"></script>
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/Admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/Admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/Admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        {{-- <link href="{{ asset('assets/Admin/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    </head>
    <body>
        <div class="auth-page-wrapper pt-5">
            <!-- auth page bg -->
            <div class="auth-one-bg-position auth-one-bg"  id="auth-particles">
                <div class="bg-overlay"></div>
                <div class="shape">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                        <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                    </svg>
                </div>
            </div>

            <!-- auth page content -->
            <div class="auth-page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center mt-sm-5 mb-4 text-white-50">
                                <div>
                                    <a href="javascript:;" class="d-inline-block auth-logo">
                                        <img src="{{ asset('assets/Admin/assets/images/logo-light.png') }}" alt="logo" height="20" width="118">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card mt-4">

                                <div class="card-body p-4">
                                    <div class="text-center mt-2">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue to Odda.</p>
                                    </div>

                                    @if(session()->has('error'))
                                    <div class="alert alert-danger mb-0 p-2 pl-3" style="position: absolute;width:85%;text-align:center;">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif

                                    <div class="p-2 mt-3">
                                        <form action="{{route('admin.login')}}" method="POST" style="position: relative;margin-top:35px;">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
                                                @if ($errors->has('email'))
                                                    <span class="error text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="password-input">Password</label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password" name="password" class="form-control pe-5" placeholder="Enter password" id="password-input" autocomplete="off">
                                                    
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="error text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-success w-100" type="submit">Sign In</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end auth page content -->
        </div>
        <!-- end auth-page-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="{{ asset('assets/Admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        {{-- <script src="{{ asset('assets/Admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/Admin/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/Admin/assets/libs/feather-icons/feather.min.js') }}"></script> --}}

        {{-- <script src="{{ asset('assets/Admin/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script> --}}

        <!-- particles js -->
        {{-- <script src="{{ asset('assets/Admin/assets/libs/particles.js/particles.js') }}"></script> --}}
        <!-- particles app js -->
        {{-- <script src="{{ asset('assets/Admin/assets/js/pages/particles.app.js') }}"></script> --}}
        <!-- password-addon init -->
        <script src="{{ asset('assets/Admin/assets/js/pages/password-addon.init.js') }}"></script>
        
        <script  type="text/javascript">
            $(document).ready(function() {
                setTimeout(function(){
                    $('.alert-danger').hide();
                }, 4000);
            });
        </script>
    </body>

</html>
