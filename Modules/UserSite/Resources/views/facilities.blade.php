@extends('user_site.layout.master')

@section('title')
Facilities
@endsection

@section('content')
<!------ Pannel Form start ------->
<section class="pannel-form admin-pannel-main py-5">
    <div class="container">
        <div class="admin-pannel-inner">
            <div class="row">
                <div class="col-3">
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
                                <div class="p-form-select d-flex justify-content-between">
                                    <select class="form-select w-50 me-3 parking-avaliable">
                                        <option value="no" selected>No</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                    <select class="form-select input-w-20 me-3 d-none parking-type">
                                        <option value="private" selected>Private</option>
                                        <option value="public">Public</option>
                                    </select>
                                    <select class="form-select input-w-20 d-none parking-site">
                                        <option value="on" selected>On site</option>
                                        <option value="off">Off site</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="form-info-box mt-3">
                            <form action="" class="form-breakfast">
                                <div class="p-form-heading  d-flex">
                                    <h5>Breakfast</h5>
                                </div>
                                <div class="f-parking-title">
                                    <label for="" class="form-label label-heading">Is breakfast available to
                                        guests?</label>
                                </div>
                                <div class="p-form-select d-flex">
                                    <select class="form-select w-50 me-3 brackfast_select">
                                        <option value="no" selected>no</option>
                                        <option value="optional">yes,it's optional</option>
                                    </select>
                                </div>
                                <div class="p-form-select pt-3 d-none food_type_div">
                                    <label for="" class="form-label label-heading">What kind of breakfast is available?</label>
                                    <select class="form-select w-50 smoking_area food_type_val">
                                        @foreach ($food_types as $food_type)
                                            <option value="{{$food_type->id}}">{{$food_type->food_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="form-info-box mt-3">
                            <form action="" class="form-breakfast">
                                <div class="p-form-heading d-flex">
                                    <h5>Languages Spoken</h5>
                                    <i class="fa-solid fa-circle-exclamation ps-2 mt-1" data-toggle="tooltip"
                                        data-bs-placement="top" title="What languages do you or your staff speak?"></i>
                                </div>
                                <div id="add_languages">
                                    <div class="p-form-select d-flex mb-3">
                                        <input type="hidden" class="number-of-select" value="1">
                                        <select class="form-select w-25 me-3 language language_1" name="language">
                                            <option value="">Please select</option>
                                            <option value="english">English</option>
                                            <option value="hindi">Hindi</option>
                                            <option value="russian">Russian</option>
                                        </select>
                                    </div>
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
                                <div class="facilities-list pt-4">      
                                    <div class="facilities-check d-flex flex-wrap align-items-center justify-content-between">
                                        @foreach ($facilities as $facilitate)
                                            <div class="form-check py-3 border--dotted">
                                                <label class="form-check-label para-fs-14 fs-6">
                                                    <input class="form-check-input facilities_check" name="facilities_check[]" type="checkbox" value="{{$facilitate->id}}">
                                                    {{$facilitate->facilities_name}}
                                                </label>
                                            </div>
                                        @endforeach     
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="another-c-details mt-4">
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

        $(document).on('change', '.brackfast_select', function(){
            var breakfast = $(this).val();
            if(breakfast == 'no'){
                $('.breakfast_price_div').addClass('d-none');
                $('.food_type_div').addClass('d-none');
            }

            if(breakfast == 'optional'){
                $('.food_type_div').removeClass('d-none');
            }
        });

        $('.facilities-button').on('click', function(){
            var number = $('.number-of-select').val();

            let languageSelect = $('.language option:selected').val();
            !languageSelect ? $(`#language_error_1`).html(`Select a language type`) : $(`#language_error_1`).html(``);

            if (!languageSelect) {
                return;
            }

            
            let parking_avaliable = $('.parking-avaliable').val();
            let parking_type      = $('.parking-type').val();
            let parking_site      = $('.parking-site').val();
            let brackfast_select  = $('.brackfast_select').val();
            let food_type_val     = $('.food_type_val').val();
            var language          = $('.language option:selected').map(function(){return $(this).val();}).get();
            var facilities        = $("input[name='facilities_check[]']:checked").map(function(){return $(this).val();}).get();

            formdata = new FormData();

            formdata.append('parking_avaliable', parking_avaliable);
            if(parking_avaliable == 'yes'){
                formdata.append('parking_type', parking_type);
                formdata.append('parking_site', parking_site); }
            formdata.append('brackfast_select', brackfast_select);
            if(brackfast_select == 'optional'){
                formdata.append('food_type_val', food_type_val); }
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