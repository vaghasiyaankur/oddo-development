@extends('layout::user.UserSite.master')

@section('title', 'Facilities')
@section('meta_description', 'Page Facilities')
@section('meta_keywords', 'Page, Facilities')

@section('content')
<!------ Pannel Form start ------->
<section class="pannel-form admin-pannel-main py-5">
    <div class="container">
        <div class="admin-pannel-inner">
            <div class="row">
                <div class="col-lg-3">
                    @include('usersite::side-bar')
                </div>
                <div class="col-lg-9">
                    <main class="facilities">
                        <div class="pannel-heading">
                            <h2 class=" purple-dark pannel-title">Facilities & Services</h2>
                            <h5 class="heading-fs-16 purple-dark">Now let us know some general details about your
                                property like facilities available,internet,parking and languages you speak.</h5>
                        </div>
                        <div class="form-info-box">
                            <form action="" class="form-parking">
                                <div class="p-form-heading  d-flex">
                                    <h5>Parking</h5>
                                    <i class="fa-solid fa-circle-exclamation ps-2 mt-1" data-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="This information is especially important for those traveling to your property by car."></i>
                                </div>
                                <div class="f-parking-title">
                                    <label for="" class="form-label label-heading">Is parking available for
                                        guests?</label>
                                </div>
                                <div class="p-form-select d-flex justify-content-between flex-wrap">
                                    <input type="hidden" value="{{ isset($hotelDetail) ? $hotelDetail->UUID : '' }}" class="hotelId">
                                    <select class="form-select w-50 me-3 parking-avaliable">
                                        <option value="no" {{ isset($hotelDetail) && $hotelDetail->parking_available == 'no' ? 'selected' : '' }}>No</option>
                                        <option value="yes" {{ isset($hotelDetail) && $hotelDetail->parking_available == 'yes' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                    <select class="form-select input-w-20 me-3 mt-2 mt-lg-0 {{ isset($hotelDetail) && $hotelDetail->parking_available == 'yes' ? '' : 'd-none' }} parking-type">
                                        <option value="private" {{ isset($hotelDetail) && $hotelDetail->parking_type == 'private' ? 'selected' : '' }}>Private</option>
                                        <option value="public" {{ isset($hotelDetail) && $hotelDetail->parking_type == 'public' ? 'selected' : '' }}>Public</option>
                                    </select>
                                    <select class="form-select input-w-20 me-3 me-lg-0 mt-2 mt-lg-0 {{ isset($hotelDetail) && $hotelDetail->parking_available == 'yes' ? '' : 'd-none' }} parking-site">
                                        <option value="on"  {{ isset($hotelDetail) && $hotelDetail->parking_site == 'on' ? 'selected' : '' }}>On site</option>
                                        <option value="off" {{ isset($hotelDetail) && $hotelDetail->parking_site == 'off' ? 'selected' : '' }}>Off site</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        {{-- BreakFast Section Start --}}
                        <div class="form-info-box mt-3">
                            <form action="" class="form-breakfast">
                                <div class="p-form-heading  d-flex">
                                    <h5>Meals</h5>
                                </div>
                                <div class="f-parking-title">
                                    <label for="" class="form-label label-heading">Is breakfast available to
                                        guests?</label>
                                </div>
                                <div class="p-form-select d-flex">
                                    <select class="form-select w-50 me-3 breakfast_select">
                                        <option value="no"  {{ isset($hotelDetail) && $hotelDetail->breakfast == 'no' ? 'selected' : '' }}>no</option>
                                        <option value="optional" {{ isset($hotelDetail) && $hotelDetail->breakfast == 'optional' ? 'selected' : '' }}>yes,it's optional</option>
                                    </select>
                                </div>
                                <div class="p-form-select pt-3  {{ isset($hotelDetail) && $hotelDetail->breakfast == 'optional' ? '' : 'd-none' }} food_type_div">
                                    <label for="" class="form-label label-heading">What kind of breakfast is available?</label>
                                    <select class="form-select w-50 smoking_area breakfast_type_val">
                                        @foreach ($food_types as $food_type)
                                            <option value="{{$food_type->id}}" {{ isset($hotelDetail) && $food_type->id == $hotelDetail->breakfast_type ? 'selected' : '' }}>{{$food_type->food_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        {{-- BreakFast Section End --}}
                        {{-- Lunch Section Start --}}
                        <div class="form-info-box mt-3">
                            <form action="" class="form-lunch">
                                <div class="p-form-heading  d-flex">
                                    <h5>Lunch</h5>
                                </div>
                                <div class="f-parking-title">
                                    <label for="" class="form-label label-heading">Is lunch available to
                                        guests?</label>
                                </div>
                                <div class="p-form-select d-flex">
                                    <select class="form-select w-50 me-3 lunch_select">
                                        <option value="no"  {{ isset($hotelDetail) && $hotelDetail->lunch == 'no' ? 'selected' : '' }}>no</option>
                                        <option value="optional" {{ isset($hotelDetail) && $hotelDetail->lunch == 'optional' ? 'selected' : '' }}>yes,it's optional</option>
                                    </select>
                                </div>
                                <div class="p-form-select pt-3  {{ isset($hotelDetail) && $hotelDetail->lunch == 'optional' ? '' : 'd-none' }} lunch_food_type_div">
                                    <label for="" class="form-label label-heading">What kind of breakfast is available?</label>
                                    <select class="form-select w-50 smoking_area lunch_type_val">
                                        @foreach ($food_types as $food_type)
                                            <option value="{{$food_type->id}}" {{ isset($hotelDetail) && $food_type->id == $hotelDetail->lunch_type ? 'selected' : '' }}>{{$food_type->food_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        {{-- Lunch Section End --}}
                        {{-- Dinner Section Start --}}
                        <div class="form-info-box mt-3">
                            <form action="" class="form-dinner">
                                <div class="p-form-heading  d-flex">
                                    <h5>Dinner</h5>
                                </div>
                                <div class="f-parking-title">
                                    <label for="" class="form-label label-heading">Is dinner available to
                                        guests?</label>
                                </div>
                                <div class="p-form-select d-flex">
                                    <select class="form-select w-50 me-3 dinner_select">
                                        <option value="no"  {{ isset($hotelDetail) && $hotelDetail->dinner == 'no' ? 'selected' : '' }}>no</option>
                                        <option value="optional" {{ isset($hotelDetail) && $hotelDetail->dinner == 'optional' ? 'selected' : '' }}>yes,it's optional</option>
                                    </select>
                                </div>
                                <div class="p-form-select pt-3  {{ isset($hotelDetail) && $hotelDetail->dinner == 'optional' ? '' : 'd-none' }} dinner_food_type_div">
                                    <label for="" class="form-label label-heading">What kind of breakfast is available?</label>
                                    <select class="form-select w-50 smoking_area dinner_type_val">
                                        @foreach ($food_types as $food_type)
                                            <option value="{{$food_type->id}}" {{ isset($hotelDetail) && $food_type->id == $hotelDetail->dinner_type ? 'selected' : '' }}>{{$food_type->food_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        {{-- Dinner Section End --}}
                        <div class="form-info-box mt-3">
                            <form action="" class="form-breakfast">
                                <div class="p-form-heading d-flex">
                                    <h5>Languages Spoken</h5>
                                    <i class="fa-solid fa-circle-exclamation ps-2 mt-1" data-toggle="tooltip"
                                        data-bs-placement="top" title="What languages do you or your staff speak?"></i>
                                </div>
                                <div id="add_languages">
                                    @if(isset($hotelDetail))
                                        <?php
                                            if(isset($hotelDetail)) $languages = explode(',', $hotelDetail->language );
                                        ?>
                                        @foreach ($languages as $language)
                                            <div class="p-form-select d-flex mb-3">
                                                <input type="hidden" class="number-of-select" value="1">
                                                <select class="form-select w-25 me-3 language language_1" name="language">
                                                    <option value="">Please select</option>
                                                    <option value="english" {{ $language == 'english' ? 'selected' : '' }}>English</option>
                                                    <option value="hindi" {{ $language == 'hindi' ? 'selected' : '' }}>Hindi</option>
                                                    <option value="russian" {{ $language == 'russian' ? 'selected' : '' }}>Russian</option>
                                                </select>
                                            </div>
                                        @endforeach
                                    @else
                                    <div class="p-form-select d-flex mb-3">
                                        <input type="hidden" class="number-of-select" value="1">
                                        <select class="form-select w-25 me-3 language language_1" name="language">
                                            <option value="">Please select</option>
                                            <option value="english">English</option>
                                            <option value="hindi">Hindi</option>
                                            <option value="russian">Russian</option>
                                        </select>
                                    </div>
                                    @endif
                                    <span id="language_error_1" class="text-danger"></span>
                                </div>
                            </form>
                            <div class="pannel-add-another py-3" >
                                <a href="javascript:;" class="para-fs-14"  id="p_add_lan"><i class="fa-solid fa-circle-plus purple"></i> <span class="purple">Add another languages</span></a>
                            </div>
                        </div>
                        <div class="form-info-box mt-3">
                            <form action="" class="form-facility-part">
                                <div class="p-form-heading d-flex">
                                    <h5>Facilities That Are Popular With Guests</h5>
                                    <i class="fa-solid fa-circle-exclamation ps-2 mt-1" data-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Guests look for these facilities the most when they are searching for properties."></i>
                                </div>
                                <?php
                                    if(isset($hotelDetail)) $facilitites = explode(',', $hotelDetail->facilities_id );
                                ?>
                                <div class="facilities-list pt-4">
                                    <div class="facilities-check d-flex flex-wrap align-items-center justify-content-between">
                                        @foreach ($facilities as $facilitate)
                                            <div class="form-check py-3 border--dotted">
                                                <label class="form-check-label para-fs-14 fs-6 w-100">
                                                    <input class="form-check-input facilities_check" name="facilities_check[]" type="checkbox" value="{{$facilitate->id}}" {{  isset($hotelDetail) && in_array($facilitate->id, $facilitites) ? 'checked' : '' }}>
                                                    {{$facilitate->facilities_name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="another-c-details mt-4">
                            {{-- <a href="javascript:;" class="btn another-c-d-btn w-100 {{  isset($hotelDetail) ? 'update-facilities-button' : 'facilities-button' }} ">Continue
                                <div class="spinner-border" role="status" style="display: none;">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a> --}}

                            <a href="javascript:;" class="btn another-c-d-btn w-100 facilities-button">Continue
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

<style>
    .spinner-border {
        float: right;
        width: 20px;
        height: 20px;
        margin-top: 4px;
        border: 3px solid currentColor;
        border-right-color: transparent;
    }

    .form-check{
        flex: 0 0 48%;
        max-width: 48%;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();

        $('.parking-avaliable').on('change', function(){
            var parking = $('.parking-avaliable :selected').val();
            if(parking == 'no') {
                $('.parking-site').addClass('d-none');
                $('.parking-type').addClass('d-none');;
            }

            if(parking == 'yes') {
                $('.parking-site').removeClass('d-none');
                $('.parking-type').removeClass('d-none');
            }

        });

        $("#p_add_lan").bind("click", function () {
            var number = $('.number-of-select').val();
            var numbers = parseInt(number)+1;
            $("#add_languages").append('<div class="p-form-select d-flex mb-3 align-items-center">' +
                                            '<select class="form-select w-25 me-3 language language_'+numbers+'" name="language">' +
                                                '<option value="english">English</option>' +
                                                '<option value="hindi">Hindi</option>' +
                                                '<option value="russian">Russian</option>' +
                                            '</select>' +
                                            '<i class="fa-solid fa-xmark text--red ps-3 "></i>' + '<input type="button"  value="Remove" class="remove bedoption-remove-btn ps-2 text--red" />' +
                                        '</div>' +
                                        '<span id="language_error_'+numbers+'" class="text-danger"></span>');

                                        var number = $('.number-of-select').val(numbers);

        });

        $("body").on("click", ".remove", function () {
            $(this).closest("div").remove();
            var number = $('.number-of-select').val();
            var numbers = parseInt(number)-1;
            var number = $('.number-of-select').val(numbers);
        });

        $(document).on('change', '.breakfast_select', function(){
            var breakfast = $(this).val();
            if(breakfast == 'no'){
                $('.breakfast_price_div').addClass('d-none');
                $('.food_type_div').addClass('d-none');
            }
            if(breakfast == 'optional') $('.food_type_div').removeClass('d-none');
        });

        $(document).on('change', '.lunch_select', function(){
            var lunch = $(this).val();
            if(lunch == 'no')  $('.lunch_food_type_div').addClass('d-none');
            if(lunch == 'optional')  $('.lunch_food_type_div').removeClass('d-none');
        });

        $(document).on('change', '.dinner_select', function(){
            var dinner = $(this).val();
            if(dinner == 'no')  $('.dinner_food_type_div').addClass('d-none');
            if(dinner == 'optional')    $('.dinner_food_type_div').removeClass('d-none');
        });
        

        $('.facilities-button').on('click', function(){
            var number = $('.number-of-select').val();
            var hotelId = $('.hotelId').val();
            
            let languageSelect = $('.language option:selected').val();
            if (!languageSelect) {
                $(`#language_error_1`).html(`Select a language type`);
                return;
            } else {
                $(`#language_error_1`).html(``);
            }

            let parking_type       = $('.parking-type').val();
            let parking_avaliable  = $('.parking-avaliable').val();
            let parking_site       = $('.parking-site').val();
            let breakfast_select   = $('.breakfast_select').val();
            let lunch_select       = $('.lunch_select').val();
            let dinner_select      = $('.dinner_select').val();
            let breakfast_type_val = $('.breakfast_type_val').val();
            let lunch_type_val     = $('.lunch_type_val').val();
            let dinner_type_val    = $('.dinner_type_val').val();
            var language           = $('.language option:selected').map(function(){return $(this).val();}).get();
            var facilities         = $("input[name='facilities_check[]']:checked").map(function(){return $(this).val();}).get();

            formdata = new FormData();

            formdata.append('parking_avaliable', parking_avaliable);
            formdata.append('hotelId', hotelId);
            if(parking_avaliable == 'yes') {
                formdata.append('parking_type', parking_type);
                formdata.append('parking_site', parking_site);
            }
            
            formdata.append('breakfast_select', breakfast_select);
            if(breakfast_select == 'optional') formdata.append('breakfast_type_val', breakfast_type_val);
            
            formdata.append('lunch_select', lunch_select);
            if(lunch_select == 'optional') formdata.append('lunch_type_val', lunch_type_val);
            
            formdata.append('dinner_select', dinner_select);
            if(dinner_select == 'optional') formdata.append('dinner_type_val', dinner_type_val);
            
            formdata.append('facilities', facilities);
            formdata.append('language', language);

            $('.spinner-border').show();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: "{{route('add-facilities')}}",
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
