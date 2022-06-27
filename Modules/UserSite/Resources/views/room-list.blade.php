@extends('layout::user.UserSite.master')

@section('title')
Add-Layout
@endsection
<style>
    .pannel-form.admin-pannel-main {
    min-height: calc(100vh - 472px);
}
</style>
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
                        @foreach($rooms as $room)
                        <div class="layout-add-room px-4 py-5">
                            
                            
                            <div class="add-room-box d-flex justify-content-between align-items-center">
                                <div class="addroom-left">
                                    <h5 class="m-0 heading-fs-16 fw-bold">{{$room['roomlist']->room_name}}</h5>
                                </div>
                                <div class="addroom-middle">
                                    <P class="m-0 para-fs-14">Number of this type: <span class="fw-bold">{{$room->number_of_room}}</span></P>
                                </div>
                                <div class="addroom-right">
                                    <div class="addroom-btn">
                                        <a href="javascript:;" class="addroom-link pe-3 purple">Edit</a>
                                        <a href="javascript:;" class="addroom-link purple">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        @endforeach
                        <div class="another-c-details mt-4 text-end">
                            <a href="{{route('layout-pricing-form')}}" class="btn another-c-d-btn bg-light w-25 btn-outline-dark text-dark py-2">Add Another Room</a>
                            <a href="{{route('facilities-form')}}" class="btn another-c-d-btn w-25 py-2">Continue</a>
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
@endpush

@push('scripts')

@endpush