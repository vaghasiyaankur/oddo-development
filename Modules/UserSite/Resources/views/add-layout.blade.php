@extends('layout::user.UserSite.master')

@section('title')
Add-Layout
@endsection

@section('content')
<!------ Pannel Form start ------->
<section class="pannel-form admin-pannel-main py-5">
    <div class="container">
        <div class="admin-pannel-inner">
            <div class="row">
                <div class="col-3">
                    @include('usersite::side-bar')
                </div>
                <div class="col-lg-9">
                    <main class="layout-add">
                        <div class="pannel-heading">
                            <h2 class=" purple-dark pannel-title">Layout & Pricing</h2>
                            <h5 class="heading-fs-16 purple-dark">Tell us abourt your first room. After entering all the necessary info,you can fill in the details of your other room.</h5>
                        </div>
                        <div class="layout-add-room">
                            <div class="add-room-box mx-auto text-center w-75">
                                <div class="add-room-icon">
                                    <i class="fa-solid fa-bed fs-3 pe-2"></i>
                                    <i class="fa-solid fa-bed fs-1 pe-2"></i>
                                    <i class="fa-solid fa-bed fs-2"></i>
                                </div>
                                <div class="add-room-description mt-3">
                                    <p >No room have been added to your property - start adding rooms to <br>
                                         describe bed options, layout, and pricing for guests.</p>
                                </div>
                                <div class="another-c-details mt-4">
                                    @php
                                        $hotel_id = request()->segment(3);
                                    @endphp 
                                    <a href="{{route('layout-pricing-form',['id' => $hotel_id] )}}" class="btn another-c-d-btn w-25">Add Room</a>
                                </div> 
                            </div>
                        </div>

                    </main>
                </div>
            </div>
        </div>

    </div>
</section>
<!------ Pannel Form end ------->

@endsection

@push('css')
<link rel="stylesheet" href="{{asset('Adminpannel design/css/pannel.css')}}">
<style>
    section.pannel-form.admin-pannel-main {
        min-height: calc(100vh - 337px);
    }
</style>
@endpush

@push('scripts')
@endpush
