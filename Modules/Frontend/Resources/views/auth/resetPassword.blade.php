<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Sign In | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/Admin/assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('assets/Admin/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/Admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/Admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/Admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/Admin/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
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
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="assets/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                            {{-- <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p> --}}
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h4 class="text-primary">Welcome Back !</h4>
                                    <p class="text-muted">Reset Your Password to continue to Odda.</p>
                                </div>
                                <div id="expired-div"></div>
                               
                                <div class="p-2 mt-4">
                                    <form action="javascript:;" method="POST" class="updatePasswordForm">
                                        @csrf
                                        
                                        <div class="mb-3">
                                            <input type="hidden" class="token_value" value="{{$token}}">
                                            <label class="form-label" for="newPassword">New Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" name="newPassword" class="form-control pe-5 newPassword"
                                                    placeholder="Enter new password" id="newPassword">
                                                <span class="text-danger" id="newPassword-error"></span>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="confirmPassword">Confirm Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" name="confirmPassword" class="form-control pe-5 confirmPassword"
                                                    placeholder="Enter confirm password" id="confirmPassword">
                                                <span class="text-danger" id="confirmPassword-error"></span>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100 changePasswordBtn" style="border: none;background-color: #6A78C7;">Change Password</button>
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
    <!-- jquery Cdn Link -------->
    <script src="{{ asset('assets/Admin/assets/js/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/Admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/Admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/Admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/Admin/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/Admin/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/Admin/assets/js/plugins.js') }}"></script>

    <!-- particles js -->
    <script src="{{ asset('assets/Admin/assets/libs/particles.js/particles.js') }}"></script>
    <!-- particles app js -->
    <script src="{{ asset('assets/Admin/assets/js/pages/particles.app.js') }}"></script>
    <!-- password-addon init -->
    <script src="{{ asset('assets/Admin/assets/js/pages/password-addon.init.js') }}"></script>
    <script>
        $(document).ready(function(){ 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.changePasswordBtn', function(){
                var newPassword = $('.newPassword').val();
                !newPassword ? $(`#newPassword-error`).html(`The new password field is required.`) : $(`#newPassword-error`).html(``);

                var confirmPassword = $('.confirmPassword').val();
                !confirmPassword ? $(`#confirmPassword-error`).html(`The confirm password field is required.`) : $(`#confirmPassword-error`).html(``);

                var token_value= $('.token_value').val();

                if (!newPassword || !confirmPassword) {
                    return;
                }

                formdata = new FormData();
                formdata.append('newPassword', newPassword);
                formdata.append('confirmPassword', confirmPassword);
                formdata.append('token', token_value);

                $.ajax({
                    url: "{{route('user.updatePassword')}}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formdata,
                    success: function (response) {
                        $(".updatePasswordForm").trigger("reset");
                        window.location.href = '/';
                    }, error:function (response) {
                        if(response.responseJSON.errors){
                            $('#newPassword-error').text(response.responseJSON.errors.newPassword);
                            $('#confirmPassword-error').text(response.responseJSON.errors.confirmPassword);
                        }
                        if(response.responseJSON.error){
                            $('#expired-div').html(` <div class="alert alert-borderless alert-danger text-center mb-2 mx-2" role="alert">
                                        <span id="expired-link-error">`+response.responseJSON.error+`</span>
                                    </div>`);
                        }
                    }
                }); 

            });

        });
    </script>
</body>

</html>