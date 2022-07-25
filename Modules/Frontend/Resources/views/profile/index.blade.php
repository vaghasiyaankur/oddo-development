@extends('layout::user.Frontend.master')

@section('title')
    My Account
@endsection


@push('css')
<style>
   .account-section .account-detail i{
    position: absolute;
    right: 37px;
    top: 36px;
    color: #00000099;
}
.account-section .acc_btn_ .account_submit_btn{
    color: #fff;
    background-color: #6A78C7;
    border-radius: 8px;
    padding: 5px 24px;
    font-weight: 500;
    font-size: 18px;
}

.form-control:disabled, .form-control[readonly]{
    background-color: white;
}
</style>
@endpush


@section('content')
    <!--------Account setting section--------->
    <section class="account-section">
        <div class="container">
            <h2 class="account-title text-center">Account Settings</h2>
            <div class="account-detail mx-auto position-relative">
                <i class="fa-solid fa-pen-to-square editUser"></i>
                <form class="updateUserForm">
                    <div class="account-form">
                        <label for="exampleInputtext1" class="label-text">Name</label>
                        <input type="text" class="userInput form-control name inpute-text border-0 border-bottom rounded-0 p-0"
                            id="exampleInputPassword1" value="{{$user->name}}" readonly>
                        <span class="text-danger" id="name-error"></span>
                    </div>
                    <div class="account-form">
                        <label for="exampleInputtext1" class="label-text">Lastname</label>
                        <input type="text" class="userInput form-control lastName inpute-text border-0 border-bottom rounded-0 p-0"
                            id="exampleInputPassword1" value="{{$user->last_name}}" readonly>
                        <span class="text-danger" id="lastName-error"></span>
                    </div>
                    <div class="account-form">
                        <label for="exampleInputtext1" class="label-text">Email</label>
                        <input type="text" class="userInput form-control inpute-text border-0 border-bottom rounded-0 p-0"
                            id="exampleInputPassword1" value="{{$user->email}}" readonly>
                    </div>
                </form>
                <div class="payment-title d-flex flex-wrap align-items-center justify-content-between py-3">
                    <h6>Payment Methods</h6>
                    <a href="javascript:;" class="text-decoration-none">New Payment method</a>
                </div>
                <div class="payment-details ">
                    <div class="payment-details-box d-flex flex-md-wrap justify-content-evenly align-items-center">
                        <div class="d-flex flex-md-wrap justify-content-between align-items-center">
                            <img src="assets/images/icons/payment-icon.png" class="payment-icon" alt="">
                            <div class="ps-sm-4 ps-2">
                                <p class="m-0 masterc_details">Mastercard</p>
                                <p class="m-0 master-detail">•••• 0657</p>
                            </div>
                        </div>
                        <div class="d-flex flex-md-wrap justify-content-between align-items-center">
                            <div class="ex_date_card">
                                <p class="m-0 masterc_ex">Expires in</p>
                                <p class="m-0 master-ex">06/22</p>
                            </div>
                            <img src="assets/images/icons/payment-cansel.png" class="payment-cansel" alt="">
                        </div>
                    </div>
                </div>
                <div class="payment-details mt-2 mb-2">
                    <div class="payment-details-box d-flex flex-md-wrap justify-content-evenly align-items-center">
                        <div class="d-flex flex-md-wrap justify-content-between align-items-center">
                            <img src="assets/images/icons/payment-icon.png" class="payment-icon" alt="">
                            <div class="ps-sm-4 ps-2">
                                <p class="m-0 masterc_details">Mastercard</p>
                                <p class="m-0 master-detail">•••• 0657</p>
                            </div>
                        </div>
                        <div class="d-flex flex-md-wrap justify-content-between align-items-center">
                            <div class="ex_date_card">
                                <p class="m-0 masterc_ex">Expires in</p>
                                <p class="m-0 master-ex">06/22</p>
                            </div>
                            <img src="assets/images/icons/payment-cansel.png" class="payment-cansel" alt="">
                        </div>
                    </div>
                </div>
                <div class="payment-title d-flex flex-wrap align-items-center justify-content-md-between mt-3">
                    <!-- <h6 class="m-0">Password</h6> -->
                    {{-- <div class="mt-2">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" style="border: 1px solid #e6e8f5;" id="exampleInputPassword1">
                      </div> --}}
                    <div class="edit_password_ d-none">
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#account_change_password"
                        class="text-decoration-none align-self-start">Change Password </a>
                    </div>
                    <div class="acc_btn_ d-none" >
                        <button type="button" class="account_submit_btn btn btn-light">Submit</button>
                    </div>

                    <!------ CHANGE PASSWORD MODAL ------->
                    <div class="modal fade" id="account_change_password" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header justify-content-end">
                                    <button type="button" class="modal-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                                <div class="modal-body d-flex align-items-center justify-content-center">
                                    <div class="modal-body-form text-center">
                                        <div class="modal-title mx-auto">
                                            <h5>Change Your Password</h5>
                                        </div>
                                        <div class="modal-form">
                                            <div class="mb-4">
                                                <p class="m-0 text-start">Old Password</p>
                                                <input type="password" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="mb-4">
                                                <p class="m-0 text-start">New Password</p>
                                                <input type="password" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="mb-4">
                                                <p class="m-0 text-start">Confirm New Password</p>
                                                <input type="password" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#succesful_password"><button class="account-pass-btn">Change my
                                                    Password</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-----------CHANGE PASSWORD POPUP END--------------->
                    <!------SUCCESFUL PASSWORD MODAL ------->
                    <div class="modal fade" id="succesful_password" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header justify-content-end">
                                    <button type="button" class="modal-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                                <div class="modal-body d-flex align-items-center justify-content-center">
                                    <div class="modal-body-success text-center">
                                        <div class="succes-pass">
                                            <img src="assets/images/icons/succes-pass-reset.png" alt="">
                                        </div>
                                        <div class="succes-inner-text">
                                            <p class="sp-title">Succesful Password Reset!</p>
                                            <p class="sp-pere">You can now use your new password to log in to your account.</p>
                                        </div>
                                        <a href="javascript:;"><button class="account-pass-btn">Login</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-----------SUCCESFUL PASSWORD POPUP END--------------->
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')


