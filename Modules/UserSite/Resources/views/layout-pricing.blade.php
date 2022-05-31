@extends('user_site.layout.master')

@section('title')
Layout & pricing
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
                    <main class="layout">
                        <div class="pannel-heading">
                            <h2 class=" purple-dark pannel-title">Layout & Pricing</h2>
                            <a href="javascipt:;">
                                <h5 class="heading-fs-16 purple-dark">Back to overview</h5>
                            </a>
                        </div>
                        <div class="form-info-box">
                            <form action="" class="form-room-type">
                                <div class="p-form-heading">
                                    <h5 class="room_type_title">Please select</h5>
                                </div>
                                <div class="p-form-select pt-3">
                                    <label for="" class="form-label label-heading">Room type</label>
                                    <select class="form-select w-50 room_type">
                                        <option>Please Select</option>
                                        @foreach ($room_types as $room_type)
                                        <option value="{{$room_type->id}}">{{$room_type->room_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="layout-room-name d-flex d-none">
                                    <div class="p-form-select pt-3  w-50">
                                        <label for="" class="form-label label-heading">Room name</label>
                                        <input type="hidden" class="room_name_id" value="">
                                        <select class="form-select room_name_select">
                                        </select>
                                        <label for="" class="form-label label-heading">This is the name guests will see
                                            on the website</label>
                                    </div>
                                    <div class="contact-number-inner w-50 ps-4 pt-3">
                                        <label for="" class="form-label label-heading ">Phone Number</label>
                                        <input type="tel" class="form-control custom-from-control">
                                        <label for="" class="form-label label-heading">Create an optional, custom name
                                            for your reference.</label>
                                    </div>
                                </div>
                                <div class="p-form-select pt-3">
                                    <label for="" class="form-label label-heading">Smoking policy</label>
                                    <select class="form-select w-50">
                                        <option selected>N/A</option>
                                        <option value="n-smoking">Non-smoking</option>
                                        <option value="smoking">smoking</option>
                                    </select>
                                </div>
                                <div class="total-room-layout pt-3">
                                    <label for="" class="form-label label-heading ">Number of room(of this type)</label>
                                    <input type="number" class="form-control layout-totalroom">
                                </div>
                            </form>
                        </div>
                        
                        <div class="form-info-box mt-3">
                            <form action="" class="form-bedoption">
                                <div class="p-form-heading">
                                    <h5>Bed Options</h5>
                                </div>
                                <div class="bed-option-title d-flex">
                                    <h5 for="" class="form-label label-heading">What knd of bed are available in this
                                        room?</h5>
                                    <i class="fa-solid fa-circle-exclamation ps-2 mt-1" data-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Tell us only about the existing room (don't include extra beds)"></i>
                                </div>
                                <div id="text-input-add">
                                    <div class="d-flex align-items-center mb-3 bed_option_1" >
                                        <select class="form-select w-50" >
                                            <option selected>N/A</option>
                                            <option value="twinb">Twin bed(s) / 90-130 cm wide</option>
                                            <option value="kingb">King bed(s) / 130-130 cm wide</option>
                                            <option value="queenb">Queen bed(s) / 100-130 cm wide</option>
                                        </select>
                                        <span class="px-4"><i class="fa-solid fa-xmark"></i></span>
                                        <select class="form-select c-form-select">
                                            <option selected>Select the number of Beds</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="pannel-add-another py-3" >
                                    <a href="javascript:;" class="para-fs-14" id="p_add_another"><i class="fa-solid fa-circle-plus purple"></i> <span class="purple">Add another bed</span></a>
                                </div>
                                <div class="bed-option-guest-number">
                                    <label for="" class="form-label label-heading">How many guests can stay in this
                                        room?</label>
                                    <div class="total-room-layout ">
                                        <input type="number" class="form-control layout-totalroom d-inline">
                                        <span class="user-icon ps-2"><i class="fa-solid fa-user purple"></i></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form-info-box mt-3">
                            <form action="" class="form-roomsize ">
                                <div class="p-form-heading">
                                    <h5>Room Size (Optional)</h5>
                                </div>
                                <div class="input-group mb-3 total-room-layout w-50">
                                    <input type="tel" class="form-control custom-from-control" placeholder="0">
                                    <select class="form-select ">
                                        <option selected>N/A</option>
                                        <option value="s-meter">square meter</option>
                                        <option value="meter">meter</option>
                                        <option value="cm">cm</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="form-info-box mt-3">
                            <form action="" class="form-priceper-night">
                                <div class="p-form-heading d-flex">
                                    <h5>Base price per night</h5>
                                    <i class="fa-solid fa-circle-exclamation ps-2 mt-1" data-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="This is lowest price we automatically apply to this room for all date. Before your property goes live,you can set seasonal pricing on your property dashboard."></i>
                                </div>
                                <div class="input-group mb-3 total-room-layout w-25">
                                    <label for="" class="form-label label-heading">Price for 1 person</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text para-fs-14" id="addon-wrapping">INR/per
                                            Night</span>
                                        <input type="text" class="form-control custom-from-control" placeholder="0">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="another-c-details mt-4">
                            <a href="javascript:;" class="btn another-c-d-btn w-100">Continue</a>
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
    .spinner-border {
        float: right;
        width: 20px;
        height: 20px;
        margin-top: 4px;
        border: 3px solid currentColor;
        border-right-color: transparent;
    }
</style>
@endpush

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();

        $("#p_add_another").bind("click", function () {
            var counter = 1;
            $("#text-input-add").append('<div class="d-flex align-items-center mb-3 bed_option_'+ counter+1 +'" >' +
                                            '<select class="form-select w-50" >'+
                                                '<option selected>N/A</option>'+
                                                '<option value="twinb">Twin bed(s) / 90-130 cm wide</option>'+
                                                '<option value="kingb">King bed(s) / 130-130 cm wide</option>'+
                                                '<option value="queenb">Queen bed(s) / 100-130 cm wide</option>'+
                                            '</select>'+
                                            '<span class="px-4"><i class="fa-solid fa-xmark"></i></span>'+
                                            '<select class="form-select c-form-select">'+
                                                '<option selected>Select the number of Beds</option>'+
                                                '<option value="1">1</option>'+
                                                '<option value="2">2</option>'+
                                                '<option value="3">3</option>'+
                                            '</select>'+ '<i class="fa-solid fa-xmark text--red ps-3"></i>'
                                            + '<input type="button"  value="Remove" class="remove bedoption-remove-btn ps-2 text--red" />'+
                                        '</div>');
        });

        $("body").on("click", ".remove", function () {
            $(this).closest("div").remove();
        });

    

    $('.room_type').on('change', function(){ 
        var room_type = $('.room_type :selected').text();
        var abc = $('.room_type_title').html(room_type);
        var room_type_id = $('.room_type :selected').val(); 

        if(room_type != 'Please Select'){
            $('.layout-room-name').removeClass('d-none');
            // $('.room_name_id').val(room_type_id);
        }else{
            $('.layout-room-name').addClass('d-none');  
        }

        $.ajax({
            url:"{{ route('room-lists') }}",
            type:"POST",
            data: {
            room_type_id: room_type_id
            },
            dataType: 'JSON',
            success:function (data) {
                $('.room_name_select').empty();
                $('.room_name_select').html('<option>Please Select</option>');
                $.each(data.roomlist[0].room_lists,function(index,roomlist){+
                    $('.room_name_select').append('<option value="'+roomlist.id+'">'+roomlist.room_name+'</option>');
                })
            }
        })
    });
});
</script>
@endpush