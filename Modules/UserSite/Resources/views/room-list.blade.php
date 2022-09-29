@extends('layout::user.UserSite.master')

@section('title')
Room List
@endsection
<style>
    .pannel-form.admin-pannel-main {
    min-height: calc(100vh - 361px);
}
</style>
@section('content')
<!------ Pannel Form start ------->
<section class="pannel-form admin-pannel-main py-5">
    <div class="container">
        <div class="admin-pannel-inner">
            <div class="row">
                <div class="col-lg-3">
                    @include('usersite::side-bar')
                </div>
                @php
                    @$id = Request::route('id');
                @endphp
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
                                        
                                        <a href="javascript:;" class="addroom-link pe-3 purple editRoom" data-hotel="{{@$id}}" data-id="{{$room->UUID}}">Edit</a>
                                        <a href="javascript:;" class="addroom-link purple deleteRoom" data-hotel="{{@$id}}" data-id="{{$room->UUID}}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        @endforeach
                       
                        <div class="another-c-details mt-4 text-end">
                            <a href="{{route('layout-pricing-form', ['id' => @$id])}}" class="btn another-c-d-btn bg-light w-25 btn-outline-dark text-dark py-2">Add Another Room</a>
                            <a href="{{route('facilities-form', ['id' => @$id])}}" class="btn another-c-d-btn w-25 py-2">Continue</a>
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
<script>
    $(document).ready(function(){
        var baseUrl = $('#base_url').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.deleteRoom', function(){
            let roomId = $(this).data('id');
            let hotel_id = $(this).data('hotel');
            $.ajax({
                url: baseUrl + "/user/deleteRoom/" + hotel_id + "/" + roomId,
                type: "POST",
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response.roomCount == 1){
                        window.location = response.layout_url;
                    }else{
                        window.location = response.redirect_url;
                    }
                },
            });
        });

        $(document).on('click', '.editRoom', function(){
            var roomId = $(this).data('id'); 
            let hotel_id = $(this).data('hotel');

            $.ajax({
                url: baseUrl + "/user/edit/room/" + hotel_id + "?roomId=" + roomId,
                type: "POST",
                processData: false,
                contentType: false,
                success: function (response) {
                    window.location = response.redirect_url;
                },
            });
        });
    });
</script>
@endpush
