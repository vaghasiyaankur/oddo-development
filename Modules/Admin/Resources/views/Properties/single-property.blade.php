@extends('layout::admin.master')
@section('title','Settings')

@push('css')
<style>
    .page-content .bg-soft-warning .hstack .view-btn {
        height: 2rem;
        width: 5rem;
        background: #0ab39c;
    }

    .page-content .bg-soft-warning .hstack .view-btn a {
        color: #fff !important;
    }

    .page-content .card-body .badge-btn {
        display: inline-block;
        padding: 4px 4px;
        font-weight: 600;
        line-height: 1;
        color: #fff;
        text-align: center;
        border-radius: .25rem;
        background: #0ab39c;
    }

    .page-content .card-body .card-inner {
        box-shadow: 0 2px 11px rgb(56 65 74 / 15%);
    }

    .border-red {
        border: 1px solid #dc4946;
        border-radius: 8px;
    }
    .border-green {
        border: 1px solid #40cc6d;
        border-radius: 8px;
    }
</style>
@endpush

@section('content')
<div class="page-content px-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-n4 mx-n4 mb-n5">
                    <div class="bg-soft-warning">
                        <div class="card-body pb-4 mb-5">
                            <div class="row">
                                <div class="col-md">
                                    <div class="row align-items-center">
                                        <div class="col-md-auto">
                                            <div class="avatar-md mb-md-0 mb-4">
                                                <div class="avatar-title bg-white rounded-circle">
                                                    <img src="{{asset('storage/'.@$hotel->mainPhoto->first()->photos)}}" alt="" class="avatar-sm">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-md">
                                            <h4 class="fw-semibold" id="ticket-title">{{$hotel->property_name}}</h4>
                                            <div class="hstack gap-3 flex-wrap">
                                                <div class="d-flex align-items-center">
                                                    <i class="{{$hotel->star_rating >= 1 ? "ri-star-fill" : "" }}  fs-15 text-warning"></i>
                                                    <i class="{{$hotel->star_rating >= 2 ? "ri-star-fill" : "" }} fs-15 text-warning"></i>
                                                    <i class="{{$hotel->star_rating >= 3 ? "ri-star-fill" : "" }} fs-15 text-warning"></i>
                                                    <i class="{{$hotel->star_rating >= 4 ? "ri-star-fill" : "" }} fs-15 text-warning"></i>
                                                    <i class="{{$hotel->star_rating >= 5 ? "ri-star-fill" : "" }} fs-15 text-warning"></i>
                                                </div>
                                                <div class="vr"></div>
                                                <div class="text-muted">Create Date : <span class="fw-medium " id="create-date">{{ date('d M, Y', strtotime($hotel->created_at)) }}</span></div>
                                                <div class="vr"></div>
                                                <!-- <div class="text-muted">Due Date : <span class="fw-medium" id="due-date">29 Dec, 2021</span></div>
                                                <div class="vr"></div> -->
                                                <button type="button" class="btn  view-btn mt-n1 p-0 favourite-btn active">
                                                    <a href="javascript:;"> gallery</a>
                                                </button>
                                                <!-- <div class="text-muted"><span class="fw-medium" id="due-date">Gallery</span></div> -->
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end col-->
                                <div class="col-md-auto mt-4 ">
                                    <div class="hstack gap-3 flex-wrap">
                                        <!-- <button type="button" class="btn  view-btn mt-n1 p-0 favourite-btn active">
                                            <a href="javascript:;"> view</a>
                                        </button> -->
                                        <button type="button" class="btn view-btn mt-n1 p-0 favourite-btn active">
                                            <a href="javascript:;"> up</a>
                                        </button>
                                        <button type="button" class="btn view-btn  mt-n1 p-0 favourite-btn active" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="Mary">
                                            <a href="javascript:;"> reject</a>
                                        </button>
                                    </div>
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
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text" rows="4"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end  -->
        <div class="row">
            <div class="col-xxl-8">
                <div class="card">
                    <div class="card-body p-4">
                        <h6 class="fw-semibold text-uppercase mb-3">Discripation</h6>

                        <p class="text-muted">{{ $hotel->description }}
                        </p>

                        <h6 class="fw-semibold text-uppercase mb-3">Contact Details</h6>
                        <div class="row">
                            <div class="col-4 mb-3">
                                <div class="card card-inner p-3 mb-0 text-center">
                                    <h3 class="pb-0">Name</h3>
                                    <p class="pb-0 mb-0">9723 256 358 </p>
                                    <p class="pb-0 mb-0">9723 256 358 </p>
                                </div>
                            </div>

                        </div>

                        <h6 class="fw-semibold text-uppercase mb-3">ADDRESS</h6>
                        <p class="text-muted"> {{ $hotel->street_addess }} </p>

                        <h6 class="fw-semibold text-uppercase mb-3">Create an Excellent UI for a Dashboard</h6>
                        <ul class="text-muted vstack gap-2 mb-4">
                            <li>Is parking available for guests?
                                @if ($hotel->parking_available == 'no')    
                                    <a href="javascript:;" class="fs-12">
                                        <i class="ri-close-line badge-btn close-icon bg-danger rounded-pill"></i>
                                    </a> 
                                @else
                                    <a href="javascript:;" class="fs-12">
                                        <i class="ri-check-line close-icon  badge-btn rounded-pill"></i>
                                    </a>
                                    <span class="badge-btn  fs-12 px-2 py-1" id="t-priority">{{$hotel->parking_site}} Site</span>
                                    <span class="badge-btn  fs-12 px-2 py-1" id="t-priority">{{$hotel->parking_type}}</span>
                                @endif
                            </li>
                            <li>Is breakfast available to guests? 
                                @if ($hotel->breakfast == 'no')
                                    <a href="javascript:;" class="fs-12">
                                        <i class="ri-close-line badge-btn close-icon bg-danger rounded-pill"></i>
                                    </a> 
                                @else
                                    <a href="javascript:;" class="fs-12">
                                        <i class="ri-check-line close-icon fs-12 badge-btn rounded-pill"></i>
                                    </a>
                                    @php
                                        $breakfast = $hotel->food_type();
                                    @endphp
                                    @foreach ($breakfast as $item) 
                                        <span class="badge-btn  fs-12 px-2 py-1" id="t-priority">{{$item->food_type}}</span>
                                    @endforeach
                                @endif
                            </li>
                            <li>Languages Spoken
                                @php
                                    $languages = explode(',', $hotel->language);
                                @endphp
                                @foreach ($languages as $language)
                                    <span class="badge-btn  fs-12 px-2 py-1" id="t-priority">{{$language}}</span>
                                @endforeach
                            </li>
                            <li>Can you provide extra bed?
                                @if ($hotel->extra_bed == 'no')
                                    <a href="javascript:;" class="fs-12 bg-danger rounded-pill badge-btn">
                                        <i class="ri-close-line close-icon fs-12 "></i>
                                    </a>
                                @else
                                    <a href="javascript:;" class="fs-12">
                                        <i class="ri-check-line close-icon fs-12 badge-btn rounded-pill"></i>
                                    </a>
                                    <a href="javascript:;" class="fs-12">
                                    <span class="fs-12 badge-btn rounded-pill  px-2 py-1">{{$hotel->number_extra_bed}}</span>
                                    </a>
                                @endif
                                
                            </li>
                        </ul>

                        <h6 class="fw-semibold text-uppercase mb-3">Policies</h6>
                        <ul class="text-muted vstack gap-2 mb-4">
                            <li>How many days in advance can guests cancel free of charge?
                                <!-- <a href="javascript:;" class="rounded-pill fs-12 badge-btn bg-danger rounded-pill">
                                    <i class="ri-close-line close-icon fs-12"></i>
                                </a> -->
                                <a href="javascript:;" class="fs-12 ">
                                    <i class="ri-check-line close-icon fs-12 badge-btn rounded-pill"></i>
                                </a>
                                <span class=" fs-12 badge-btn  px-2 py-1"><span>{{$hotel->cancel_booking}}</span> Day</span>
                            </li>
                            <li>guests will pay 100%
                                <!-- <a href="javascript:;" class="rounded-pill fs-12 badge-btn bg-danger rounded-pill">
                                    <i class="ri-close-line close-icon fs-12"></i>
                                </a> -->
                                <a href="javascript:;" class=" fs-12 ">
                                    <i class="ri-check-line close-icon fs-12 badge-btn rounded-pill"></i>
                                </a>
                                <span class="badge-btn  fs-12 px-2 py-1" id="t-priority">{{ $hotel->pay_type == 'first_hight' ? 'of the first night' : ' of the full stay' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-xxl-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Selected Amenities</h5>
                    </div>
                    <div class="card-body fs-13 ">
                        @foreach ($hotel->amenity() as $amenity)
                            <li><span class="ps-2">{{$amenity->amenities}}</span></li>
                        @endforeach
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Selected Facilities</h5>
                    </div>
                    <div class="card-body fs-13 ">
                        @foreach ($hotel->facilities() as $facilities)
                            <li><span class="ps-2">{{$facilities->facilities_name}}</span></li>
                        @endforeach
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Selected Facilities</h5>
                    </div>
                    <div class="card-body fs-13 ">
                        <div class="row">
                            <div class="col-6">
                                <div class="h-check-in-out border-green mx-auto">
                                    <div class="text-center p-2">
                                        <img src="http://127.0.0.1:8000/assets/images/icons/cal-icon.png" class="pe-2">
                                        <span class="check-text text--green">check-in-time</span>
                                        <p class="mb-0">5:20 am</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="h-check-in-out border-red mx-auto">
                                    <div class="text-center p-2 ">
                                        <img src="http://127.0.0.1:8000/assets/images/icons/check-close.png" class="pe-2">
                                        <span class="check-text text--red">check-in-out</span>
                                        <p class="mb-0">5:20 pm</p>
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
@endpush