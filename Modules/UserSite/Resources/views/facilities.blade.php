@extends('user_site.layout.master')

@section('title')
Facilities
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
                    <main class="facilities">
                        <div class="pannel-heading">
                            <h2 class=" purple-dark pannel-title">Facilities & Services</h2>
                            <h5 class="heading-fs-16 purple-dark">Now let us know some general details about your
                                property like facilities available,internet,parking and languages you speak.</h5>
                        </div>
                        <div class="form-info-box">
                            <form action="" class="form-parking">
                                <div class="p-form-heading  d-flex">
                                    <h5>Parking</h5>
                                    <i class="fa-solid fa-circle-exclamation ps-2 mt-1" data-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="This information is especially important for those traveling to your property by car."></i>
                                </div>
                                <div class="f-parking-title">
                                    <label for="" class="form-label label-heading">Is parking available for
                                        guests?</label>
                                </div>
                                <div class="p-form-select d-flex justify-content-between">
                                    <select class="form-select w-50 me-3 parking-avaliable">
                                        <option value="no" selected>No</option>
                                        <option value="paid">yes, paid</option>
                                        <option value="free">yes, free</option>
                                    </select>
                                    <select class="form-select input-w-20 me-3 d-none parking-type">
                                        <option selected>Private</option>
                                        <option value="private">Private</option>
                                        <option value="personal">persnoal</option>
                                    </select>
                                    <select class="form-select input-w-20 d-none parking-site">
                                        <option selected>Onsite</option>
                                        <option value="onsite">Onsite</option>
                                        <option value="double">no,paid</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="form-info-box mt-3">
                            <form action="" class="form-breakfast">
                                <div class="p-form-heading  d-flex">
                                    <h5>Breakfast</h5>
                                </div>
                                <div class="f-parking-title">
                                    <label for="" class="form-label label-heading">Is breakfast available to
                                        guests?</label>
                                </div>
                                <div class="p-form-select d-flex">
                                    <select class="form-select w-50 me-3">
                                        <option selected>yes, it's included in the price</option>
                                        <option value="single">yes,free</option>
                                        <option value="double">no,paid</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="form-info-box mt-3">
                            <form action="" class="form-breakfast">
                                <div class="p-form-heading d-flex">
                                    <h5>Languages Spoken</h5>
                                    <i class="fa-solid fa-circle-exclamation ps-2 mt-1" data-toggle="tooltip"
                                        data-bs-placement="top" title="What languages do you or your staff speak?"></i>
                                </div>
                                <div id="add_languages">
                                    <div class="p-form-select d-flex mb-3">
                                        <select class="form-select w-25 me-3">
                                            <option selected>English</option>
                                            <option value="">Hindi</option>
                                            <option value="">Russian</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <div class="pannel-add-another py-3" >
                                <a href="javascript:;" class="para-fs-14"  id="p_add_lan"><i class="fa-solid fa-circle-plus purple"></i> <span class="purple">Add another languages</span></a>
                            </div>
                        </div>
                        <div class="form-info-box mt-3">
                            <form action="" class="form-facility-part">
                                <div class="p-form-heading d-flex">
                                    <h5>Facilities That Are Popular With Guests</h5>
                                    <i class="fa-solid fa-circle-exclamation ps-2 mt-1" data-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Guests look for these facilities the most when they are searching for properties."></i>
                                </div>
                                <div class="facilities-list pt-4">      
                                    <div class="facilities-check d-flex flex-wrap align-items-center justify-content-between">
                                        @foreach ($facilities as $facilitate)
                                            <div class="form-check py-3 border--dotted">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <label class="form-check-label para-fs-14 fs-6">
                                                {{$facilitate->facilities_name}}
                                                </label>
                                            </div>
                                        @endforeach     
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

    .form-check{
        flex: 0 0 48%;
        max-width: 48%;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();

        $('.parking-avaliable').on('change', function(){
            var parking = $('.parking-avaliable :selected').val();
            if(parking == 'no') {
                $('.parking-site').addClass('d-none');
                $('.parking-type').addClass('d-none');;
            }

            if(parking == 'paid') {
                $('.parking-site').removeClass('d-none');
                $('.parking-type').removeClass('d-none');
            }

            if(parking == 'free') {
                $('.parking-site').removeClass('d-none');
                $('.parking-type').removeClass('d-none');
            }

        });

        $("#p_add_lan").bind("click", function () {
            var div = $("<div />");
            div.html(GetDynamicTextBox(""));
            $("#add_languages").append(div);
        });

        $("body").on("click", ".remove", function () {
            $(this).closest("div").remove();
        });

        function GetDynamicTextBox(value) {
            return '<div class="p-form-select d-flex mb-3 align-items-center">' +
                        '<select class="form-select w-25 me-3">' +
                            '<option selected>English</option>' +
                            '<option value="">Hindi</option>' +
                            '<option value="">Russian</option>' +
                        '</select>' + '<i class="fa-solid fa-xmark text--red ps-3 "></i>' + '<input type="button"  value="Remove" class="remove bedoption-remove-btn ps-2 text--red" />'
                    '</div>'
        }
        
    });
</script>
@endpush