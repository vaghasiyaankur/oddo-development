{{-- email token time out --}}
@if (session()->get('message'))
<script>
    $(document).ready(function() {
           $('#registerTokenFail').modal('show');
           setTimeout(function() {
               $('#registerTokenFail').modal('hide')
           }, 4000);
       });
</script>
@endif

<!-------- Google Place Search -------->
<script type='text/javascript'
    src='https://maps.googleapis.com/maps/api/js?libraries=places&v=3&language=En&key=AIzaSyBZhREk9TESs69r99eYGKkIQ725IqOP8Zc&ver=5.9.3'>
</script>

<!-- // Home page slider start -->
<script>
    var baseUrl = $('#base_url').val();

    $(document).on('click', '#SubmitSearch', function() {
        var search = $("input[name=search]").val();
        !search ? $(`.search-error`).html(`Please enter a destination to start searching.`) : $(`.search-error`)
            .html(``);
        var checkIn = $("input[name=value_from_start_date]").val();
        var checkOut = $("input[name=value_from_end_date]").val();
        var guest = $("select[name=guest]").val();
        var room = $("select[name=room]").val();
        var bed = new Array();
        $('input[name="bed"]:checked').each(function() {
            bed.push($(this).val());
        });

        if (!search) {
            return;
        }   
        var page = 2;
        window.location.href = baseUrl  + "/hotel?search=" + search + "&checkIn=" + checkIn + "&checkOut=" + checkOut + "&guest=" + guest + "&room=" + room + "&bed=" + bed;
   });


    $(document).on('click', '.propertyTypeBtn', function(){
        var id = $(this).data('id');
        
        var page = 2;
        window.location.href = baseUrl  + "/hotel?propertyType=" + id;
    });

    var sliderSelector = '.swiper-container',
        options = {
            init: false,
            loop: true,
            speed: 800,
            slidesPerView: 5,
            spaceBetween: 10,
            centeredSlides: true,
            effect: 'coverflow',
            coverflowEffect: {
                rotate: 0,
                stretch: -100,
                depth: 200,
                modifier: 1,
                slideShadows: true,
            },
            grabCursor: true,
            parallax: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                1023: {
                    slidesPerView: 3,
                    spaceBetween: 0
                },
                992: {
                    slidesPerView: 2,
                    spaceBetween: 0
                },
                567: {
                    slidesPerView: 1,
                    spaceBetween: 0
                }
            },
            // Events
            on: {
                imagesReady: function() {
                    this.el.classList.remove('loading');
                }
            }
        };
    var mySwiper = new Swiper(sliderSelector, options);

    // Initialize slider
    mySwiper.init();
</script>
<!-- // Home page slider end -->

<!-- // js for top city slider (index.html) -->
<script>
    $('#slick1').not('.slick-initialized').slick({
        rows: 2,
        dots: false,
        arrows: true,
        infinite: true,
        speed: 2000,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 776,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    rows: 1
                }
            }
        ],
        prevArrow: "<i class='slick-prev pull-left fa-solid fa-angle-left' aria-hidden='true'></i>",
        nextArrow: "<i class=' slick-next pull-right fa-solid fa-angle-right' aria-hidden='true'></i>"
   });


   // Google Place Search 
    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            $('#latitude').val(place.geometry['location'].lat());
            $('#longitude').val(place.geometry['location'].lng());

            $("#latitudeArea").removeClass("d-none");
            $("#longtitudeArea").removeClass("d-none");
        });

    }
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.select-div', function() {
            $('.select-room').html('');
            var index = $('.select_room').val();
            for (var i = 1; i <= index; i++) {
                $number = i;
                addRoom($number);
            }
            $(".select-option").toggleClass("option-none");
        });

        $(".js-example-tags").select2({
            tags: true
        });

        $(document).on("click", function(event) {
            var $trigger = $(".bed-selector");
            if ($trigger !== event.target && !$trigger.has(event.target).length) {
                $(".select-room").addClass("option-none");
            }
        });

        function addRoom($number) {
            let searchParams = new URLSearchParams(window.location.search)
            if(!searchParams){
                let bed = searchParams.get('bed').split(",");
                var king = '';
                var queen = '';
                var twin = '';
                if(bed.includes('King')){
                    king = 'checked';
                }
                if(bed.includes('Queen')){
                    queen = 'checked';
                }
                if(bed.includes('twin')){
                    twin = 'checked';
                }
            }
            $room = $(`<div class="room"><div class="title-container">
                        <h5 class="title" style="margin:10px;">Room ` + $number + `</h5>
                    </div>
                    <section class="dropdown-container">
                        <div class="dropdown-inner">
                            <input class="form-check-input hotelBeds" type="checkbox" name="bed" id="king_` + $number + `" value="King" `+king+`>
                            <label for="king_` + $number + `">1 King</label>
                        </div>
                        <div class="dropdown-inner">
                            <input class="form-check-input hotelBeds" type="checkbox" name="bed" id="twin_` + $number + `" value="twin" `+twin+`>
                            <label for="twin_` + $number + `">2 Twin</label>
                        </div>
                        <div class="dropdown-inner">
                            <input class="form-check-input hotelBeds" type="checkbox" name="bed" id="queen_` + $number + `" value="Queen" `+queen+`>
                            <label for="queen_` + $number + `">2 Queen</label>
                        </div>
                    </section>
                </div>`);
            $('.select-room').append($room);
        }
    });
</script>