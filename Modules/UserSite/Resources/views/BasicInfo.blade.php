@extends('layout::user.UserSite.master')

@section('title', 'Basic Info')
@section('meta_description', 'Page Basic Info')
@section('meta_keywords', 'Page, Basic Info')

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
                    <div class="pannel-heading">
                        <h2 class=" purple-dark pannel-title">Welcome</h3>
                            <h5 class="heading-fs-16 purple-dark">Start by telling us your property's name, Contact
                                details, and address</h5>
                    </div>
                    <div class="form-info-box">
                        <form action="" class="form-name-info">
                            <div class="p-form-heading">
                                <h5>What’s the name of your property?</h5>
                            </div>
                            <input type="hidden" class="hotelId" value="{{ isset($hotelDetail) ? $hotelDetail->UUID : '' }}">
                            <div class="input-with-icon d-flex justify-content-center align-items-center">
                                <input type="text" class="form-control custom-from-control border-0 property_name"
                                    name="property_name" value="{{ isset($hotelDetail) ? $hotelDetail->property_name : '' }}">
                                <i class="fa-solid fa-circle-exclamation pe-2" data-toggle="tooltip"
                                    data-bs-placement="bottom"
                                    title="Guests will see this name when they search for place to stay"></i>

                            </div>
                            <span id="property-name-error" class="text-danger"></span>
                            @if(@$hotelDetail->propertytype->type == 'Hotel')
                                <div class="p-form-select pt-3">
                                    <label for="" class="form-label label-heading">Star rating</label>
                                    <select class="form-select c-form-select star_rating" name="star_rating"
                                        aria-label="Default select example" >
                                        <option value="N/A" selected>N/A</option>
                                        <option value="1" {{ isset($hotelDetail) && $hotelDetail->star_rating == 1 ? 'selected' : '' }}>1 Star</option>
                                        <option value="2" {{ isset($hotelDetail) && $hotelDetail->star_rating == 2 ? 'selected' : '' }}>2 Star</option>
                                        <option value="3" {{ isset($hotelDetail) && $hotelDetail->star_rating == 3 ? 'selected' : '' }}>3 Star</option>
                                        <option value="4" {{ isset($hotelDetail) && $hotelDetail->star_rating == 4 ? 'selected' : '' }}>4 Star</option>
                                        <option value="5" {{ isset($hotelDetail) && $hotelDetail->star_rating == 5 ? 'selected' : '' }}>5 Star</option>
                                    </select>
                                </div>
                            <span id="star_rating-error" class="text-danger"></span>
                            @endif
                        </form>
                    </div>
                    <div class="form-info-box mt-3">
                        <form action="" class="form-name-info">
                            <div class="p-form-heading">
                                <h5>Description</h5>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control description" id="" rows="4">{{ isset($hotelDetail) ? $hotelDetail->description : '' }}</textarea>
                                <span id="description-error" class="text-danger"></span>
                            </div>
                        </form>
                    </div>
                    <div class="form-info-box mt-3">
                        <form action="" class="form-contact-info">
                            <div class="p-form-heading">
                                <h5 class="mb-0">What’s the contact details for this property?</h5>
                            </div>
                            @if(isset($hotelContacts) && $hotelContacts->count() > 0)
                            <div id="add_pro_detail">
                                @foreach ($hotelContacts as $key => $hotelContact)
                                <div class="data_1 contact-div contact-border">
                                    <input type="hidden" class='contant_count' value="{{$key+1}}">
                                    <div class="contact--name pt-3">
                                        <label for="contactname" class="form-label label-heading">Contact Name</label>
                                        <input type="hidden"  class="hotelContactId" value="{{$hotelContact->UUID}}">
                                        <input type="text" id="contactname" name="contactname_1" class="form-control custom-from-control contactname_1" value="{{$hotelContact->name}}">
                                    </div>
                                    <div class="contact-number py-3">
                                        <div class="contact-number-main d-flex">
                                            <div class="contact-number-inner phone-div">
                                                <label for="phone_1" class="form-label label-heading ">Phone Number</label>
                                                <input type="tel" name="phone_1" id="phone_1" class="form-control custom-from-control phone_1 phoneNumber" value="{{$hotelContact->number}}" />
                                            </div>
                                            <div class="contact-number-inner margin--left phone-optional-div">
                                                <label for="optional_1" class="form-label label-heading " style="white-space: nowrap;">Alternative Phone Number(Optional)</label>
                                                <input type="tel"  name="optional_1" id="optional_1" class="form-control custom-from-control optional_1 phoneOptinal" value="{{$hotelContact->number_optinal}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else
                                <div id="add_pro_detail">
                                    <div class="data_1 contact-div">
                                        <input type="hidden" class='contant_count' value="1">
                                        <div class="contact--name">
                                            <input type="hidden"  class="hotelContactId" value="0">
                                            <label for="contactname" class="form-label label-heading">Contact Name</label>
                                            <input type="text" id="contactname" name="contactname_1" class="form-control custom-from-control contactname_1">
                                        </div>
                                        <div class="contact-number pt-3">
                                            <div class="contact-number-main d-flex">
                                                <div class="contact-number-inner phone-div">
                                                    <label for="phone_1" class="form-label label-heading ">Phone Number</label>
                                                    <input type="tel" name="phone_1" id="phone_1" class="form-control custom-from-control phone_1 phoneNumber" />
                                                </div>
                                                <div class="contact-number-inner margin--left phone-optional-div">
                                                    <label for="optional_1" class="form-label label-heading " style="white-space: nowrap;">Alternative Phone Number(Optional)</label>
                                                    <input type="tel"  name="optional_1" id="optional_1" class="form-control custom-from-control optional_1 phoneOptinal" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="another-c-details mt-4">
                                <a href="javascript:;" class="btn another-c-d-btn" id="add_contact_detail">Add Another Contact Details</a>
                            </div>
                        </form>
                    </div>
                    <div class="form-info-box mt-3">
                        <form action="" class="form-c-m">
                            <div class="p-form-heading">
                                <h5>Where's your Property Located?</h5>
                            </div>
                            <div class="p-locat-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="p-l-inner">
                                            <div class="mb-3">
                                                <label class="form-label">Street address</label>
                                                <input class="form-control custom-from-control address" type="text"
                                                    name="address" placeholder="eg.123 easy street" value="{{ isset($hotelDetail) ? $hotelDetail->street_addess : '' }}">
                                                    <span id="address-error" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Address line 2</label>
                                                <input class="form-control custom-from-control address_line" type="text"
                                                    name="address_line"
                                                    placeholder="unit number, suite, floor,building,etc" value="{{ isset($hotelDetail) ? $hotelDetail->address_line : '' }}">
                                                    <span id="address_line-error" class="text-danger"></span>
                                            </div>
                                            <div class="p-l-dropdwon mb-3">
                                                <label for="" class="form-label">Country/Region</label>
                                                <select class="form-select country" name="country">
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}" {{ isset($hotelDetail) && $country->id == $hotelDetail->country_id ? 'selected' : '' }}>{{$country->country_name}}</option>
                                                    @endforeach
                                                    <span id="country-error" class="text-danger"></span>
                                                </select>
                                            </div>

                                            <div class="p-l-dropdwon mb-3">
                                                <label for="" class="form-label">City</label>
                                                <select class="form-select city" name="city">
                                                    @foreach($countries as $country)
                                                        @foreach($country->cities as $cities)
                                                            <option value="{{$cities->id}}" {{ isset($hotelDetail) && $cities->id == $hotelDetail->city_id ? 'selected' : '' }}>{{$cities->name}}</option>
                                                        @endforeach
                                                    @endforeach
                                                    <span id="city-error" class="text-danger"></span>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Zip Code</label>
                                                <input class="form-control custom-from-control zipcode" type="number"
                                                    name="zipcode" placeholder="eg.123456" value="{{ isset($hotelDetail) ? $hotelDetail->pos_code : '' }}">
                                                    <span id="zipcode-error" class="text-danger"></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-l-messagebox">
                                            <div class="p-l-messagebox-inner d-flex flex-wrap">
                                                <div class="messagebox-icon">
                                                    <i class="fa-solid fa-envelope-open-text"></i>
                                                </div>
                                                <div class="messagebox-content">
                                                    <h5 class="heading-fs-16">Your Address Matters</h5>
                                                    <p class="para-fs-14">Make sure you enter the full address of your
                                                        property including bulding name,number,etc Base on the info you
                                                        provide, we might send a letter to verify this address.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- @if(isset($hotelDetail)) --}}
                        {{-- <div class="another-c-details mt-4">
                            <a href="javascript:;" class="btn another-c-d-btn w-100 btn-update-click">Continue
                                <div class="spinner-border" role="status" style="display: none;">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a>
                        </div> --}}
                    {{-- @else --}}
                        <div class="another-c-details mt-4">
                            <a href="javascript:;" class="btn another-c-d-btn w-100 btn-submit-click">Continue
                                <div class="spinner-border" role="status" style="display: none;">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a>
                        </div>
                    {{-- @endif --}}
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

    .contact-border:not(:first-child) {
        border-top: 1px solid #ced4da;
        margin-top:15px;

    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(document).ready(function(){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


        $(".btn-submit-click").on('click', function(){
            let hotelId = $('.hotelId').val();

            let property_name = $('.property_name').val();
            !property_name ? $(`#property-name-error`).html(`The Property Name field is required.`) : $(`#property-name-error`).html(``);

            let star_rating = $('.star_rating').val();
            !star_rating ? $(`#star_rating-error`).html(`The Star Rating field is required.`) : $(`#star_rating-error`).html(``);

            let contact_name = $('.contact_name').val();
            !contact_name ? $(`#contact_name-error`).html(`The Contact Name field is required.`) : $(`#contact_name-error`).html(``);

            let contact_phone = $('.contact_phone').val();
            !contact_phone ? $(`#contact_phone-error`).html(`The Contact Phone field is required.`) : $(`#contact_phone-error`).html(``);

            let contact_phone_optional = $('.contact_phone_optional').val();

            let address = $('.address').val();
            !address ? $(`#address-error`).html(`The Address Line field is required.`) : $(`#address-error`).html(``);

            let address_line = $('.address_line').val();

            let country = $('.country').val();
            !country ? $(`#country-error`).html(`The Country field is required.`) : $(`#country-error`).html(``);

            let city = $('.city').val();
            !city ? $(`#city-error`).html(`The City field is required.`) : $(`#city-error`).html(``);

            let zipcode = $('.zipcode').val();
            !zipcode ? $(`#zipcode-error`).html(`The Zipcode field is required.`) : $(`#zipcode-error`).html(``);

            let description = $('.description').val();
            !description ? $(`#description-error`).html(`The description field is required.`) : $(`#description-error`).html(``);

            var contactDetail  = $(".contact-div").map(function(){return {
                id : $(this).children('.contact--name').children('.hotelContactId').val(),
                name : $(this).children('.contact--name').children('#contactname').val(),
                phone : $(this).children('.contact-number').children('.contact-number-main').children('.phone-div').children('.phoneNumber').val(),
                phoneOptional : $(this).children('.contact-number').children('.contact-number-main').children('.phone-optional-div').children('.phoneOptinal').val()

            }}).get();

            if (!property_name || !address || !country || !city || !zipcode) {
                return;
            }

            formdata = new FormData();
            formdata.append('hotelId', hotelId);
            formdata.append('property_name', property_name);
            formdata.append('star_rating', star_rating);
            formdata.append('description', description);
            formdata.append('contactDetail', JSON.stringify(contactDetail));
            formdata.append('address', address);
            formdata.append('address_line', address_line);
            formdata.append('country', country);
            formdata.append('city', city);
            formdata.append('zipcode', zipcode);


            $('.spinner-border').show();
            $.ajax({
                // headers: {
                //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                // },
                url: "{{route('add-property-form')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (res) {
                    $('.spinner-border').hide();
                    $("input[type=text], input[type=tel]").val("");
                    if (res.redirect_url) {
                        window.location = res.redirect_url;
                    }
                },
            });
        });

        $("#add_contact_detail").bind("click", function () {

                $("#add_pro_detail").append('<div class="remove-p-details border-1 contact-div contact-border"  style="">' +
                    '<div class="contact--name pt-3 ">' +
                        '<label for="contactname" class="form-label label-heading">Contact Name</label>' +
                        '<input type="hidden"  class="hotelContactId" value="0">' +
                        '<input type="text" id="contactname" name="" class="form-control custom-from-control ">' +
                    '</div>' +
                    '<div class="contact-number py-3">' +
                        '<div class="contact-number-main d-flex align-items-center">' +
                            '<div class="contact-number-inner phone-div">' +
                                '<label for="" class="form-label label-heading " style="white-space: nowrap;">Phone Number</label>' +
                                '<input type="tel" name="" class="form-control custom-from-control  phoneNumber">' +
                            '</div>' +
                            '<div class="contact-number-inner margin--left phone-optional-div">' +
                                '<label for="" class="form-label label-heading "style="white-space: nowrap;">Alternative Phone Number(Optional)</label>' +
                                ' <input type="tel" name=""  class="form-control custom-from-control phoneOptinal">' +
                            '</div>' +
                            '<i class="fa-solid fa-xmark text--red ps-3 "></i>' + '<input type="button"  value="Remove" class="remove bedoption-remove-btn ps-2 text--red" />' + '</div>' +
                    '</div>' +
                '</div>');



        });

        $("body").on("click", ".remove", function () {
            $(this).closest(".remove-p-details").remove();
        });

        $('.country').on('change',function() {
            var country = $(this).val();
            $.ajax({
                url:"{{ route('cities') }}",
                type:"POST",
                data: {
                    country: country
                },
                success:function (data) {
                    $('.city').empty();
                    $.each(data.cities[0].cities,function(index,cities){
                        $('.city').append('<option value="'+cities.id+'">'+cities.name+'</option>');
                    })
                }
            });
        });
    });
</script>
@endpush
