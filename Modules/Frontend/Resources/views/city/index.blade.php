@extends('layout::user.Frontend.master')

@section('title', 'Destinations we love')

@push('css')
<style>
    .explore-city .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #6a78c7;
        background-color: #c3d6fd;
    }

    .explore-city .nav-pills .nav-link {
        padding: 6px 12px;
        font-size: 20px;
        line-height: 22px;
        color: #878996;
    }

    .p-a-tabcontent-inner .p-a-details .p-a-details-btn {
        margin-top: -0;
        margin-left: 65px;
        margin-bottom: 0;
    }

    section.explore-city {
        min-height: calc(100vh - 337px);
    }
</style>
@endpush


@section('content')
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

        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item " role="presentation">
                <button class="nav-link active rounded-pill" id="pills-overview-tab" data-bs-toggle="pill"
                    data-bs-target="#Cities" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">Cities</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill hotelsBtn" id="pills-daily-tab" data-bs-toggle="pill"
                    data-bs-target="#Hotels" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">Hotels</button>
            </li>
        </ul>

        <div class="tab-content p-a-tabcontent saved-section" id="pills-tabContent">
            <!------- Cities Nav Tab ------->
            <div class="tab-pane fade show active p-a-tabcontent-inner" id="Cities" role="tabpanel"
                aria-labelledby="pills-overview-tab">
                <div class="p-a-tab-map">
                    <div class="s-top-city-inner pb-5">
                        <div class="s-top-city-main">
                            <div class="row">
                                @foreach ($cities as $city)
                                <div class="col-lg-4 col-sm-6 col-12  p-0 mb-3">
                                    <div class="t-city-card position-relative ">
                                        <div class="t-city-card-img position-relative text-center">
                                            <img src="{{asset('storage/'.$city->background_image)}}"
                                                style="width: 327px; height: 401px;" class="img-fluid">
                                        </div>
                                        <div class="t-city-card-content text-center">
                                            <h3>{{ $city->name }}</h3>
                                            <img src="{{asset('storage/'.@$city->country->icon)}}" class="img-fluid">
                                            <div class="t-city-card-button">
                                                <a href="{{ route('city.explore',['slug' => @$city->slug]) }}" class="btn bg-purple t-city-btn">Explore</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!------- Hotels Nav Tab ------->
            <div class="tab-pane fade show p-a-tabcontent-inner" id="Hotels" role="tabpanel"
                aria-labelledby="pills-overview-tab">
                <div class="saved-hotels-details p-a-details pt-4 pb-5">
                    <div class="hotel-wrapper mb-5 p-a-swpier">
                        @foreach ($hotels as $hotel)
                            <div class="hotel-box me-3">
                                <img src="{{ asset('assets/images/save card.png') }}" class="img-fluid" alt="">
                                <div class="content">
                                    <h5 class="ms-2">{{$hotel->hotel->property_name}}</h5>
                                    <span class="d-l-Purple mb-3 ms-2"><img
                                            src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                            class="mb-2 me-2 d-inline">
                                        Madrid</span>
                                    <p class="d-l-Purple mt-2 mb-1 ms-1"><span class="purpel-text fw-bold">10/19/20 -
                                            10/22/20 </span> 3 nights</p>
                                    <span class="purple-dark"><img
                                            src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}" class="d-inline"
                                            alt=""> 2 Adults</span>
                                    <div class="text-with--btn d-flex justify-content-between">
                                        <div class="">
                                            <span><img src="{{ asset('assets/images/icons/order-hotel-icon3.png') }}"
                                                    class="d-inline" alt="">2
                                                Rooms</span>
                                            <p class="mb--0 ms-4 ps-2 purple-dark">1 King, 1 Queen
                                            </p>
                                        </div>
                                        <div class="icons_">
                                            <a href="javacsript:;"><img
                                                    src="{{ asset('assets/images/icons/pluse-big-blue.png') }}"
                                                    class="me-1 d-inline" alt=""></a>
                                            <a href="javacsript:;"><img
                                                    src="{{ asset('assets/images/icons/remove-s.png') }}" class="d-inline"
                                                    style="width:44px;" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="search-result-price__tag b-1 p-a-details-btn position-relative">
                                    <button class="price-btn">Show me Hotels</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!------- Explore cities section end ------->
@endsection

@push('script')

<!--------SLICK CDN JS--------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

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

{{-- swiper --}}
<script>
    // planner-accordion swiper js
    $('.p-a-swpier').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 300,
        loop: true,
        accessibility: false,
        dots: false,
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
                    slidesToScroll: 1
                }
            },
        ]
    });

    $(document).on('click', '.hotelsBtn', function () {
        $(".slick-next").trigger('click')
    })
</script>
@endpush