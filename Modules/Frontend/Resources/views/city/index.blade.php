@extends('layout::user.Frontend.master')

@section('title', 'Destinations we love')
@section('meta_description', 'Page Destinations We love')
@section('meta_keywords', 'Page, Destinations We love')

@push('css')
<style>
     .explore-city .nav-pills::before{
        position: absolute;
        content: "";
        top: 50%;
        border: 1px solid black;
        width: 100%;
        z-index: -6;
        border: 1px solid rgb(106 120 199 / 10%);
     }
     
    .explore-city .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background: linear-gradient(180deg, #6A78C7 0%, #8F9DE9 100%);
        border-radius: 40px;
        background-color: #e9f0fe;
        box-shadow: 0px 0px 1px 3px #c3d6fd;
        color: #ffffff !important;
        z-index: 1;
    }
    .explore-city .nav-pills .nav-link,
    .nav-pills .show>.nav-link{
        color: #6A78C7 !important;
        background: rgb(231 234 255 / 80%);
        border-radius: 30px;
    }
    .explore-city .nav-pills li.nav-item {
        width: 100%;
        max-width: 150px;
        margin: 0 15px;
    }
    .explore-city .nav-pills .nav-link {
        padding: 12px 25px;
        font-size: 17px;
        font-weight: 600;
        line-height: 22px;
        color: #878996;
        width: 100%;
    }

    .hotel-wrapper .hotel-box {
        width: 100%;
        height: 100%;
        /* min-height: 369px; */
        background: #FFFFFF;
        box-shadow: 0px 0px 9px rgba(87, 110, 154, 0.3);
        border-radius: 5px;
    }
    .hotel-wrapper .hotel-box:hover{
        background: rgba(106, 120, 199, 0.07);
        box-shadow: 0px 0px 20px rgba(87, 110, 154, 0.3);
        border-radius: 5px;
    }
    .p-a-tabcontent-inner .p-a-details .p-a-details-btn {
        width: 100%;
        padding: 20px 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-top: 1px solid #E7E7E7;
    }
    .search-result-price__tag .price-btn{
        color: #6a78c7;
        background: transparent;
        padding: 0;
    }

    section.explore-city {
        min-height: calc(100vh - 337px);
    }

    .HotelImage{
        width: 100%;
        object-fit: cover;
        height: 100%;
        max-height: 300px;
        min-height: 300px;
        border-radius: 15px 15px 0 0 !important;
        /* padding: 10px 10px 0px; */
    }
  
    /* .saved-section .saved-hotels-details .hotel-wrapper .hotel-box .content {
        padding-top: 21px;
        padding-left: 25px;
        padding-right: 25px;
    } */
    .loading {
        height: 0;
        width: 0;
        padding: 15px;
        border: 6px solid #ccc;
        border-right-color: #888;
        border-radius: 22px;
        -webkit-animation: rotate 1s infinite linear;
        /* left, top and position just for the demo! */
        position: absolute;
        left: 50%;
        top: 55%;
        z-index: 999;
    }

@-webkit-keyframes rotate {
  /* 100% keyframe for  clockwise. 
     use 0% instead for anticlockwise */
  100% {
    -webkit-transform: rotate(360deg);
  }
}

.citySearchBtn:hover, .price-btn:hover{
    color: white;
    background-color: #566ce2;

}
section.explore-city .explore-city-check{
    padding: 10px 0 32px 0 !important;
}
.form-check-label h1{
    font-size: 2rem;
}
@media screen and (max-width: 375px){
    .explore-city .nav-pills li.nav-item{
        width: 100%;
        max-width: 110px;
        margin: 0 10px;
    }
}
</style>

@endpush


