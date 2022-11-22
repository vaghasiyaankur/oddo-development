
<!-- Modal -->
<div class="log_in_modal_">
    <div class="modal fade" id="register_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body position-reletive p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="row ">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="text-center mt-2 ">
                                        <h5 class="text-dark fs-4">Create an Account</h5>
                                    </div>
                                    <div id="success-div"></div>
                                    <div class="p-2 mt-3">
                                        <form action="javascript:;" method="POST" class="signUpForm" style="margin-top: 40px;position:relative;">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">First Name<span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control name"
                                                    id="name" placeholder="Enter your First Name">
                                                <span class="text-danger" id="name-error"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" name="lastName" class="form-control lastName"
                                                    id="lastName" placeholder="Enter your Last Name">
                                                <span class="text-danger" id="lastName-error"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="E-mail" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control useremail"
                                                    id="E-mail" placeholder="Enter your Email">
                                                    <span class="text-danger" id="useremail-error"></span>
                                            </div>
                                            <div class="mb-3 position-relative" >
                                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                                <input type="password" name="password" class="form-control userpassword"
                                                id="password" placeholder="Enter Password"  autocomplete="off">
                                                <button class="toggle btn btn-link position-absolute end-0 text-decoration-none text-muted" type="button" id="password-show" style="top: 30px;"><i class="fa fa-eye align-middle" id="eyeIcon"></i></button>
                                                <span class="text-danger" id="userpassword-error"></span>
                                            </div>
                                            <div class="mb-3 position-relative">
                                                <label for="userPassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                                <input type="password" name="RePassword" class="form-control userrepassword"
                                                id="userPassword" placeholder="Enter Confirm Password"  autocomplete="off">
                                                <button class="toggle btn btn-link position-absolute end-0 text-decoration-none text-muted" type="button" id="password-hide" style="top: 30px;"><i class="fa fa-eye align-middle" id="eyeIcons"></i></button>
                                                <span class="text-danger" id="userrepassword-error"></span>

                                            </div>
                                            <div class="mt-4 position-relative">
                                                <button class="btn log_in_btn w-100 signup">Sign Up</button>
                                                <div class="spinner-border" role="status" style="display: none;position: absolute;right: 14px;top:7px;color: #fff;">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <div class="signin-other-title">
                                                    <h6 class="mb-3 title text-muted">Create Account With</h6>
                                                </div>
                                                <div>
                                                    <a href="{{ route('auth.facebook') }}" class="btn btn-icon btn-fb">
                                                        <i class="ri-facebook-fill fs-16"></i>
                                                    </a>

                                                    <a href="{{ route('auth.google') }}" class="btn btn-icon btn-google">
                                                        <i class="ri-google-fill fs-16"></i>
                                                    </a>

                                                    {{-- <a href="{{ route('auth.twitter') }}" class="btn btn-icon btn-twiter">
                                                        <i class="ri-twitter-fill fs-16"></i>
                                                    </a> --}}
                                                </div>
                                            </div>
                                            <div class="mt-3 text-center">
                                                <p class="mb-0">Already have an account ? <a href="javascript:;" class="fw-semibold text-decoration-underline" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#Log_in_modal" style="color: #5867ba;"> Log In </a> </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $('#success-div').html('');

    var baseUrl = $('#base_url').val();

    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.signup', function(){
            let name = $('.name').val();
            !name ? $(`#name-error`).html(`The name field is required.`) : $(`#name-error`).html(``);

            let lastName = $('.lastName').val();
            !lastName ? $(`#lastName-error`).html(`The last name field is required.`) : $(`#lastName-error`).html(``);

            let useremail = $('.useremail').val();
            !useremail ? $(`#useremail-error`).html(`The email field is required.`) : $(`#useremail-error`).html(``);

            let userpassword = $('.userpassword').val();
            !userpassword ? $(`#userpassword-error`).html(`The password field is required.`) : $(`#userpassword-error`).html(``);

            let userrepassword = $('.userrepassword').val();
            !userrepassword ? $(`#userrepassword-error`).html(`The re-password field is required.`) : $(`#userrepassword-error`).html(``);

            if (!name || !useremail || !userpassword || !userrepassword || !lastName) {
                return;
            }

            $('.spinner-border').show();

            formdata = new FormData();
            formdata.append('username', name);
            formdata.append('lastName', lastName);
            formdata.append('email', useremail);
            formdata.append('password', userpassword);
            formdata.append('RePassword', userrepassword);

            $.ajax({
                url: "{{route('user.register')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) {
                    if (response.status == 1) {
                        $('.spinner-border').hide();
                        $('#success-div').html(` <div class="alert alert-borderless alert-success text-center p-2 mx-2" role="alert"  style="position:absolute;width:85%;>
                                            <span id="">`+response.success+`</span>
                                        </div>`);
                        setTimeout(function(){
                            $('#success-div').html(``);
                        }, 4000);
                        $(".signUpForm").trigger("reset");
                        $('#name-error').text('');
                        $('#userpassword-error').text('');
                        $('#useremail-error').text('');
                    }else {
                        $('.spinner-border').hide();
                        $('#name-error').text(response.responseJSON.errors.username);
                        $('#userpassword-error').text(response.responseJSON.errors.password);
                        $('#useremail-error').text(response.responseJSON.errors.email);
                        $('#userrepassword-error').text(response.responseJSON.errors.RePassword);
                    }

                }, error:function (response) {
                    // $('.spinner-border').hide();
                    // $('#name-error').text(response.responseJSON.errors.username);
                    // $('#userpassword-error').text(response.responseJSON.errors.password);
                    // $('#useremail-error').text(response.responseJSON.errors.email);
                    // $('#userrepassword-error').text(response.responseJSON.errors.RePassword);
                }
            });
        });
    });
</script>
<script>
    let passwordInput = document.getElementById("password"),
    toggle = document.getElementById("password-show"),
    icon = document.getElementById("eyeIcon");

    function togglePassword() {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye-slash");
        }
    }

    toggle.addEventListener("click", togglePassword, false);
</script>
<script>
    let passwordInputs = document.getElementById("userPassword"),
    toggles = document.getElementById("password-hide"),
    icons = document.getElementById("eyeIcons");

    function toggleREPassword() {
        if (passwordInputs.type === "password") {
            passwordInputs.type = "text";
            icons.classList.add("fa-eye-slash");
        } else {
            passwordInputs.type = "password";
            icons.classList.remove("fa-eye-slash");
        }
    }
    toggles.addEventListener("click", toggleREPassword, false);
</script>
@endpush