<!-------Select option with image  --------->
<script>
    (function ($) {
        $.fn.mySelectDropdown = function (options) {
            return this.each(function () {
                var $this = $(this);

                $this.each(function () {
                    var dropdown = $("<div />").addClass("f-dropdown selectDropdown");

                    if ($(this).is(':disabled'))
                        dropdown.addClass('disabled');

                    $(this).wrap(dropdown);

                    var label = $("<span />").append($("<span />")
                        .text($(this).attr("placeholder"))).insertAfter($(this));
                    var list = $("<ul />");

                    $(this)
                        .find("option")
                        .each(function () {
                            var image = $(this).data('image');
                            if (image) {
                                list.append($("<li />").append(
                                    $("<a />").attr('data-val', $(this).val())
                                        .html(
                                            $("<span />").append($(this).text())
                                        ).prepend('<img src="' + image + '">')
                                ));
                            } else if ($(this).val() != '') {
                                list.append($("<li />").append(
                                    $("<a />").attr('data-val', $(this).val())
                                        .html(
                                            $("<span />").append($(this).text())
                                        )
                                ));
                            }
                        });

                    list.insertAfter($(this));

                    if ($(this).find("option:selected").length > 0 && $(this).find("option:selected").val() != '') {
                        list.find('li a[data-val="' + $(this).find("option:selected").val() + '"]').parent().addClass("active");
                        $(this).parent().addClass("filled");
                        label.html(list.find("li.active a").html());
                    }
                });

                if (!$(this).is(':disabled')) {
                    $(this).parent().on("click", "ul li a", function (e) {
                        e.preventDefault();
                        var dropdown = $(this).parent().parent().parent();
                        var active = $(this).parent().hasClass("active");
                        var label = active
                            ? $('<span />').text(dropdown.find("select").attr("placeholder"))
                            : $(this).html();

                        dropdown.find("option").prop("selected", false);
                        dropdown.find("ul li").removeClass("active");

                        dropdown.toggleClass("filled", !active);
                        dropdown.children("span").html(label);

                        if (!active) {
                            dropdown
                                .find('option[value="' + $(this).attr('data-val') + '"]')
                                .prop("selected", true);
                            $(this).parent().addClass("active");
                        }

                        dropdown.removeClass("open");
                    });

                    $this.parent().on("click", "> span", function (e) {
                        var self = $(this).parent();
                        self.toggleClass("open");
                    });

                    $(document).on("click touchstart", function (e) {
                        var dropdown = $this.parent();
                        if (dropdown !== e.target && !dropdown.has(e.target).length) {
                            dropdown.removeClass("open");
                        }
                    });
                }
            });
        };
    })(jQuery);

    $('select.f-dropdown').mySelectDropdown();

</script>

<script>
$(document).ready(function(){

    var baseUrl = $('#base_url').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $(document).on('click', '.editUser', function(){
        $('.inpute-text').attr('readonly', false);
        $('.acc_btn_').removeClass('d-none');
        $('.edit_password_').removeClass('d-none');
        $(this).hide();
    });  
    
    $(document).on('click', '.account_submit_btn',function(){
        let name = $('.name').val();
        !name ? $(`#name-error`).html(`The name field is required.`) : $(`#name-error`).html(``);

        let lastName = $('.lastName').val();
        !lastName ? $(`#lastName-error`).html(`The lastName field is required.`) : $(`#lastName-error`).html(``);

        // let email = $('.email').val();
        // !email ? $(`#email-error`).html(`The email field is required.`) : $(`#email-error`).html(``);

        if (!name || !lastName) {
            return;
        }
        
        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');

        formdata = new FormData();
        formdata.append('name', name);
        formdata.append('lastName', lastName);


        $.ajax({
            url: "{{route('update.user')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                $('.acc_btn_').addClass('d-none');
                $('.edit_password_').addClass('d-none');
                $('.editUser').show();
                $('.inpute-text').attr('readonly', true);
            }, error:function (response) {
                // $('#item-error').text(response.responseJSON.errors.item);
            }
        }); 
    });
});
</script>

@endpush