@section('content')
<div class="loading"></div>
<!------- Explore cities section start ------->
<section class="explore-city s-top-city pt-2">
    <div class="container">
        {{-- <div class="explore-city-map">
            <div class="explore-city-heading text-center mt-4 mb-4">
                <h4>Explore Cities in </h4>
            </div>
            <!-------Select option with image -------->
            <div class="e-city-dropdown my-3">
                <div class="f-group">
                    <select class="f-control f-dropdown" placeholder="Please choose ">
                        @foreach ($cities as $city)
                        <option value="{{ $loop->iteration }}" data-image="{{asset('storage/'.@$city->country->icon)}}">
                            {{ $city->name.','.$city->country->country_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="explore-city-map-img text-center">
                <img src="assets/images/explorcity-map.png">
            </div>
        </div>
        <div class="explore-city-check d-flex justify-content-center align-items-center flex-wrap">
            <div class="form-check me-sm-5 me-3">
                <label class="form-check-label ">
                    <input class="form-check-input" type="checkbox" value="" checked>
                    Capital
                </label>
            </div>
            <div class="form-check me-sm-5 me-3">
                <label class="form-check-label ">
                    <input class="form-check-input" type="checkbox" value="">
                    Most Visited
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label ">
                    <input class="form-check-input" type="checkbox" value="">
                    Closest to:
                </label>
            </div>
            <select class="form-select form-select-lg para-fs-14" aria-label=".form-select-lg example">
                <option selected>Madrid</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <div class="explore-city-btn mt-xs-0 mt-2">
                <a href="#" class="filter-btn bg-purple text-white btn">Filter</a>
            </div>
        </div> --}}

        <div class="explore-city-check d-flex justify-content-center align-items-center flex-wrap">
            <div class="form-check me-5">
                <label class="form-check-label" style="color: #393c52">
                   <h1>Destination We Love</h1>
                </label>
            </div>
        </div> 
        <div class="destination content mb-5">
            <p class="text-center" style="color:#878996;">Enjoy the best experiences with top Destination and Hotel.</p>
            <p class="text-center mx-auto" style="color:#878996;max-width:800px;">It is equipped with quality room amenities and premium facilities. The Hotel is serviced by a group of experienced staff dedicated to premier services and the warmth of heart in everything we do.</p>
        </div>
        <h2 class="text-center mb-4 pb-2" style="color: #393c52">Hotels</h2>

        <ul class="nav nav-pills mb-3 justify-content-center position-relative" id="pills-tab" role="tablist">
            <li class="nav-item " role="presentation">
                <button class="nav-link active rounded-pill selectDestinationTab" id="pills-overview-tab" data-bs-toggle="pill"
                    data-target="Cities" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">Cities</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill hotelsBtn selectDestinationTab hotelBTN" id="pills-daily-tab" data-bs-toggle="pill"
                    data-target="Cities_data" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">Hotels</button>
            </li>
        </ul>
            <div class="tab-content p-a-tabcontent saved-section destination-Tab"   >
                @include('frontend::city.cities')
                
            </div>
            {{-- @include('frontend::city.hotel') --}}
    </div>
</section>
<!------- Explore cities section end ------->
@endsection

@push('script')

<!--------SLICK CDN JS--------->

<!-------Select option with image  --------->
{{-- <script>
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

</script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
{{-- swiper --}}
<script>
    var baseUrl = $('#base_url').val();

    function slickCarousel(){
        $('.p-a-swpier').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            speed: 300,
            loop: true,
            accessibility: false,
            dots: false,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
            ]
        });

        $(".slick-next").trigger('click');
    }

    

    $(document).on('click', '.selectDestinationTab', function () {
        var target = $(this).data('target');
        var active = $(this).addClass('active');

        $('.selectDestinationTab').removeClass('active');
        $(this).addClass('active');

        formdata = new FormData();
        formdata.append('target', target);

        $('.loading').show();
        $('.tab-content').hide();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('city.change')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) {
                $('.loading').hide();   
                $('.tab-content').show();
                $('.destination-Tab').empty();
                $('.destination-Tab').html(response);
                slickCarousel();
                // $('.slick-track').css("width","1440px");
                $('.tab-pane').addClass('active');
                $('.tab-content>.tab-pane').addClass("d-block"); 
            }, error:function (response) {

            }
        });
    });

    $(window).on('load',function() {
        $('.loading').hide();
    });

    // $(document).on('click', '.hotelsBtn', function () {
    //     $(".slick-next").trigger('click');
    // });

    $(document).on('click','.citySearchBtn',function(){
        var id = $(this).data('id');

        window.location.href = baseUrl  + "/search?City=" + id;
    });
    
</script>
<script>

    $('.modal').on('shown.bs.modal', function (e) {
        $('.slider-single').slick('setPosition');
        $('.swiper').addClass('open');
    })
    $('.modal').on('shown.bs.modal', function (e) {
        $('.slider-nav').slick('setPosition');
        $('.swiper').addClass('open');
    })
</script>
@endpush