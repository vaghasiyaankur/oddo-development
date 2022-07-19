
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
                                    <div class="p-2 mt-4">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="mb-4">
                                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                                <input type="text" name="email" class="form-control "
                                                    id="username" placeholder="Enter your username">
                                            </div>
                                            <div class="mb-4">
                                                <label for="username" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="text" name="email" class="form-control "
                                                    id="username" placeholder="Enter your email">
                                            </div>
                                            <div class="mb-4">
                                                <label for="username" class="form-label">Password <span class="text-danger">*</span></label>
                                                <input type="password" name="password" class="form-control "
                                                    id="username" placeholder="Enter password">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label " for="password-input">Re-Password <span class="text-danger">*</span></label>
                                                <input type="password" name="password" class="form-control "
                                                id="username" placeholder="Enter re-password">
                                            </div>
                                            <div class="mt-4">
                                                <button class="btn log_in_btn w-100" type="submit">Sign Up</button>
                                            </div>
                                            <div class="mt-4 text-center">
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
