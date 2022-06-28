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
                            <div class="dog-title-text">
                                <h1 class="dog-title-text"></h1>
                            </div>
                            <!-- <div class="acount-center">
                                <h2 class="main-content bog-subtitle-text mb-3  ">A Free Webs ite Just For Your Dog(s)!</h2>
                                <p class="similar-text-comune capture-text">Capture and memorialize every precious moment you spend together.</p>
                                <a href="account-dog-site-step-1.html" class="green-button">Start Now</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')

@endpush