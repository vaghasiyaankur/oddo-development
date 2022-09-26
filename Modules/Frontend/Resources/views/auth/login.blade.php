<!-- Modal -->
<div class="log_in_modal_">
    <div class="modal login fade" id="Log_in_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body position-reletive p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="row ">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="text-center mt-2 ">
                                        <h5 class="text-dark fs-4">Welcome Back !</h5>
                                        <p class="text-muted">Login to continue to Odda.</p>
                                    </div>
                                    <div id="expired-div"></div>
                                    <div class="p-2 mt-4">
                                        <form class="loginForm" action="javascript:;" method="POST" style="margin-top: 42px;position:relative;">
                                            <div class="mb-4">
                                                <label for="email" class="form-label">Email <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="email" class="form-control email" id="email"
                                                    placeholder="Email">
                                                <span class="text-danger" id="email-error"></span>
                                            </div>
                                            <div class="mb-4">
                                                <div class="float-end">
                                                    <a href="javascript:;" class="text-muted" data-bs-toggle="modal"
                                                        data-bs-target="#forget_password_modal"
                                                        data-bs-dismiss="modal">Forgot Password?</a>
                                                </div>
                                                <label class="form-label " for="password-input">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input type="password" name="password"
                                                        class="form-control pe-5 password"
                                                        placeholder="Password" id="password-input"  autocomplete="off">
                                                    <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                        type="button" id="password-addon"><i
                                                            class="ri-eye-fill align-middle"></i></button>
                                                    <span class="text-danger" id="password-error"></span>
                                                </div>
                                            </div>
                                            <div class="mt-4 position-relative">
                                                <button class="btn log_in_btn w-100 submitLogin">Log In
                                                </button>
                                                <div class="spinner-border" role="status" style="display: none;position: absolute;right: 14px;top:7px;color: #fff;">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <p class="mb-0">Don't have an account ? <a href="javascript:;"
                                                        class="fw-semibold text-decoration-underline"
                                                        data-bs-toggle="modal" data-bs-dismiss="modal"
                                                        data-bs-target="#register_modal" style="color: #5867ba;"> Sign
                                                        Up </a> </p>
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
var baseUrl = $('#base_url').val();

$(document).ready(function(){ 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.submitLogin', function(){
        let email = $('.email').val();
        !email ? $(`#email-error`).html(`The email field is required.`) : $(`#email-error`).html(``);
        
        let password = $('.password').val();
        !password ? $(`#password-error`).html(`The password name field is required.`) : $(`#password-error`).html(``);
        

        if (!email || !password) {
            return;
        }

        formdata = new FormData();
        formdata.append('email', email);
        formdata.append('password', password);

        $('.spinner-border').show();

        $.ajax({
            url: "{{route('user.login')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) {
                // $('.spinner-border').hide();
                window.location.href = '/';
            }, error:function (response) {
                if(response.responseJSON.error){
                    $('.spinner-border').hide();
                    $('#expired-div').html(`<div class="alert alert-borderless alert-danger text-center p-2 mx-2" style="position:absolute;width:85%;" role="alert">
                                            <span id="expired-link-error">`+response.responseJSON.error+`</span>
                                        </div>`);
                    setTimeout(function(){
                        $('#expired-div').html(``); 
                    }, 4000);
                }else {
                    $('.spinner-border').hide();
                    $('#email-error').text(response.responseJSON.errors.email);
                    $('#password-error').text(response.responseJSON.errors.password);
                }
            }
        }); 
    }); 
});
</script>
@endpush