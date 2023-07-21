@extends('layout::admin.master')
@section('title','Settings')

@push('css')
<style>
    .page-content .card.bg-soft-warning{
        background-color: transparent !important;
        box-shadow: 0 1px 2px transparent;
    }
    
    .page-content .bg-soft-warning .hstack .view-btn {
        height: 2rem;
        width: 5rem;
        background: #6A78C7;
    }

    .page-content .bg-soft-warning .hstack .view-btn a {
        color: #fff !important;
    }
   
    .page-content .card .card-body .contact-details .contact-details-inner{
        font-weight: 500;
        font-size: 16px;
        line-height: 24px;
        color: #767992;
    }
    .page-content .card .card-body .dashboard .navbar-nav .nav-item{
        background: #F3F3F9;
        box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        padding: 18px 30px;
        margin-bottom: 15px;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: #393C52;
    }
    .page-content .card .card-body .dashboard .navbar-nav .nav-item .nav-text{
        border-bottom: 1px solid rgb(106 120 199 / 20%);
        padding: 0px 0 15px; 
    }
    .page-content .card .card-body .dashboard .navbar-nav .nav-item span.text-green{
        color: #15A73E;
    }
    .page-content .card .card-body .policies .navbar-nav .nav-item span.text-green{
        color: #15A73E;
    }
    .page-content .card .card-body .dashboard .navbar-nav .nav-item span.text-red{
        color: #ED2E2E;
    }
    .page-content .card .card-body .policies .navbar-nav .nav-item span.text-red{
        color: #ED2E2E;
    }
    .page-content .card .card-body .dashboard .navbar-nav .nav-item .close-icon {
        border: 1.3px solid #15A73E;
        color: #15A73E;
        width: 20px;
        background: transparent;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .page-content .card .card-body .policies .navbar-nav .nav-item{
        background: #F3F3F9;
        box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        padding: 18px 30px;
        margin-bottom: 15px;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: #393C52;
    }
    .page-content .card .card-body .dashboard .navbar-nav .nav-item .close-icon.btn-danger {
        border: 1.3px solid #ED2E2E;
        color: #ED2E2E;
        width: 17px;
        background: transparent;
        height: 17px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .page-content .card .card-body  .policies .navbar-nav .nav-item .close-icon.btn-danger{
        border: 1.3px solid #ED2E2E;
        color: #ED2E2E;
        width: 17px;
        height: 17px;
        background: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .page-content .card .card-body .policies .navbar-nav .nav-item .close-icon{
        border: 1.3px solid #15A73E;
        color: #15A73E;
        width: 17px;
        height: 17px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .page-content .card .card-body .policies .navbar-nav .nav-item .nav-text{
        border-bottom: 1px solid rgb(106 120 199 / 20%);
        padding: 15px 0; 
    }
    .page-content .card .card-body .amenities span{
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: #393C52;
    }
    .page-content .card .card-body .amenities span i{
        color: #393C52;
    }
    .page-content .card-body .badge-btn {
        display: inline-block;
        padding: 4px 4px;
        font-weight: 600;
        line-height: 1;
        color: #6A78C7;
        text-align: center;
        border-radius: .25rem;
        background: rgb(106 120 199 / 10%);
    }

    .page-content .card-body .card-inner {
        box-shadow: 0 2px 11px rgb(56 65 74 / 15%);
    }
    .border-puple {
        border: 1px solid #6A78C7;
        border-radius: 5px;
    }
</style>
@endpush

@section('content')
<div class="page-content px-4">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <div class="card mt-n4 mx-n4 mb-n5 bg-soft-warning">
                    <div class="card-body pb-4 mb-5">
                        <div class="row">
                            <div class="col-md d-flex justify-content-md-start justify-content-center">
                                <div class="row align-items-center">
                                    <div class="col-sm-auto d-flex justify-content-sm-start justify-content-center">
                                        <div class="avatar-md mb-3 mb-sm-0">
                                            <div class=" avatar-md avatar-title rounded-circle">
                                                <img src="{{ @$hotel->mainPhoto->first()->photos ? asset('storage/'.@$hotel->mainPhoto->first()->photos) : asset('assets/images/default.png') }}" alt="" 
                                                onerror="this.src='{{asset('assets/images/default.png')}}'" class="avatar-md rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-sm">
                                        <h4 class="text-sm-start text-center" id="ticket-title">{{$hotel->property_name}}</h4>
                                        <div class="hstack gap-3 d-flex justify-content-sm-start justify-content-center">
                                            <div class="d-flex align-items-center">
                                                <i class="{{$hotel->star_rating >= 1 ? "ri-star-fill" : "" }}  fs-15 text-warning"></i>
                                                <i class="{{$hotel->star_rating >= 2 ? "ri-star-fill" : "" }} fs-15 text-warning"></i>
                                                <i class="{{$hotel->star_rating >= 3 ? "ri-star-fill" : "" }} fs-15 text-warning"></i>
                                                <i class="{{$hotel->star_rating >= 4 ? "ri-star-fill" : "" }} fs-15 text-warning"></i>
                                                <i class="{{$hotel->star_rating >= 5 ? "ri-star-fill" : "" }} fs-15 text-warning"></i>
                                            </div>
                                            <div class="vr"></div>
                                            <div class="text-dark">Create Date : <span class="fw-medium " id="create-date">{{ date('d M, Y', strtotime($hotel->created_at)) }}</span></div>
                                           
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end col-->
                            <div class="col-md-auto mt-4 d-flex justify-content-center">
                                <div class="hstack gap-3 flex-wrap">
                                    @if ($hotel->status == 0)
                                        <button type="button" class="btn view-btn mt-n1 p-0 favourite-btn active" id="propertyApproveBtn" data-id="{{$hotel->id}}">
                                            <a href="javascript:;">Approve</a>
                                        </button>
                                    @endif
                                    <button type="button" class="btn  view-btn mt-n1 p-0 favourite-btn active">
                                        <a href="javascript:;">Gallery</a>
                                    </button>
                                    <button type="button" class="btn view-btn mt-n1 p-0 favourite-btn active">
                                        <a href="javascript:;">Up</a>
                                    </button>
                                    @if ($hotel->status == 1)
                                        <button type="button" class="btn view-btn  mt-n1 p-0 favourite-btn active" id="propertyRejectButton" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="Mary">
                                            <a href="javascript:;">Reject</a>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal start  -->
        <div class="modal fade" id="varyingcontentModal" tabindex="-1" aria-labelledby="varyingcontentModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="varyingcontentModalLabel">New message to Mary</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input type="hidden" name="hotel_id" id="hotel" value="{{$hotel->id}}"/>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control reject_reason" id="message-text" rows="4" name="reject_reason"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="rejectMessageBtn">Send message</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end  -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="description mb-5">
                            <h6 class="mb-3 fs-16 border-bottom pb-3">Description</h6>
                            <p class="text-muted mb-0 fs-14">{{ $hotel->description }}</p>
                        </div>
                        <div class="contact-details mb-5">
                            <h6 class="mb-3 fs-16 border-bottom pb-3">Contact Details</h6>
                            <div class="contact-details-inner d-flex">
                                <div class="client-name d-flex">
                                    <i class="ri-user-line"></i>
                                    <p class="mb-0 ps-2 fs-14">John Smith</p>
                                </div>
                                <div class="vr mx-3"></div>
                                <div class="client-number d-flex">
                                    <i class="ri-phone-line"></i>
                                    <p class="mb-0 ps-2 fs-14">9723 256 358</p>
                                </div>
                            </div>
                        </div>
                        <div class="address mb-5">
                            <h6 class="mb-3 fs-16 border-bottom pb-3">Address</h6>
                            <p class="text-muted mb-0 fs-14"> {{ $hotel->street_addess }} </p>
                        </div>
                        <div class="dashboard mb-5">
                            <h6 class="mb-3 fs-16">Create an excellent ui for a dashboard</h6>
                            <ol class="navbar-nav text-muted">
                                <li class="nav-item">
                                    <p class="nav-text  fs-15"> 1. Is parking available for guests?</p>
                                    
                                    <div class="d-flex align-items-center">
                                        @if ($hotel->parking_available == 'no')    
                                            <a href="javascript:;" class="fs-14 d-flex align-items-center">
                                                <i class="ri-close-line badge-btn close-icon btn-danger  rounded-pill"></i>
                                                <span class="px-2 text-red"> No</span>
                                            </a> 
                                        @else
                                            <a class="fs-14 d-flex align-items-center">
                                                <i class="ri-check-line close-icon rounded-pill"></i>
                                                <span class="px-2 text-green"> Yes</span>
                                            </a>
                                            <a href="javascript:;" class="badge-btn fs-14 mx-2 py-1" id="t-priority">{{$hotel->parking_site}} Site</a>
                                            <a href="javascript:;" class="badge-btn fs-14 mx-2 py-1" id="t-priority">{{$hotel->parking_type}}</a>
                                        @endif
                                    </div>
                                  
                                </li>
                                <li class="nav-item">
                                    <p class="nav-text  fs-15">
                                        2. Is breakfast available to guests? 
                                    </p>
                                     
                                    <div class="d-flex align-items-center">
                                        @if ($hotel->breakfast == 'no')
                                            <a href="javascript:;" class="fs-14 d-flex align-items-center">
                                                <i class="ri-close-line badge-btn close-icon btn-danger  rounded-pill"></i>
                                                <span class="px-2 text-red"> No</span>
                                            </a> 
                                        @else
                                            <a href="javascript:;" class="fs-14 d-flex align-items-center">
                                                <i class="ri-check-line close-icon fs-14 badge-btn rounded-pill"></i>
                                                <span class="px-2 text-green"> Yes</span>
                                            </a>
                                            @php
                                                $breakfast = $hotel->foodType();
                                            @endphp
                                            @foreach ($breakfast as $item) 
                                                <span class="badge-btn  fs-12 px-2 py-1" id="t-priority">{{$item->food_type}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                  
                                </li>
                                <li class="nav-item"> 
                                    <p class="nav-text  fs-15">
                                        3. Languages Spoken
                                    </p>
                                    <div class="d-flex align-items-center">
                                        @php
                                        $languages = explode(',', $hotel->language);
                                        @endphp
                                        @foreach ($languages as $language)
                                            <span class="badge-btn  fs-14 px-2 py-1" id="t-priority">{{$language}}</span>
                                        @endforeach
                                    </div>
                                 
                                </li>
                                <li class="nav-item">
                                    <p class="nav-text  fs-15">
                                        4. Can you provide extra bed?
                                    </p>
                                    <div class="d-flex align-items-center">
                                        @if ($hotel->extra_bed == 'no')
                                            <a href="javascript:;" class="fs-14 d-flex align-items-center">
                                                <i class="ri-close-line close-icon fs-12 btn-danger  rounded-pill badge-btn"></i>
                                                <span class="px-2 text-red"> No</span>
                                            </a>
                                        @else
                                            <a href="javascript:;" class="fs-14 d-flex align-items-center">
                                                <i class="ri-check-line close-icon fs-12 badge-btn rounded-pill"></i>
                                                <span class="px-2 text-green"> Yes</span>
                                            </a>
                                            <a href="javascript:;" class="fs-14 d-flex align-items-center">
                                             <span class="fs-12 badge-btn rounded-pill  px-2 py-1">{{$hotel->number_extra_bed}}</span>
                                            </a>
                                        @endif
                                    </div>
                                   
                                    
                                </li>
                            </ol>
                        </div>
                        <div class="policies">
                            <h6 class="mb-3 fs-16">Policies</h6>
                            <ul class="navbar-nav text-muted">
                                <li class="nav-item">
                                    <p class="nav-text  fs-15">
                                        1. How many days in advance can guests cancel free of charge?
                                    </p>
                                    <!-- <a href="javascript:;" class="rounded-pill fs-12 badge-btn btn-danger  rounded-pill">
                                        <i class="ri-close-line close-icon fs-12"></i>
                                    </a> -->
                                    <div class="d-flex align-items-center">
                                        <a class="fs-14 d-flex align-items-center">
                                            <i class="ri-check-line close-icon rounded-pill"></i>
                                            <span class="px-2 text-green"> Yes</span>
                                        </a>
                                        <a class=" fs-14 badge-btn  px-2 py-1"><span>{{$hotel->cancel_booking}}</span> Day</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <p class="nav-text  fs-15">
                                        2. Guests will pay 100%
                                    </p>
                                    <!-- <a href="javascript:;" class="rounded-pill fs-12 badge-btn btn-danger  rounded-pill">
                                        <i class="ri-close-line close-icon fs-12"></i>
                                    </a> -->
                                    <div class="d-flex align-items-center">
                                        <a  class="fs-14 d-flex align-items-center">
                                            <i class="ri-check-line close-icon rounded-pill"></i>
                                            <span class="px-2 text-green"> Yes</span>
                                        </a>
                                        <a class="badge-btn  fs-14 px-2 py-1" id="t-priority">{{ $hotel->pay_type == 'first_hight' ? 'of the first night' : ' of the full stay' }}</a>
                                    
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 fs-16">Selected Amenities</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($hotel->amenity() as $amenity)
                        <div class="d-flex fs-14 align-items-center amenities">
                            <span>
                                <i class=" ri-gamepad-line fs-14"></i>
                            </span>
                            <span class="ps-2">
                                {{$amenity->amenities}}
                            </span>
                        </div>
                           
                        @endforeach
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 fs-16">Selected Facilities</h5>
                    </div>
                    <div class="card-body ">
                        @foreach ($hotel->facilities() as $facilities)
                        <div class="d-flex fs-14 align-items-center amenities">
                            <span>
                                <i class="bx bx-home-alt fs-14"></i>
                            </span>
                            <span class="ps-2">
                                {{$facilities->facilities_name}}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 fs-16">Check-In / Check-Out</h5>
                    </div>
                    <div class="card-body fs-13 ">
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-2 fs-14">Check-In</p>
                                <div class="h-check-in-out border-puple mx-auto">
                                    <div class="p-2 d-flex align-items-center">
                                        <img src="{{asset('assets/images/icons/cal-icon.png')}}" class="pe-2 pb-1 img-fluid">
                                        {{-- <span class="check-text text--green">check-in-time</span> --}}
                                        <span class="mb-0 fs-14">{{$hotel->check_in}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <p class="mb-2 fs-14">Check-Out</p>
                                <div class="h-check-in-out border-puple mx-auto">
                                    <div class="p-2 d-flex align-items-center">
                                        <img src="{{asset('assets/images/icons/check-close.png')}}" class="pe-2 pb-1 img-fluid">
                                        {{-- <span class="check-text text--red">check-in-out</span> --}}
                                        <span class="mb-0 fs-14">{{$hotel->check_out}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>

            </div>
        </div>
        <!--end row-->
    </div>
</div>
<!-- End Page-content -->
@endsection

@push('scripts')
    <script>
        $(document).on('click', '#propertyApproveBtn', function () {
            var approveID = $(this).data('id');

            formdata = new FormData();
            formdata.append('id', approveID);

            $.ajax({
                url: "{{route('property.approve')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) {
                    if(response.success) toastMixin.fire({ title: response.success, icon: 'success' });
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                },
            });
        });

        $(document).on('click', '#rejectMessageBtn', function () {
            var hotelID = $('#hotel').val();
            var rejectMessage = $('.reject_reason').val();

            formdata = new FormData();
            formdata.append('id', hotelID);
            formdata.append('reject_reason', rejectMessage);

            $.ajax({
                url: "{{route('property.reject')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) {
                    
                    $('#varyingcontentModal').hide();
                    $('#propertyApproveBtn').show();
                    
                    if(response.success) toastMixin.fire({ title: response.success, icon: 'success' });
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                },
            });
        });
        
    </script>
@endpush