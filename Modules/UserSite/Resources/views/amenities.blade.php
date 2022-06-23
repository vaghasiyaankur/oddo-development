@extends('layout::user.UserSite.master')

@section('title')
Add-Layout
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
                    <main class="amenities">
                        <div class="pannel-heading">
                            <h2 class=" purple-dark pannel-title">Amenities</h2>
                            <h5 class="heading-fs-16 purple-dark">You are almost done! We just need a few more details about the extra bed options you provide,pluse any amenities or specific features and services available.</h5>
                        </div>
                        <div class="form-info-box">
                            <form action="" class="form-parking">
                                <div class="p-form-heading  d-flex">
                                    <h5>Extra Bed Options</h5>
                                    <i class="fa-solid fa-circle-exclamation ps-2 mt-1"  data-toggle="tooltip" data-bs-placement="top" title="This are the option for beds that can be added upon request."></i>
                                </div>
                                <div class="amenities-title pt-3">
                                    <label for="" class="form-label label-heading ">Can you provide extra bed?</label>
                                </div>
                                <div class="amenities-raido-btn">
                                    <div class="form-check form-check-inline amenities-radio">
                                        <input class="form-check-input extra-bed" type="radio" name="flexRadioDefault" id="yes" value="yes">
                                        <label class="form-check-label" for="yes">
                                         Yes
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline amenities-radio">
                                        <input class="form-check-input extra-bed" type="radio" name="flexRadioDefault" value="no" id="no" checked>
                                        <label class="form-check-label" for="no">
                  zcc                       No
                                        </label>
                                    </div>
                                </div>
                                <div class="total-room-layout pt-3 d-none number-of-bed">
                                    <label for="" class="form-label label-heading ">Select the number of extra beds that can be added</label>
                                    <select class="form-select layout-totalroom  me-3 extra_no_of_bed">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="form-info-box mt-3">
                            <form action="" class="form-breakfast">
                                <div class="p-form-heading">
                                    <h5>Amenities</h5>
                                    <h6 class="label-heading form-label">Tell us about your amenities</h6>
                                </div>
                                <div class="amenities-req border rounded-1">
                                    <div class="p-form-heading pt-3 px-2">
                                        <h5>Most Requested by Guests</h5>
                                    </div>
                                    <div class="amenities-check-box px-5">
                                        @foreach($amenities_category as $category)
                                            @foreach($category->amenitiesFeatured as $amenity)
                                                <div class="form-check py-3 ">
                                                    <input class="form-check-input top_aminity" type="checkbox" value="{{@$amenity->id}}">
                                                    <label class="form-check-label para-fs-14 fs-6">
                                                        {{@$amenity->amenities}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                                <div class="amenities-btn another-c-details mt-4">
                                <a class="btn btn-primary accordion-btn-link another-c-d-btn d-none" type="button">
                                    Hide all Amenities
                                </a>
                                <a class="btn btn-primary show-button another-c-d-btn" type="button">
                                    Show all Amenities
                                </a>
                                </div>
                                <div class="amenities-category pt-4" id="hideshow">
                                    <div class="p-form-heading pb-3">
                                        <h5>All amenities by category</h5>
                                    </div>
                                    <div class="amenities-accordion">
                                        <div class="accordion" >
                                            @foreach($amenities_category as $category)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" >
                                                        <button class="accordion-button collapsed justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#amenity_{{$category->id}}"  aria-expanded="false" aria-controls="amenity_{{$category->id}}">
                                                            <span>{{$category->category}}</span>
                                                            <span class="ms-auto me-5"> <span class="checkbox_length_{{$category->slug}}">0</span>/{{$category->amenities->count()}} selected</span>
                                                        </button>
                                                    </h2>
                                                    <div id="amenity_{{$category->id}}" class="accordion-collapse collapse amenities-acc-main overflow-auto" >
                                                        <div class="accordion-body bg-light">
                                                            @foreach($category->amenities as $amenity)
                                                                <div class="form-check pb-3 border--bottom amenity-checked">
                                                                    <label class="form-check-label para-fs-14 fs-6">
                                                                    <input class="form-check-input check-amenity checked-amenity-{{$amenity->id}}" type="checkbox"  name="{{$category->slug}}" id="amenities" value="{{$amenity->id}}">
                                
                                                                    {{$amenity->amenities}}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>  
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="another-c-details mt-4">
                            <a href="javascript:;" class="btn another-c-d-btn w-100 amenities-button">Continue
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
</style>
@endpush

@push('scripts')
<script>
// jjs for hide and show on butoon 
$(document).ready(function(){

    $('.top_aminity').on('change', function(){
        $('#amenities[value="' + this.value + '"]').prop('checked', this.checked);
        var name = $('#amenities[value="' + this.value + '"]').attr('name');
        checkCal(name);
    });

    $(".check-amenity").on('click', function(){
        $('.top_aminity[value="' + this.value + '"]').prop('checked', this.checked);
        var name = $(this).attr('name');
        checkCal(name);
    });

    function checkCal(name){
        var checkbox   = $(`input[name=${name}]:checked`).length;
        var set_length = $(`.checkbox_length_${name}`).html(checkbox);
    }

    $(".accordion-btn-link").click(function(){
        $("#hideshow").removeClass('d-none');
        $(this).addClass('d-none');
        $(".show-button").removeClass('d-none');
        
    });

    $(".show-button").click(function(){
        $("#hideshow").addClass('d-none');
        $(this).addClass('d-none');
        $(".accordion-btn-link").removeClass('d-none');
    });
    
    $('.extra-bed').on('click', function(){
        var extra_bed = $(this).val();
        if(extra_bed == 'yes'){
            $('.number-of-bed').removeClass('d-none');
        }else{
            $('.number-of-bed').addClass('d-none');
        }
    });

    $(document).on('click', '.amenities-button', function(){

        var extra_bed  = $('.extra-bed:checked').val();
        var extra_no_of_bed = $('.extra_no_of_bed').val();
        var amenities       = $("input[id='amenities']:checked").map(function(){return $(this).val();}).get();

        formdata = new FormData();

        formdata.append('extra_bed', extra_bed);
        formdata.append('amenities', amenities);
        if(extra_bed == 'yes') {
            formdata.append('extra_no_of_bed', extra_no_of_bed);
        }


        $('.spinner-border').show();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "{{route('add-amenities')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (res) {
                if (res.redirect_url) {
                    window.location = res.redirect_url;
                }
            },
        }); 
    });

});
</script>
@endpush