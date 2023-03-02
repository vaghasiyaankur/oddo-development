@extends('layout::user.Frontend.master')

@section('title')   {{$pageData->title}} @endsection
@section('meta_description') {{$pageData->meta_description}} @endsection
@section('meta_keywords') {{$pageData->meta_key}} @endsection

@push('css')
<style>
    .page{
        text-align: center;
        margin-top: 25px;
    }
    .pages{
        font-family: "Avenir LT Std";
        color: #393c52;
    }
    .multi-s-title h5 {
        font-weight: 400;
    }
    .about-content .about-title{
        font-weight: 750;
        font-size: 20px;
        line-height: 24px;
        position: relative;
        width: 100%;
        z-index: 1;
        max-width: fit-content;
        margin-bottom: 25px;
    }
    .about-content .about-title::before{
        content: "";
        position: absolute;
        width: 45px;
        top: 14px;
        right: -50px;
        display: flex;
        border: 1px solid #555D64;
        align-items: center;
        justify-content: center;
        height: 1px;
    }
    .about-content .about-title-text{
        font-weight: 400;
        font-size: 24px;
        line-height: 29px;
        color: #353535;
        margin-bottom: 20px;
    }
    .about-content .about-content-text{
        font-weight: 400;
        font-size: 16px;
        line-height: 26px;
        text-align: justify;
        color: #555D64;
    }
    .about-content .about-inner-text{
        font-weight: 400;
        font-size: 20px;
        line-height: 24px;
        text-align: justify;
        color: #353535;
        position: relative;
        padding-left: 10px;
    }
    .about-content .about-inner-text::after{
        content: "";
        position: absolute;
        display: flex;
        border: 1.5px solid rgb(85 93 100 / 30%);
        align-items: center;
        justify-content: center;
        width: 1px;
        height: 40px;
        top: 4px;
        left: 0;
    }
    .about-content .about-kennenth span:first-child{
        color: #353535;
        font-weight: 750;
        font-size: 18px;
        line-height: 22px;
        position: relative;
        padding-left: 15px;
    }
    .about-content .about-kennenth span:first-child::after{
        content: "";
        position: absolute;
        width: 11px;
        top: 10px;
        left: 0px;
        display: flex;
        border: 1px solid #555D64;
        align-items: center;
        justify-content: center;
        height: 1px;
    }
    .about-content .about-kennenth span:last-child{
        color: #555D64;
        font-weight: 750;
        font-size: 18px;
        line-height: 22px;
        position: relative;
    }
    .about-content-inner .about-title{
        font-weight: 750;
        font-size: 20px;
        line-height: 24px;
        position: relative;
        width: 100%;
        z-index: 1;
        max-width: fit-content;
        margin-bottom: 25px;
        color: #555D64;
    }
    .about-content-inner .about-title::before{
        content: "";
        position: absolute;
        width: 45px;
        top: 14px;
        right: -50px;
        display: flex;
        border: 1px solid #555D64;
        align-items: center;
        justify-content: center;
        height: 1px;
    }
    .about-content-inner .about-content-text{
        font-weight: 400;
        font-size: 16px;
        line-height: 26px;
        text-align: justify;
        color: #555D64;
    }
    .about-experience .about-inner{
        width: 100%;
        flex: 1 1 48%;
        padding: 15px;
    }
   
    .about-experience .about-experience-inner2{
        margin-top: 50px;
    }
    .about-experience .about-experience-inner1 .about-inner .about-experience-content-img .bg-img1{
        border-radius: 10px 70px 0 70px;
    }
    .about-experience .about-experience-inner1 .about-inner .about-experience-image .bg-img2{
        border-radius: 70px 0px 70px 10px;
       
    }
    .about-experience .about-experience-inner2 .about-inner .about-experience-content-img .bg-img3{
        border-radius: 70px 10px 70px 0px;
    }
    .about-experience .about-experience-inner2 .about-inner .about-experience-image .bg-img4{
        border-radius: 00px 70px 10px 70px;
    }
    .about-experience .about-experience-inner1 .about-inner .about-experience-content-img::before{
        content: "";
        position: absolute;
        background: rgba(53, 53, 53, 0.8);
        width: 100%;
        height: 100%;
        border-radius: 10px 70px 0;
    }
    .about-experience .about-experience-inner2 .about-inner .about-experience-image::before{
        content: "";
        position: absolute;
        background: rgba(53, 53, 53, 0.8);
        width: 100%;
        height: 100%;
        border-radius: 10px 70px 0;
    }
    .about-experience .about-experience-inner2 .about-inner .about-experience-image .about-experience-content .about-content-text{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        text-align:center;
        width: 100%;
    }
    .about-experience .about-experience-inner1 .about-inner .about-experience-content-img .about-experience-content .about-content-text{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        text-align:center;
        width: 100%;
    }
    .about-hotel-logo-content{
        position: absolute;
        width: 100%;
        max-width: 200px;
        height: 100%;
        max-height: 200px;
        min-height: 200px;
        border-radius: 50%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(5px);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
    }
    svg {
        fill: currentColor;
        height: auto;
        max-width: 66vmin;
        transform-origin: center;
        letter-spacing: 0px;
        width: 90%;
        transform: rotate(301deg);
    }

    @media screen and (max-width:480px){
        .about-hotel-logo-content{
            width: 100%;
            max-width: 130px;
            height: 100%;
            max-height: 130px;
            min-height: 130px;
            padding: 10px;
        }
        .about-experience .about-inner{
            padding: 5px;
        }
        .about-experience .about-experience-inner1 .about-inner .about-experience-content-img .bg-img1 {
            border-radius: 10px 50px 0 50px;
        }
        .about-experience .about-experience-inner1 .about-inner .about-experience-content-img::before{
            border-radius: 10px 50px 0;
        }
        .about-experience .about-experience-inner2 .about-inner .about-experience-content-img .bg-img3 {
            border-radius: 50px 10px 50px 0px;
        }
        .about-experience .about-experience-inner1 .about-inner .about-experience-image .bg-img2 {
            border-radius: 50px 0px 50px 10px;
        }
        .about-experience .about-experience-inner2 .about-inner .about-experience-image::before {
            border-radius: 10px 50px 0;
        }
        .about-experience .about-experience-inner2 .about-inner .about-experience-image .bg-img4 {
            border-radius: 0px 50px 10px 50px;
        }
        .about-experience .about-experience-inner2{
            margin-top: 30px;
        }
        .about-content .about-title-text {
            font-size: 20px;
            line-height: 27px;
        }
        .about-content .about-content-text {
            font-size: 14px;
            line-height: 24px;
        }
        .about-content .about-inner-text {
            font-size: 18px;
            line-height: 22px;
        }
        .about-content .about-kennenth span:first-child {
            font-size: 16px;
            line-height: 20px;
        }
        .about-content .about-kennenth span:last-child {
            font-size: 16px;
            line-height: 20px;
        }
        .about-content-inner .about-title {
            font-weight: 750;
            font-size: 18px;
            line-height: 22px;
            margin-bottom: 20px;
        }
    }
