@extends('layout::user.UserSite.master')

@section('title', 'Add Layout')
@section('meta_description', 'Page Add Layout')
@section('meta_keywords', 'Page, Add Layout')

@push('css')
    <link rel="stylesheet" href="{{ asset('user/asset/css/user-style.css') }}">

    <!------- Slick theme css  ------->
    <link rel="stylesheet" href="https://kenwheeler.github.io/slick/slick/slick-theme.css">

    <style>
        section.account-content {
            min-height: calc(100vh - 361px);
        }
    </style>
@endpush

@section('content')
    <section class="account-content">
        <div class="container">
            <div class="row py-4">
                @include('usersite::user.sidebar.sidebar')
                <div class="col-lg-10 col-md-10 col-12 right-side-content">
                    <div id="tabs">
                        <div class="col-xs-12 hotelProperty">
                            <h2 class="hotelProperty_title mb-4">Property</h2>
                            <div class="row">
                                @forelse ($hotels as $hotel)
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="card h-100 hotelProperty_card border-0">
                                            <div class="card-image">
                                                <img src="{{ @$hotel->mainPhoto->first()->photos ? asset('storage/' . @$hotel->mainPhoto->first()->photos) : asset('assets/images/default-image.png') }}" class="img-fluid albumBtn">
                                                @if (!empty($hotel->slug) && $hotel->complete == 1)
                                                    <div class="watch-list">
                                                        <a href="{{ route('hotel.detail', $hotel->slug) }}" class="watch-list-icon"><i class="fa-solid fa-eye"></i></a>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="card-body">
                                                <h2 class="card-title">{{ $hotel->property_name }}</h2>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="hotel_rating d-flex justify-content-between align-items-center">
                                                        <p class="mb-0">
                                                            @for($i = 0; $i < 5; $i++)
                                                            <?php
                                                                $checkstar = number_format($hotel->review_avg_total_rating, '1', '.', '') - $i;                   
                                                            ?>
                                                            @if($checkstar >= 1 )
                                                                <i class="fa-solid fa-star rating"></i>  
                                                            @elseif( $checkstar < 1 && $checkstar > 0)
                                                                <i class="fa-regular fa-star-half-stroke rating"></i>
                                                            @else
                                                                <i class="far fa-star"></i>
                                                            @endif
                                                        @endfor
                                                        </p>
                                                        <span class="rating_label ps-2">({{(float)number_format($hotel->review_avg_total_rating, '1', '.', '')}})</span>
                                                    </div>
                                                    <div class="hotel_location d-flex align-items-center">
                                                        <img src="{{ asset('assets/images/icons/ei-location.png') }}" class="img-fluid">
                                                        <span class="location_name ps-2">{{ @$hotel->city->name }}</span>
                                                    </div>
                                                </div>                                            
                                            </div>
                                            <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                                <a href="{{ route('basic-info', ['id' => $hotel->UUID]) }}" class="change_btn">Edit
                                                    <span class="ps-2"><i class="fa-regular fa-pen-to-square"></i></span>
                                                </a>
                                                <div class="exploer-icons d-flex">
                                                    <a href="{{route('calender')}}" class="exploer-icons-inner calender-icon">
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                    </a>
                                                    <div class="exploer-icons-inner delete-icon propertyDelete" data-value="{{ $hotel->UUID }}">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    {{-- FOR EMPTY TABLE --}}
                                    <main data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000"
                                        class="d-flex justify-content-center align-items-center result-main-content border-semidark mt-4"
                                        style="    overflow: hidden;">
                                        <div class="result-main-inner d-flex align-items-center justify-content-center"
                                            style="width: 966px;height: 345px;">
                                            <div class="empty-table w-100 text-center py-5">
                                                {{-- <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
                                            </lord-icon> --}}
                                                <img src="{{ asset('assets\images\searchload.gif') }}" height="70" width="120">
                                                <h4>No record has been found.</h4>
                                                <div class="another-c-details mt-4">
                                                    <a href="{{ route('property-category') }}" class="btn another-c-d-btn"
                                                        style="background-color: #6A78C7 !important; color: white;white-space:nowrap;">Add Property</a>
                                                </div>
                                            </div>
                                        </div>
                                    </main>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
