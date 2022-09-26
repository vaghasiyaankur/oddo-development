@extends('layout::user.UserSite.master')

@section('title')
Policies
@endsection

@section('content')
<!------ Pannel Form start ------->
<section class="pannel-form admin-pannel-main py-5  hotel-policies">
    <div class="container">
        <div class="admin-pannel-inner">
            <div class="row">
                <div class="col-lg-3">
                    @include('usersite::side-bar')
                </div>
                <div class="col-lg-9">
                    <main class="policies">
                        <div class="pannel-heading">
                            <h2 class=" purple-dark pannel-title">Policies</h2>
                            <h5 class="heading-fs-16 purple-dark">Specify some basic policies. Do you allow children or pets? How flexible are you with cancellations?</h5>
                        </div>
                        <div class="form-info-box mt-3">
                            <input type="hidden" class="hotelId" value="{{ isset($hotelDetail) ? $hotelDetail->UUID : '' }}">
                            <form action="" class="form-cancel">
                                <div class="p-form-heading  d-flex">
                                    <h5>Cancellations</h5>
                                </div>
                                <div class="f-parking-title">
                                    <label for="" class="form-label label-heading">How many days in advance can guests cancel free of charge? </label>
                                </div>
                                <div class="p-form-select d-flex">
                                    <select class="form-select w-50 me-3 cancel-select">
                                        <option value="1" {{ isset($hotelDetail) && $hotelDetail->cancel_booking  == 1 ? 'selected' : '' }}>1 Day</option>
                                        <option value="2" {{ isset($hotelDetail) && $hotelDetail->cancel_booking  == 2 ? 'selected' : '' }}>2 days</option>
                                        <option value="3" {{ isset($hotelDetail) && $hotelDetail->cancel_booking  == 3 ? 'selected' : '' }}>3 days</option>
                                        <option value="7" {{ isset($hotelDetail) && $hotelDetail->cancel_booking  == 7 ? 'selected' : '' }}>7 days</option>
                                        <option value="14" {{ isset($hotelDetail) && $hotelDetail->cancel_booking == 14 ? 'selected' : '' }}>14 days</option>
                                    </select>
                                </div>
                                <div class="f-parking-title pt-3">
                                    <label for="" class="form-label label-heading">or guests will pay 100% </label>
                                </div>
                                <div class="p-form-select d-flex">
                                    <select class="form-select w-50 me-3 guest-pay">
                                        <option value="first_night" {{ isset($hotelDetail) && $hotelDetail->pay_type  == 'first_night' ? 'selected' : '' }}>of the first night</option>
                                        <option value="full_stay" {{ isset($hotelDetail) && $hotelDetail->pay_type  == 'full_stay' ? 'selected' : '' }}>of the full stay</option>
                                    </select>
                                </div>
                            </form>
                            <div class="policies-message mt-3">
                                <div class="policies-message-text">
                                    <p class="para-fs-14 m-0"><i class="fa-solid fa-bell"></i><span class="fw-bold"> The guest must cnacel 1 day in advance or pay 100% of the price of the whole stay.</span></p>
                                    <p class="para-fs-14 m-0">You'll be able to make changes to your policies later on - this is just to get you started.  </p>
                                </div>
                            </div>
                        </div>
                        <div class="pcheckinout-box d-flex justify-content-between h-policies-main">
                            <div class="form-info-box mt-3 w-50 me-3">
                                <form action="" class="form-cancel">
                                    <div class="p-form-heading pb-3">
                                        <h5>Check-in</h5>
                                    </div>
                                    <div class="h-check-in-out border-green mx-auto">
                                        <div class="timepicker_div ">
                                            <img src="{{asset('assets/images/icons/cal-icon.png')}}" class="pe-2">
                                            <span class="check-text text--green">check-in-time</span>
                                            <input type="text"  class="form-control timepicker text-center check_in" placeholder="Time" value="{{ isset($hotelDetail) && $hotelDetail->check_in ? $hotelDetail->check_in : '' }}">
                                        </div>
                                    </div>
                                    <span id="check_in_error" class="text-danger"></span>
                                </form>
                            </div>
                            <div class="form-info-box mt-3 w-50">
                                <form action="" class="form-cancel">
                                    <div class="p-form-heading pb-3">
                                        <h5>Chcek-out</h5>
                                    </div>
                                    <div class="h-check-in-out border-red mx-auto">
                                        <div class="timepicker_div ">
                                            <img src="{{asset('assets/images/icons/check-close.png')}}" class="pe-2">
                                            <span class="check-text text--red">check-in-out</span>
                                            <input type="text" class="form-control timepicker text-center check_out" placeholder="Time" readonly=""  value="{{ isset($hotelDetail) && $hotelDetail->check_out ? $hotelDetail->check_out : '' }}">
                                        </div>
                                    </div>
                                    <span  id="check_out_error" class="text-danger"></span>
                                </form>
                                <input type="hidden" class="complete" value="1">
                            </div>
                        </div>
                        <div class="another-c-details mt-4">
                            <a href="javascript:;" class="btn another-c-d-btn w-100 button-policy">Continue
                                <div class="spinner-border" role="status" style="display: none;">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a>
                        </div>
                    </main>
                </div>
            </div>
        </div>

    </div>
</section>
<!------ Pannel Form end ------->
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('Adminpannel design/css/pannel.css')}}">
<!------- Timepiker css Link------->
<link rel="stylesheet" href="{{asset('assets/css/timepiker.css')}}">
<style>
    .spinner-border {
        float: right;
        width: 20px;
        height: 20px;
        margin-top: 4px;
        border: 3px solid currentColor;
        border-right-color: transparent;
    }
</style>
@endpush

@push('scripts')
<!------- Moment js -----  -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!------- datetimepiker js link ---------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
<script src="{{asset('assets/js/timepiker.js')}}"></script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

    $('.timepicker').mdtimepicker();

    $(document).on('click', '.button-policy', function(){
        let check_in = $('.check_in').val();
        !check_in ? $(`#check_in_error`).html(`Select a room type`) : $(`#check_in_error`).html(``);

        let check_out = $('.check_out').val();
        !check_out ? $(`#check_out_error`).html(`Select a room type`) : $(`#check_out_error`).html(``);

        let hotelId = $('.hotelId').val();

        if (!check_in || !check_out) {
                return;
        }

        let cancel_select = $('.cancel-select option:selected').val();
        let guest_pay = $('.guest-pay option:selected').val();
        let complete = $('.complete').val();

        formdata = new FormData();

        formdata.append('cancel_select', cancel_select);
        formdata.append('guest_pay', guest_pay);
        formdata.append('check_in', check_in);
        formdata.append('check_out', check_out);
        formdata.append('complete', complete);
        formdata.append('hotelId', hotelId);
        
        $('.spinner-border').show();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "{{route('add-policy')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (res) {
                $("input[type=text], input[type=tel]").val("");
                if (res.redirect_url) {
                    window.location = res.redirect_url;
                }
            },
        });
    });


});
</script>
@endpush
