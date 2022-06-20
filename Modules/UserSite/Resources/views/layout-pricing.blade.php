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
                            <a href="{{ $rooms ? route('room-list') : route('layout-form')}}">
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
                                    <select class="form-select w-50 room_type ">
                                        <option value="">Please Select</option>
                                        @foreach ($room_types as $room_type)
                                            <option value="{{$room_type->id}}">{{$room_type->room_type}}</option>
                                        @endforeach
                                    </select>
                                    <span id="room_type_error" class="text-danger"></span>
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
                                        <label for="" class="form-label label-heading ">Custom name (optional)</label>
                                        <input type="tel" class="form-control custom-from-control custom_name">
                                        <label for="" class="form-label label-heading">Create an optional, custom name
                                            for your reference.</label>
                                    </div>
                                </div>
                                <div class="p-form-select pt-3">
                                    <label for="" class="form-label label-heading">Smoking policy</label>
                                    <select class="form-select w-50 smoking_area">
                                        <option value="n-smoking">Non-smoking</option>
                                        <option value="smoking">smoking</option>
                                        <option value="b-smoking">I have both smoking and non-smoking options for this room type</option>
                                    </select>
                                </div>
                                <div class="total-room-layout pt-3">
                                    <label for="" class="form-label label-heading ">Number of room(of this type)</label>
                                    <input type="number" class="form-control layout-totalroom number_of_room">
                                </div>
                            </form>
                        </div>
                        
                        <div class="form-info-box mt-3 bed_option_div">
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
                                    <input type="hidden" class="number-of-select" value="1">
                                    <div class="d-flex align-items-center mb-3 bed_option_1 bed-option-div" >
                                        <select class="form-select w-50 bed_size bed_size_1 select-bed" >
                                            @foreach ($beds as $bed)
                                                <option value="{{$bed->id}}">{{$bed->bed_type}} / {{$bed->bed_size}}</option>
                                            @endforeach
                                        </select>
                                        <span class="px-4"><i class="fa-solid fa-xmark"></i></span>
                                        <select class="form-select c-form-select number_of_bed number_of_bed_1">
                                            <option  value="">Select the number of Beds</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select><br><br>
                                    </div>
                                    <span id="number_of_bed_error" class="text-danger"></span>
                                </div>
                                <div class="pannel-add-another py-3" >
                                    <a href="javascript:;" class="para-fs-14" id="p_add_another"><i class="fa-solid fa-circle-plus purple"></i> <span class="purple">Add another bed</span></a>
                                </div>
                                <div class="bed-option-guest-number">
                                    <label for="" class="form-label label-heading">How many guests can stay in this
                                        room?</label>
                                    <div class="total-room-layout ">
                                        <input type="number" class="form-control layout-totalroom d-inline number_of_guest">
                                        <span class="user-icon ps-2"><i class="fa-solid fa-user purple"></i></span>
                                    </div>
                                    <span id="number_of_guest_error" class="text-danger"></span>
                                </div>
                            </form>
                        </div>
                        <div class="form-info-box mt-3">
                            <form action="" class="form-roomsize ">
                                <div class="p-form-heading">
                                    <h5>Room Size (Optional)</h5>
                                </div>
                                <div class="input-group mb-3 total-room-layout w-50">
                                    <input type="tel" class="form-control custom-from-control room_size" placeholder="0">
                                    <select class="form-select room_size_feet">
                                        <option value="s-meter">square meters</option>
                                        <option value="s-feet">square feet</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        @if(@$hotel->propertytype->type == 'Guest house')
                            <div class="form-info-box mt-3">
                                <form action="" class="form-bathroom-part">
                                    <div class="p-form-heading  d-flex">
                                        <h5>Bathroom Details</h5>
                                    </div>
                                    <div class="bathroom-title pt-3">
                                        <label for="" class="form-label label-heading ">Is the bathroom private?</label>
                                    </div>
                                    <div class="amenities-raido-btn">
                                        <div class="form-check form-check-inline amenities-radio">
                                            <input class="form-check-input bathroom_private" type="radio" name="bathroom_private" id="yes" value="yes">
                                            <label class="form-check-label" for="yes">
                                            Yes    
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline amenities-radio">
                                            <input class="form-check-input bathroom_private" type="radio" name="bathroom_private" value="no" id="no" checked>
                                            <label class="form-check-label" for="no">
                                            No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="p-form-heading d-flex">
                                        <div class="bathroom-second-title pt-3">
                                            <label for="" class="form-label label-heading ">Which bathroom items are avaliable in this room?</label>
                                        </div>
                                    </div>
                                    <div class="bathroom-item-list ">      
                                        <div class="bathroom-item-check d-flex flex-wrap align-items-center justify-content-between">
                                            <input type="hidden" name="property_type" class="property_type" value="{{@$hotel->propertytype->type}}">
                                            @foreach ($bathrooms as $bathroom)
                                                <div class="form-check py-3 border--dotted">
                                                    <label class="form-check-label para-fs-14 fs-6">
                                                        <input class="form-check-input" name="bathroom_item" type="checkbox" value="{{$bathroom->id}}">
                                                        {{$bathroom->item}}
                                                    </label>
                                                </div>
                                            @endforeach     
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                        <div class="form-info-box mt-3">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <form action="" class="form-priceper-night">
                                        <div class="p-form-heading d-flex">
                                            <h5>Base price per night</h5>
                                            <i class="fa-solid fa-circle-exclamation ps-2 mt-1" data-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="This is lowest price we automatically apply to this room for all date. Before your property goes live,you can set seasonal pricing on your property dashboard."></i>
                                        </div>
                                        <div class="input-group mb-3 total-room-layout w-50">
                                            <label for="" class="form-label label-heading">Price for <span class="total_person">1</span> person</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text para-fs-14" id="addon-wrapping">INR/per
                                                    Night</span>
                                                <input type="text" class="form-control custom-from-control bed_price" placeholder="0" >
                                            </div>
                                            <span id="bed_price_error" class="text-danger"></span>
                                                    
                                               
                                                    <div class="total-room-layout pt-3 d-none number-of-bed">
                                                        <label for="" class="form-label label-heading ">Select the number of extra beds that can be added</label>
                                                        <select class="form-select layout-totalroom  me-3 extra_no_of_bed">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select>
                                                    </div>
                                        </div>
                                        <div class="amenities-title pt-3">
                                            <label for="" class="form-label label-heading ">Do you offer a lower rate when there are less than 6 guests?</label>
                                        </div>
                                        <div class="amenities-raido-btn">
                                            <div class="form-check form-check-inline amenities-radio">
                                                <input class="form-check-input offer-check" type="radio" name="flexRadioDefault" id="yes" value="yes">
                                                <label class="form-check-label" for="yes">
                                                 Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline amenities-radio">
                                                <input class="form-check-input offer-check" type="radio" name="flexRadioDefault" value="no" id="no" checked>
                                                <label class="form-check-label" for="no">
                                                 No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="discount-div d-none">
                                            <div class="amenities-title pt-3 dicount-label-div">
                                                <label for="" class="form-label label-heading ">How much discount do you offer?</label>
                                            </div>
                                            <div class="input-group mb-3 discount-div ">                                            
                                                <div class="w-50 d-flex">
                                                    <input type="text" class="form-control discountValue" style="border-radius: 0px" aria-label="Text input with dropdown button" value="0">
                                                    <select class="form-select c-form-select discountType" style="border-radius: 0px" name="discount-type" aria-label="Default select example">
                                                        <option value="percentage">%</option>
                                                        <option value="cash">INR</option>
                                                    </select>
                                                </div>
                                                <span class="ps-2 lh-3">per guest</span>
                                            </div>
                                            
                                            <div class="p-form-select pt-3 price_wrapper offer-person-div">
                                                <label for="" class="form-label label-heading">What is the minimum occupancy you are willing to offer a discount for?   </label>
                                                <select class="form-select c-form-select star_rating offer-person-select" name="star_rating" aria-label="Default select example">
                                                    {{-- <option value="N/A" selected="">N/A</option>
                                                    <option value="1">1 Star</option>
                                                    <option value="2">2 Star</option>
                                                    <option value="3">3 Star</option>
                                                    <option value="4">4 Star</option>
                                                    <option value="5">5 Star</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6 price-summary-main ">
                                    <div class="price-summary">
                                        <h4 class="mt-3 price-summary-head fw-bold">Price summary for: dsfdsf</h4>
                                        <div class="row justify-content-between">
                                            <div class="col-6">
                                                <p class="mb-1">Number of guests</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="mb-1">Price</p>
                                            </div>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-6">
                                                <p class="mb-1"><i class="fa-solid fa-user"></i> X <span class="number-person"></span></p>
                                            </div>
                                            <div class="col-6">
                                                <p class="mb-1 text-success">Rs.200</p>
                                            </div>
                                        </div> --}}
                                        <div class="price-discount-div">

                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-6">
                                                <p class="mb-1"><i class="fa-solid fa-user"></i> X 6</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="mb-1 text-success">Rs.200</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="mb-1"><i class="fa-solid fa-user"></i> X 6</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="mb-1 text-success">Rs.200</p>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="another-c-details mt-4">
                            <a href="javascipt:;" class="btn another-c-d-btn w-100 btn-submit-click">Continue
                                <div class="spinner-border" role="status" style="display: none;">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a>
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

    .form-check{
        flex: 0 0 48%;
        max-width: 48%;
    }
    .price-summary{
        background: #e6e6e6;
        padding: 4px 16px;
    }
    .price-summary-head{
        font-size: 20px;
        line-height: 24px
    }
    .price-summary-main{
        width: 100%;
        max-width: 400px;
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

        $(document).on('keyup', '.number_of_guest', function(){
            var value = $(this).val();
            
            $('.total_person').text(value);
            // $('.number-person').text(value);

            if (!value) {
                $('.total_person').text('0');    
                $('.number-person').text('0'); 
            } 

            var OfferCheck = $('.offer-check:checked').val();
            if(OfferCheck == 'yes')  {
                RoomDiscount();  
            }       

        });
        
        $(document).on('focusout', '.discountValue', function(){
            RoomDiscount();   
        });

        $(document).on('focusout', '.discountType', function(){
            RoomDiscount();   
        });

        $(document).on('focusout', '.bed_price', function(){
            RoomDiscount();   
        });

        $(document).on('change', '.star_rating', function(){
            var name = $('.star_rating').find(":selected").text();
            RoomDiscount(name);
        });


        function RoomDiscount(name){
            $(".price-discount-div").empty();
            $(".offer-person-select").empty();
            var discountValue = $('.discountValue').val();
            var noOfPerson = $('.number_of_guest').val();
            var total = $('.bed_price').val();
            var discountType  = $('.discountType').val();
            var j = noOfPerson;
            console.log(name);

            for(i=0; i < noOfPerson; i++) {
                var dec  = (discountValue / 100).toFixed(2);
                var mult = total * dec * i;
                
                if(discountType == 'percentage'){
                    var amount = total - mult;
                }else {
                    var amount = total - discountValue * i;
                }
                
                if (j < name) { break; }
                    $(".price-discount-div").append('<div class="row">' +
                                                '<div class="col-6">' +
                                                   ' <p class="mb-1"><i class="fa-solid fa-user"></i> X <span class="number-person"></span>'+j+'</p>' +
                                                '</div>' + 
                                                '<div class="col-6">' +
                                                   '<p class="mb-1 '+  (amount <= 0 ? 'text-danger': 'text-success')  +'">Rs.'+ amount +'</p>' +
                                                '</div>' +
                                            '</div>');

                                           
                                            
                if(i != 0){
                    var dadi = '';
                    if(i == name){
                        var name = 'selected';
                    }
                    $('.offer-person-select').append('<option value="'+ i +'"'+name+'> '+ i +'</option>');
                }
                j--;
            }
        }


        $(document).on('click', '.offer-check', function(){
            var offer = $(this).val();
            if(offer == 'yes'){
                $(".discount-div").removeClass('d-none');
            }else{
                $(".discount-div").addClass('d-none');

                var noOfPerson = $('.number_of_guest').val();
                var total = $('.bed_price').val();

                $(".price-discount-div").empty();
                
                $(".price-discount-div").append('<div class="row">' +
                                            '<div class="col-6">' +
                                               ' <p class="mb-1"><i class="fa-solid fa-user"></i> X <span class="number-person"></span>'+noOfPerson+'</p>' +
                                            '</div>' + 
                                            '<div class="col-6">' +
                                               '<p class="mb-1 text-success">Rs.'+ total +'</p>' +
                                            '</div>' +
                                        '</div>');
            }
        });


        $('[data-toggle="tooltip"]').tooltip();

        $("#p_add_another").bind("click", function () {
            var number = $('.number-of-select').val();
            var numbers = parseInt(number)+1;
            
            $("#text-input-add").append('<div class="d-flex align-items-center mb-3 bed-option-div" >' +
                                            '<select class="form-select w-50 bed_size_'+numbers+' select-bed" >'+
                                                '@foreach ($beds as $bed)'+
                                                    '<option value="{{$bed->id}}">{{$bed->bed_type}} / {{$bed->bed_size}}</option>' +
                                                '@endforeach' +
                                            '</select>'+
                                            '<span class="px-4"><i class="fa-solid fa-xmark"></i></span>'+
                                            '<select class="form-select c-form-select number_of_bed number_of_bed_'+numbers+'">'+
                                                '<option value="">Select the number of Beds</option>'+
                                                '<option value="1">1</option>'+
                                                '<option value="2">2</option>'+
                                                '<option value="3">3</option>'+
                                            '</select>'+ '<i class="fa-solid fa-xmark text--red ps-3"></i>'
                                            + '<input type="button"  value="Remove" class="remove bedoption-remove-btn ps-2 text--red" />'+
                                        '</div>');

                                        var number = $('.number-of-select').val(numbers);

        });

        $("body").on("click", ".remove", function () {
            $(this).closest("div").remove();
            var number = $('.number-of-select').val();
            var numbers = parseInt(number)-1;
            var number = $('.number-of-select').val(numbers);
        });

    

    $('.room_type').on('change', function(){ 
        var room_type = $('.room_type :selected').text();
        var set_title = $('.room_type_title').html(room_type);
        var room_type_id = $('.room_type :selected').val(); 

        if(room_type != 'Please Select'){
            $('.layout-room-name').removeClass('d-none');
        }else{
            $('.layout-room-name').addClass('d-none');  
        }


        if(room_type == 'Single'){
            $('.bed_option_div').addClass('d-none');
        }else{
            $('.bed_option_div').removeClass('d-none');
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
                $.each(data.roomlist[0].room_lists,function(index,roomlist){
                    $('.room_name_select').append('<option value="'+roomlist.id+'">'+roomlist.room_name+'</option>');
                })
            }
        })
    });

    $('.room_name_select').on('change', function(){ 
        var room_type = $('.room_name_select :selected').text();
        var set_title = $('.room_type_title').html(room_type);
    });

    $(".btn-submit-click").on('click', function(){

        let room_type = $('.room_type option:selected').val();
        !room_type ? $(`#room_type_error`).html(`Select a room type`) : $(`#room_type_error`).html(``);

        
        let number_of_guest = $('.number_of_guest').val();
        !number_of_guest ? $(`#number_of_guest_error`).html(`Please tell us the number of guests`) : $(`#number_of_guest_error`).html(``);
        
        let bed_price = $('.bed_price').val();
        !bed_price ? $(`#bed_price_error`).html(`Please enter a price`) : $(`#bed_price_error`).html(``);
        
        // let number_of_bed = $('.number_of_bed_'+number+' option:selected').val();
        // !number_of_bed ? $(`#number_of_bed_error`).html(`Select the number of beds`) : $(`#number_of_bed_error`).html(``);

        var BedDetail  = $(".bed-option-div").map(function(){return {
            bed   : $(this).children('.select-bed').val(),
            bedNo : $(this).children('.number_of_bed').val()
        }}).get();

        console.log(BedDetail);


        if (!room_type || !bed_price) {
            return;
        }
        
        let custom_name         = $('.custom_name').val();
        let room_name_select    = $('.room_name_select').val();
        let smoking_area        = $('.smoking_area').val();
        let number_of_room      = $('.number_of_room').val();
        let room_size           = $('.room_size').val();
        let room_size_feet      = $('.room_size_feet').val();
        let bathroom_private    = $("input[name='bathroom_private']:checked").val();
        let bathroom_item       = $("input[name='bathroom_item']:checked").map(function(){return $(this).val();}).get();

        let property_type       = $('.property_type').val(); 
        
        // var number = $('.number-of-select').val();
        
        
        // let bed_size = $('.bed_size_'+number).val();

        // var bed_value        = [];
            // var phone          = []; 
            // var optional_phone = [];

            // for(i=1; i <= number; i++){
            //     bed_value.push({'number_of_bed' : $('.number_of_bed_'+ i).val(), 'bed_size' : $('.bed_size_'+ i).val()});
            // }
            // property_type

        formdata = new FormData();

        formdata.append('room_type', room_type);
        formdata.append('number_of_guest', number_of_guest);
        formdata.append('bed_price', bed_price);
        formdata.append('custom_name', custom_name);
        formdata.append('room_name_select', room_name_select);
        formdata.append('smoking_area', smoking_area);
        formdata.append('number_of_room', number_of_room);
        formdata.append('BedDetail', JSON.stringify(BedDetail));
        formdata.append('room_size', room_size);
        formdata.append('room_size_feet', room_size_feet);
        if(property_type == 'guest house') {
            formdata.append('bathroom_private',bathroom_private);
            formdata.append('bathroom_item',bathroom_item);
        }

        $('.spinner-border').show();
        
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "{{route('add-room')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (res) {
                $("input[type=text], input[type=tel]").val("");
                if (res.redirect_url) {
                    window.location = res.redirect_url;
                }
            },
        }); 

    });

});
</script>
@endpush