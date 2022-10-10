@extends('layout::user.UserSite.master')

@section('title')
Add-Layout
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('user/asset/css/user-style.css')}}">
@endpush

@section('content')
<section class="account-content">
    <div class="container">
        <div class="row py-4">
            @include('usersite::user.sidebar.sidebar')
            <div class="col-lg-10 col-md-10 col-12 right-side-content">
                <div id="tabs">
                    <div class="col-xs-12 ">
                        @foreach ($hotels as $hotel)        
                        <div class="tab-content py-3 px-3 px-sm-0 pt-0 pt-md-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="share-section mb-lg-5 mb-4">
                                    <div class="drag-section justify-content-between flex-wrap">
                                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                                            <img src="{{ @$hotel->mainPhoto->first()->photos ? asset('storage/'.@$hotel->mainPhoto->first()->photos) : asset('assets/images/default.png') }}"
                                                onerror="this.src='{{asset('assets/images/default.png')}}'"
                                                alt="" class="drag-image">
                                            <span>
                                                <h2 class="property-subtitle-text">{{$hotel->property_name}}</h2>
                                            </span>
                                        </div>
                                        <div class="upload-delete-button-step d-flex justify-content-between align-items-center flex-wrap ">
                                            <a href="javascript:;"
                                                class="white-button-step px-lg-3 py-lg-2 px-2 py-1 d-flex align-items-center me-2">Albums</a>
                                            <a href="javascript:;"
                                                class="white-button-step px-lg-3 py-lg-2 px-2 py-1 d-flex align-items-center me-2">Preview</a>
                                            {{-- <a href="{{route('edit.proeprty', ['id' => $hotel->UUID])}}"
                                                class="green-button-step py-2 d-flex align-items-center me-2 px-3">Edit Property</a> --}}
                                            <a href="javascript:;" class="white-button-step px-2 px-lg-3 py-lg-2 px-2 py-1 d-flex align-items-center propertyDelete" data-value="{{ $hotel->UUID }}">Delete</a>
                                        </div>
                                    </div>

                                    {{-- <div class="social-media mt-4 d-flex">
                                        <div class="social-text mb-0 mr-3">
                                            <div class="dog-text">Share with:</div>
                                        </div>
                                        <div class="social-icon">
                                            <div class="share-with-your-friend social_back">
                                                <ul class="share-this mb-0">
                                                    <li class="share-social-icon mr-2 share-button">
                                                        <a href="javascript:;" class="share-icon-text">
                                                            <img src="https://dev.idratherbewithmydog.net/themes/irbwmd/assets/images/icon/share.svg"
                                                                alt=""><span class="share-span">ShareThis</span>
                                                        </a>
                                                    </li>
                                                    <li class="share-social-icon mr-2 position-relative">
                                                        <a href="javascript:;" class="share-anchor"
                                                            data-url="https://dev.idratherbewithmydog.net/dogsite/tn4v3Lh1KB32"
                                                            id="dogsite-paste-32"
                                                            onclick="copyToClipboard('#dogsite-paste-32')">
                                                            <img src="https://dev.idratherbewithmydog.net/themes/irbwmd/assets/images/icon/copy.svg"
                                                                alt="">
                                                        </a>
                                                        <p class="copied-tooltip">Copied</p>
                                                    </li>
                                                    <li class="share-social-icon mr-2">
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://dev.idratherbewithmydog.net/dogsite/tn4v3Lh1KB32"
                                                            class="share-anchor" target="_blank">
                                                            <img src="https://dev.idratherbewithmydog.net/themes/irbwmd/assets/images/icon/facebook-icon.svg"
                                                                alt="">
                                                        </a>
                                                    </li>
                                                    <li class="share-social-icon mr-2">
                                                        <a href="https://twitter.com/intent/tweet?text=Default+share+text&amp;url=https://dev.idratherbewithmydog.net/dogsite/tn4v3Lh1KB32"
                                                            class="share-anchor" target="_blank">
                                                            <img src="https://dev.idratherbewithmydog.net/themes/irbwmd/assets/images/icon/twitter-icon.svg"
                                                                alt="">
                                                        </a>
                                                    </li>

                                                    <li class="share-social-icon mr-2">
                                                        <a href="https://wa.me/?text=https://dev.idratherbewithmydog.net/dogsite/tn4v3Lh1KB32"
                                                            class="share-anchor" target="_blank">
                                                            <img src="https://dev.idratherbewithmydog.net/themes/irbwmd/assets/images/icon/whatsapp.svg"
                                                                alt="">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab"></div> --}}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('scripts')
<script>
$(document).ready(function(){
    var baseUrl = $('#base_url').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.propertyDelete', function(){
        let id = $(this).data('value');
         
        formdata = new FormData();
        formdata.append('id', id);

        $.ajax({
            url: baseUrl + "/user/propertyDelete/" + id,
            type: "POST",
            processData: false,
            contentType: false,
            success: function (response) { 
                console.log(response);
            },
        }); 

    });
});
</script>
@endpush