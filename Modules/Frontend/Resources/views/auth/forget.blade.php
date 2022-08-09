<!-- Modal -->
<div class="log_in_modal_">
    <div class="modal login fade" id="forget_password_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body position-reletive p-0">
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="card">
                        <div class="card-body p-4 ">
                            <div class="text-center mt-3">
                                <h5 class="text-dark mb-3">Forgot Password?</h5>
                                <p class="text-muted">Reset password with Odda.</p>
                                <div id="forget-success-div">
                                </div>
                                <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop"
                                    colors="primary:#5867ba" class="img-fluid"
                                    style="width: 100%;max-width: 105px;margin-top:40px;position:relative;">
                                </lord-icon>
                            </div>
                            <div class="p-2 ">
                                <form class="forgetPasswordForm" action="javascript:;">
                                    <div class="mb-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="forget-email"
                                            placeholder="Email">
                                        <span class="text-danger" id="forgetEmail-error"></span>
                                    </div>
                                    <div class="text-center mt-4 position-relative">
                                        <button class="btn w-100 text-white forgetPasswordButton" style="background-color: #5867ba;">Send Reset Link
                                        </button>
                                        <div class="spinner-border" role="status" style="display: none;position: absolute;right: 14px;top:7px;color: #fff;">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0"><a href="javascript:;" class="fw-semibold text-decoration-underline" data-bs-toggle="modal" data-bs-target="#Log_in_modal" data-bs-dismiss="modal" style="color: #5867ba;"> Back to Log In </a> </p>
                                    </div>
                                </form><!-- end form -->
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

@push('script')
<script>
    var baseUrl = $('#base_url').val();

$(document).ready(function(){ 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.forgetPasswordButton', function(){
        let forgetEmail = $('#forget-email').val();
            !forgetEmail ? $(`#forgetEmail-error`).html(`The email field is required.`) : $(`#forgetEmail-error`).html(``);


            if (!forgetEmail) {
                return;
            }

            $('.spinner-border').show();

            formdata = new FormData();
            formdata.append('forgetEmail', forgetEmail);

            $.ajax({
                url: "{{route('user.forget-password')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) {
                    $('.spinner-border').hide();
                    console.log(response.success);
                    $('#forget-success-div').html(` <div class="alert alert-borderless alert-success text-center p-2 mx-2" style="position:absolute;width:85%;" role="alert">
                                        <span>`+response.success+`</span>
                                    </div>`);
                    $(".forgetPasswordForm").trigger("reset");
                    $('#forgetEmail-error').text('');
                }, error:function (response) {
                    $('.spinner-border').hide();
                    $('#forgetEmail-error').text(response.responseJSON.errors.forgetEmail);
                }
            }); 
    });
});
</script>
@endpush
