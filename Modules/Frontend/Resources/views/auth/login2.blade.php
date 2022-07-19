
<!-- Modal -->
<div class="log_in_modal_">
    <div class="modal login fade" id="Log_in_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <div class="p-2 mt-4">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="mb-4">
                                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                                <input type="text" name="email" class="form-control "
                                                    id="username" placeholder="Enter your username">
                                            </div>
                                            <div class="mb-4">
                                                <div class="float-end">
                                                    <a href="javascript;:" class="text-muted ">Forgot password?</a>
                                                </div>
                                                <label class="form-label " for="password-input">Password <span class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input type="password" name="password" class="form-control pe-5 "
                                                        placeholder="Enter your password" id="password-input">
                                                    <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                        type="button" id="password-addon"><i
                                                            class="ri-eye-fill align-middle"></i></button>
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                                <label class="form-check-label text-muted" for="auth-remember-check">Remember me</label>
                                            </div>
                                            <div class="mt-4">
                                                <button class="btn log_in_btn w-100" type="submit">Log In</button>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <p class="mb-0">Don't have an account ? <a href="javascript:;" class="fw-semibold text-decoration-underline" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#register_modal" style="color: #5867ba;"> Sign-In </a> </p>
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