</style>
@endpush

@section('content')
<div class="pages">
    <div class="container">
        <div class="multi-s-title text-center">
            <h5>{{$pageData->show_title == 1 ? $pageData->title : ''}}</h5>
        </div>
        <div class="row align-items-center py-4">
            <div class="col-lg-6 py-3">
                <div class="about-experience d-flex position-relative">
                    <div class="about-experience-inner1">
                        <div class="about-inner">
                            <div class="about-experience-content-img position-relative">
                                <div class="about-experience-content">
                                    <img src="{{asset('storage/images/about_img1.png')}}" alt="" class="img-fluid bg-img1">
                                    <div class="about-content-text">
                                        <img src="{{asset('storage/images/about_call_icon.png')}}" alt="" class="img-fluid">
                                        <p class="mb-0 pt-sm-3 pb-sm-2 py-1">Phone Number</p>
                                        <p class="mb-0">+91 85123 12345</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="about-inner">
                            <div class="about-experience-image">
                                <img src="{{asset('storage/images/about_img2.png')}}" alt="" class="img-fluid bg-img2">
                            </div>
                        </div>
                    </div>
                    <div class="about-experience-inner2">
                        <div class="about-inner">
                            <div class="about-experience-content-img"> 
                                <img src="{{asset('storage/images/about_img1.png')}}" alt="" class="img-fluid bg-img3">
                            </div>
                        </div>
                        <div class="about-inner">
                            <div class="about-experience-image position-relative">
                                <div class="about-experience-content">
                                    <img src="{{asset('storage/images/about_img2.png')}}" alt="" class="img-fluid bg-img4">
                                    <div class="about-content-text">
                                        <img src="{{asset('storage/images/about_mail_icon.png')}}" alt="" class="img-fluid">
                                        <p class="mb-0 pt-sm-3 pb-sm-2 py-1">Email Address</p>
                                        <p class="mb-0">info@webmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about-hotel-logo-content">
                        <svg viewBox="0 0 100 100" width="100" height="100">
                            <defs>
                              <path id="circle"
                                d="
                                  M 50, 50
                                  m -37, 0
                                  a 37,37 0 1,1 74,0
                                  a 37,37 0 1,1 -74,0"/>
                            </defs>
                            <text font-size="13">
                              <textPath xlink:href="#circle">
                                5 years of experience hotel business -                    
                              </textPath>
                            </text>
                        </svg>
                       <div class="about-hote-image position-absolute">
                           <img src="{{asset('storage/images/about-content-img.png')}}" alt="" class="img-fluid">
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 py-3">
                <div class="about-content mb-sm-5 mb-3">
                    <h5 class="about-title">About Hotel</h5>
                    <h4 class="about-title-text">Hotel Regent Laguna has been welcoming Booking.com
                        guests since Aug 24, 2019</h4>
                    <p class="about-content-text">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                    <p class="about-inner-text">Five-star hotels are properties that offer their guest the highest level of luxury.</p>
                    <p class="about-kennenth">
                        <span>Kenneth Campbell</span>
                        <span> - Head of Idea</span>
                    </p>
                </div>
                <div class="about-content-inner">
                    <h5 class="about-title">Our  Mission & Vision</h5>
                    <p class="about-content-text">Welcomed every pain avoided but in certain circumstances owing to the claims of duty or the obligations</p>
                </div>
            </div>
        </div>

        {{-- <div class="page" style="min-height:calc(100vh - 361px);">
            {!! $pageData->description !!}
        </div> --}}
    </div>
</div>
@endsection

@push('script')


@endpush