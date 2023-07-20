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
        var guest = $("input[name=guest]").val();
        var room = $("input[name=room]").val();
        var bed = new Array();
        $('input[name="bed"]:checked').each(function() {
            bed.push($(this).val());
        });

        if (!search) {
            return;
        }   
        var page = 2;

        var baseUrlData =  baseUrl  + "/search?";

        baseUrlData = baseUrlData  + "search=" + search + "&checkIn=" + checkIn + "&checkOut=" + checkOut + "&guest=" + guest + "&room=" + room;

        if (bed.length != 0) {
            baseUrlData = baseUrlData + "&bed=" + bed;
        }
        window.location.href = baseUrlData;
   });


    $(document).on('click', '.propertyTypeBtn', function(){
        var id = $(this).data('id');
        
        var page = 2;
        window.location.href = baseUrl  + "/search?propertyType=" + id;
    });
    
    $(document).on('click', '.recommendedHotels', function(){
        var id = $(this).data('id');
        var page = 2;
        window.location.href = baseUrl  + "/search?hotelType=" + id;
    });
    
    $(document).on('click', '.popularHotels', function(){
        var id = $(this).data('id');
        var page = 2;
        window.location.href = baseUrl  + "/search?hotelType=" + id;
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
            var get = localStorage.getItem('hotelBeds');
            if(get){
                let data = get.split(",");
                $(data).each(function(val, value) {
                    $('.hotelBeds[value="' + value + '"]').prop('checked', 'checked');
                });
            }
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
                    <section class="row dropdown-container">
                        <div class="col-xl-6 col-lg-12 col-6 dropdown-inner d-flex align-items-center">
                            <input class="form-check-input hotelBeds mt-0" type="checkbox" name="bed" id="king_` + $number + `" value="King" `+king+`>
                            <label for="king_` + $number + `" class="px-2">1 King</label>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-6 dropdown-inner d-flex align-items-center">
                            <input class="form-check-input hotelBeds mt-0" type="checkbox" name="bed" id="twin_` + $number + `" value="twin" `+twin+`>
                            <label for="twin_` + $number + `" class="px-2">2 Twin</label>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-6 dropdown-inner d-flex align-items-center">
                            <input class="form-check-input hotelBeds mt-0" type="checkbox" name="bed" id="queen_` + $number + `" value="Queen" `+queen+`>
                            <label for="queen_` + $number + `" class="px-2">2 Queen</label>
                        </div>
                    </section>
                </div>`);
            $('.select-room').append($room);
        }
    });
</script>

<script>
//     $(document).ready(function(){
//   $('#dropDown').click(function(){
//     $('.drop-down').toggleClass('drop-down--active');
//   });
// });
</script>
<script>
    $(document).ready(function() {
        const minus = $('.quantity__minus');
        const plus = $('.quantity__plus');
        const input = $('.quantity__input');
        minus.click(function(e) {
            e.preventDefault();
            var value = input.val();
            if (value > 1) {
            value--;
            }
            input.val(value);
        });
        
        plus.click(function(e) {
            e.preventDefault();
            var value = input.val();
            value++;
            input.val(value);
        })
    });
    $(document).ready(function() {
        const minus = $('.room__minus');
        const plus = $('.room__plus');
        const input = $('.room__input');
        minus.click(function(e) {
            e.preventDefault();
            var value = input.val();
            if (value > 1) {
            value--;
            }
            input.val(value);
        });
        
        plus.click(function(e) {
            e.preventDefault();
            var value = input.val();
            value++;
            input.val(value);
        })
    });
    

    $(document).ready(function(){
        const $menu = $('.drop-down')
        const onMouseUp = e => {
        if (!$menu.is(e.target) // If the target of the click isn't the container...
        && $menu.has(e.target).length === 0) // ... or a descendant of the container.
        {
            $menu.removeClass('drop-down--active');
        }
        }

        $('#dropDown').on('click', () => {
            $menu.toggleClass('drop-down--active').promise().done(() => {
                if ($menu.hasClass('drop-down--active')) {
                $(document).on('mouseup', onMouseUp); // Only listen for mouseup when menu is active...
                } else {
                $(document).off('mouseup', onMouseUp); // else remove listener.
                }
            })
        });
    });
</script>
<script>
    $(document).on('click','.applyBtn',function(){
        var guest = $(".select_guest").val();
        var room = $(".select_room").val();
        $('.guestNum').html(guest);
        $('.roomNum').html(room);
        $('.drop-down').removeClass('drop-down--active');
    });
    $(document).ready(function() {
        $(".btn-reset").click(function() {
            $(".select_guest").val('1');
            $(".select_room").val('1'); 
            $('.guestNum').html(1);
            $('.roomNum').html(1);
        });
    });

    $(document).ready(function() {
        $('.quantity__plus').on('keydown, click', function () {
            var texInputValue = $('.select_guest').val();
            var data = parseInt(texInputValue) + 1;
            var value = $('.quantity__input').val();
            if(value.length >= 1){
                $('.quantity__minus').prop('disabled', false);
            }
        });

        $('.quantity__minus').attr('disabled',true);
        $('.room__minus').attr('disabled',true);

        $('.quantity__minus').on('keydown, click', function () {
            var texInputValue = $('.select_guest').val();
            var data = parseInt(texInputValue) - 1;
            if (data == 0) {
                $('.guestNum').html(1);
                $('.quantity__minus').attr('disabled', true);
            }
            
        });
        $('.select_guest').on('keydown, keyup', function () {
            var texInputValue = $('.select_guest').val();
            var data = parseInt(texInputValue);
            var value = $('.quantity__input').val();
            if(value.length >= 1){
                $('.quantity__minus').prop('disabled', false);
            }
        });
        $('.room__plus').on('keydown, click', function () {
            var texInputValue = $('.select_room').val();
            var data = parseInt(texInputValue) + 1;
            var value = $('.room__input').val();
            if (value.length >= 1) {
                $('.room__minus').prop('disabled', false);
            }
        });
        $('.room__minus').on('keydown, click', function () {
            var texInputValue = $('.select_room').val();
            var data = parseInt(texInputValue) - 1;
            if (data == 0) {
                $('.roomNum').html(1);
                $('.room__minus').prop('disabled',true);
            }
        });
        $('.select_room').on('keydown, keyup', function () {
            var texInputValue = $('.select_room').val();
            var data = parseInt(texInputValue);
            // $('.roomNum').html(data);
            // if (texInputValue == '') {
            //     $('.roomNum').html(0);
            // }
            var value = $('.room__input').val();
            if (value.length >= 1) {
                $('.room__minus').prop('disabled', false);
            }
        });
    });

</script>
<script>
     $(document).on('change', '.hotelBeds', function() {
        var hotelBeds = $('.hotelBeds:checked').map(function(){return $(this).val();}).get();
        localStorage.setItem('hotelBeds', hotelBeds);
    });
</script>