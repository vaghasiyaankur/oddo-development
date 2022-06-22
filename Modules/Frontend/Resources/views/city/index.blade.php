@extends('layout::user.Frontend.master')

@section('title')
    city
@endsection


@push('css')

@endpush


@section('content')
    <!------- Explore cities section start ------->
    <section class="explore-city s-top-city pt-2">
        <div class="container">
            <div class="explore-city-map">
                <div class="explore-city-heading text-center mt-4 mb-4">
                    <h4>Explore Cities in </h4>
                </div>
                <!-------Select option with image -------->
                <div class="e-city-dropdown my-3">
                    <div class="f-group">
                        <select class="f-control f-dropdown" placeholder="Please choose ">
                            @foreach ($cities as $city)
                            <option value="{{ $loop->iteration }}" data-image="{{asset('storage/'.@$city->country->icon)}}">{{ $city->name.','.$city->country->country_name }}</option>
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
            </div>
            <div class="s-top-city-inner pb-5">
                <div class="s-top-city-main">
                    <div class="row">
                        @foreach ($cities as $city)    
                            <div class="col-lg-4 col-sm-6 col-12  p-0 mb-3">
                                <div class="t-city-card position-relative ">
                                    <div class="t-city-card-img position-relative text-center">
                                        <img src="{{asset('storage/'.$city->background_image)}}" style="width: 327px; height: 401px;" class="img-fluid">
                                    </div>
                                    <div class="t-city-card-content text-center">
                                        <h3>{{ $city->name }}</h3>
                                        <img src="{{asset('storage/'.@$city->country->icon)}}" class="img-fluid">
                                        <div class="t-city-card-button">
                                            <a href="placewithmap.html" class="btn bg-purple t-city-btn">Explore</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------- Explore cities section end ------->
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

@endpush
