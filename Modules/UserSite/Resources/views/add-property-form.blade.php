@extends('user_site.layout.master')

@section('title')
Add-Property
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
                <div class="col-9">
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
                            <div class="input-with-icon d-flex justify-content-center align-items-center">
                                <input type="text" class="form-control custom-from-control border-0 property_name"
                                    name="property_name">
                                <i class="fa-solid fa-circle-exclamation pe-2" data-toggle="tooltip"
                                    data-bs-placement="bottom"
                                    title="Guests will see this name when they search for place to stay"></i>
                                   
                            </div>
                            <span id="property-name-error" class="text-danger"></span>
                            <div class="p-form-select pt-3">
                                <label for="" class="form-label label-heading">Star rating</label>
                                <select class="form-select c-form-select star_rating" name="star_rating"
                                    aria-label="Default select example">
                                    <option value="N/A" selected>N/A</option>
                                    <option value="1">1 Star</option>
                                    <option value="2">2 Star</option>
                                    <option value="3">3 Star</option>
                                    <option value="4">4 Star</option>
                                    <option value="5">5 Star</option>
                                </select>
                            </div>
                            <span id="star_rating-error" class="text-danger"></span>
                        </form>
                    </div>
                    <div class="form-info-box mt-3">
                        <form action="" class="form-contact-info">
                            <div class="p-form-heading">
                                <h5>What’s the contact details for this property?</h5>
                            </div>
                            <div class="contact--name">
                                <label for="contactname" class="form-label label-heading">Contact
                                    Name</label>
                                <input type="text" id="contactname" name="contact_name"
                                    class="form-control custom-from-control contact_name">
                            </div>
                            <span id="contact_name-error" class="text-danger"></span>

                            <div class="contact-number pt-3">
                                <div class="contact-number-main d-flex">
                                    <div class="contact-number-inner">
                                        <label for="" class="form-label label-heading ">Phone Number</label>
                                        <input type="tel" class="form-control custom-from-control contact_phone"
                                            name="contact_phone">
                                            <span id="contact_phone-error" class="text-danger"></span>
                                    </div>
                                    
                                    <div class="contact-number-inner mx-auto">
                                        <label for="" class="form-label label-heading ">Alternative Phone
                                            Number(Optional)</label>
                                        <input type="tel"
                                            class="form-control custom-from-control contact_phone_optional"
                                            name="contact_phone_optional">
                                    </div>
                                </div>
                            </div>
                            <div class="another-c-details mt-4">
                                <a href="javascript:;" class="btn another-c-d-btn">Add Another Contact Details</a>
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
                                    <div class="col-6">
                                        <div class="p-l-inner">
                                            <div class="mb-3">
                                                <label class="form-label">Street address</label>
                                                <input class="form-control custom-from-control address" type="text"
                                                    name="address" placeholder="eg.123 easy street">
                                                    <span id="address-error" class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Address line 2</label>
                                                <input class="form-control custom-from-control address_line" type="text"
                                                    name="address_line"
                                                    placeholder="unit number, suite, floor,building,etc">
                                                    <span id="address_line-error" class="text-danger"></span>
                                            </div>
                                            <div class="p-l-dropdwon mb-3">
                                                <label for="" class="form-label">Country/Region</label>
                                                <select class="form-select country" name="country">
                                                    {{-- <option selected>India</option>
                                                    <option value="usa">USA</option>
                                                    <option value="uk">UK</option>
                                                    <option value="ru">Russia</option> --}}
                                                    @foreach($countrys as $country)
                                                    <option>{{$country->country_name}}</option>
                                                    @endforeach
                                                    <span id="country-error" class="text-danger"></span>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">City</label>
                                                <input class="form-control custom-from-control city" type="text"
                                                    name="city" placeholder="eg.Mumbai">
                                                    <span id="city-error" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Zip Code</label>
                                                <input class="form-control custom-from-control zipcode" type="text"
                                                    name="zipcode" placeholder="eg.123456">
                                                    <span id="zipcode-error" class="text-danger"></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-l-messagebox">
                                            <div class="p-l-messagebox-inner d-flex">
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
                    <div class="another-c-details mt-4">
                        <a href="javascript:;" class="btn another-c-d-btn w-100 btn-submit-click">Continue
                            <div class="spinner-border" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </a>
                    </div>
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
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(document).ready(function(){

        $(".btn-submit-click").on('click', function(){
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
            !address_line ? $(`#address_line-error`).html(`The Address Line field is required.`) : $(`#address_line-error`).html(``);

            let country = $('.country').val();
            !country ? $(`#country-error`).html(`The Country field is required.`) : $(`#country-error`).html(``);
            
            let city = $('.city').val();
            !city ? $(`#city-error`).html(`The City field is required.`) : $(`#city-error`).html(``);

            let zipcode = $('.zipcode').val();
            !zipcode ? $(`#zipcode-error`).html(`The Zipcode field is required.`) : $(`#zipcode-error`).html(``);

            formdata = new FormData();

            formdata.append('property_name', property_name);
            formdata.append('star_rating', star_rating);
            formdata.append('contact_name', contact_name);
            formdata.append('contact_phone', contact_phone);
            formdata.append('contact_phone_optional', contact_phone_optional);
            formdata.append('address', address);
            formdata.append('address_line', address_line);
            formdata.append('country', country);
            formdata.append('city', city);
            formdata.append('zipcode', zipcode);

            $('.spinner-border').show();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: "{{route('add-property-form')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (res) {
                    $('.spinner-border').hide();
                    $("input[type=text], input[type=tel]").val("");
                },
            }); 
        });
    });
</script>
@endpush