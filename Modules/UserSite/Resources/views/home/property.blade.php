@push('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-------- Slick css cdn ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />

    <!------ Swiper css link ------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">

    <style>
.img-popup-slider .img-swiper .slider-single img {
    width: 100%;
    object-fit: cover;
}

.img-popup-slider .img-swiper .slick-next:before {
    content: "\f105";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}

.img-popup-slider .img-swiper .slick-prev:before {
    content: "\f104";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}

.img-popup-slider .img-swiper {
    width: 100%;
    max-width: 857px;
    margin: 0 auto;
}
.slick-track{
    width: 18141px !important;
}
.slick-track .slick-cloned,.slick-active{
    width: 76px !important;
}

/* .slider-nav .slick-list .slick-track{
    width: 2508px !important; */
    /* transform: translate3d(-456px, 0px, 0px) !important; */
/* } */
.slick-list {
    padding: 0px 0px !important;
}
.slider-nav .slick-list .slick-track .slick-slide{
    width: 86px !important;
}
.slder-nav-img img{
    width: 82px !important;
}
</style>
@endpush

@forelse ($hotels as $hotel)
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="share-section mb-5">
            <div class="drag-section justify-content-between flex-wrap">
                <div class="d-flex align-items-center mb-3 mb-lg-0">
                        <img src="{{ @$hotel->mainPhoto->first()->photos ? asset('storage/'.@$hotel->mainPhoto->first()->photos) : asset('assets/images/default-image.png') }}" alt="" class="drag-image"  onerror="this.src='{{asset('assets/images/default.png')}}'">
                    <span>
                        <h2 class="property-subtitle-text">{{$hotel->property_name}}</h2>
                    </span>
                </div>
                <div class="upload-delete-button-step d-flex justify-content-between flex-wrap">
                    @if ($hotel->photo)
                        {{-- <a href="javascript:;" class="white-button-step px-3 py-2 d-flex align-items-center me-2 albumBtn" data-bs-toggle="modal" data-bs-target="#image_{{ $hotel->UUID }} ">Albums</a> --}}
                        <a href="javascript:;" class="white-button-step px-3 py-2 d-flex align-items-center me-2 albumBtn" data-id="{{$hotel->UUID}}">Albums</a>
                        {{-- data-bs-target="#image_{{ $hotel->UUID }} " --}}

                    @endif
                    <a href="javascript:;" class="white-button-step px-3 py-2 d-flex align-items-center me-2">Preview</a>
                    <a href="{{route('basic-info', ['id' => $hotel->UUID])}}"
                        class="white-button-step py-2 d-flex align-items-center me-2 px-3">Edit Property</a>
                    <a href="javascript:;" class="white-button-step px-3 py-2 d-flex align-items-center propertyDelete"
                        data-value="{{ $hotel->UUID }}">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>


@empty
{{-- FOR EMPTY TABLE --}}
<main data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000"
    class="d-flex justify-content-center align-items-center result-main-content border-semidark mt-4" style="    overflow: hidden;">
    <div class="result-main-inner d-flex align-items-center justify-content-center" style="width: 966px;height: 345px;">
        <div class="empty-table w-100 text-center py-5">
            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
            </lord-icon>
            <h4>No records has been added yet.</h4>
            <h6>Add a new Property by simpley clicking the button.</h6>
            <div class="another-c-details mt-4">
                <a href="{{route('property-category')}}" class="btn another-c-d-btn"
                    style="background-color: #6A78C7 !important; color: white;white-space:nowrap;">Add Property</a>
            </div>
        </div>
    </div>
</main>
@endforelse

<div class="popupImage">
    @if (isset($hotelPhotos))
        @include('usersite::home.popup-image')
    @endif
</div>

@push('scripts')
{{-- <script src="{{ asset('assets/js/custom.js') }}"></script> --}}
    <script>
            function slider() {     
                $('.slider-single').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    loop: true,
                    draggable: false,
                    fade: true,
                    asNavFor: '.slider-nav'
                });
                $('.slider-nav').slick({
                    slidesToShow: 10,
                    slidesToScroll: 1,
                    // infinite: true,
                    speed: 500,
                    asNavFor: '.slider-single',
                    dots: false,
                    loop: true,
                    arrows: false,
                    // autoplay: true,
                    // autoplaySpeed: 1500,
                    draggable: true,
                    centerMode: true,
                    focusOnSelect: true,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 8,
                                slidesToScroll: 1,
                            },
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 7,
                                slidesToScroll: 1,
                            },
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 6,
                                slidesToScroll: 1,
                            },
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 1,
                            },
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                            },
                        },
                        {
                            breakpoint: 360,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                            },
                        },
                    ],
                });
            }

        $(document).on('click','.albumBtn',function(){
            var id = $(this).data('id');

            formdata = new FormData();
            formdata.append('id', id);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('show.image')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                    success: function (response) {
                    $('.popupImage').html(response);
                    $('.slick-prev').trigger('click');
                    $('.img-popup-slider').modal('show');
                    slider();
                }, error:function (response) {

                }
            });
        });
    </script>
@endpush