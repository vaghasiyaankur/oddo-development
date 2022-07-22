
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
                                        <h5 class="text-dark fs-4">Create New Account</h5>
                                    </div>
                                    <div class="p-2 mt-3">
                                        <form action="javascript:;" method="POST" class="signUpForm">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Username <span class="text-danger">*</span></label>
                                                <input type="text" name="username" class="form-control name"
                                                    id="userName" placeholder="Enter your username">
                                                <span class="text-danger" id="name-error"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="E-mail" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control useremail"
                                                    id="E-mail" placeholder="Enter your email">
                                                    <span class="text-danger" id="useremail-error"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                                <input type="password" name="password" class="form-control userpassword"
                                                    id="password" placeholder="Enter password">
                                                    <span class="text-danger" id="userpassword-error"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="password-input">Re-Password <span class="text-danger">*</span></label>
                                                <input type="password" name="RePassword" class="form-control userrepassword"
                                                id="username" placeholder="Enter re-password">
                                                <span class="text-danger" id="userrepassword-error"></span>
                                            </div>
                                            <div class="mt-4">
                                                <button class="btn log_in_btn w-100 signup">Sign Up</button>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <div class="signin-other-title">
                                                    <h6 class="mb-3 title text-muted">Create account with</h6>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-icon btn-fb"><i class="ri-facebook-fill fs-16"></i></button>

                                                    <button type="button" class="btn btn-icon btn-google"><i class="ri-google-fill fs-16"></i></button>
                                                    <a href="{{ route('auth.google') }}" class="btn btn-icon btn-google">
                                                        <i class="ri-google-fill fs-16"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-icon btn-git"><i class="ri-github-fill fs-16"></i></button>

                                                    <button type="button" class="btn btn-icon btn-twiter"><i class="ri-twitter-fill fs-16"></i></button>
                                                </div>
                                            </div>
                                            <div class="mt-3 text-center">
                                                <p class="mb-0">Already have an account ? <a href="javascript:;" class="fw-semibold text-decoration-underline" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#Log_in_modal" style="color: #5867ba;"> Login </a> </p>
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

        $(document).on('click', '.signup', function(){
            let name = $('.name').val();
            !name ? $(`#name-error`).html(`The name field is required.`) : $(`#name-error`).html(``);
            
            let useremail = $('.useremail').val();
            !useremail ? $(`#useremail-error`).html(`The email field is required.`) : $(`#useremail-error`).html(``);

            let userpassword = $('.userpassword').val();
            !userpassword ? $(`#userpassword-error`).html(`The password field is required.`) : $(`#userpassword-error`).html(``);

            let userrepassword = $('.userrepassword').val();
            !userrepassword ? $(`#userrepassword-error`).html(`The re-password field is required.`) : $(`#userrepassword-error`).html(``);


            if (!name || !useremail || !userpassword || !userrepassword) {
                return;
            }

            formdata = new FormData();
            formdata.append('username', name);
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
                    $(".modal").modal("hide");
                    $(".signUpForm").trigger("reset");
                    $('#name-error').text('');
                    $('#userpassword-error').text('');
                    $('#useremail-error').text('');
                    toastMixin.fire({ title: response.success, icon: 'success' });
                }, error:function (response) {
                    $('#name-error').text(response.responseJSON.errors.username);
                    $('#userpassword-error').text(response.responseJSON.errors.password);
                    $('#useremail-error').text(response.responseJSON.errors.email);
                    $('#userrepassword-error').text(response.responseJSON.errors.RePassword);
                }
            }); 
        }); 
    });
</script>
@endpush
