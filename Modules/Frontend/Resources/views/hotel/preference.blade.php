@php
if (auth()->check()) {
$authId = auth()->user()->id;
$preferenceId = App\Models\Preference::whereUser_id($authId)->pluck('UUID')->first();
}
@endphp
<!--------- MyPreferences popup start---------->
<div class="modal fade mypreferences-popup" id="myPreferences" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body py-sm-5">
                <div class="hotels-result-sort hotel-sort-popup" id="preferences-scroll">
                    <div class="hotel-sort-popup-heading justify-content-between d-flex">
                        <h4>My Preferences</h4>
                        <div class="modal-header justify-content-end p-0">
                            <button type="button" data-bs-dismiss="modal" class="modal-close" aria-label="Close"><i
                                    class="fa-solid fa-xmark text-secondary fs-3"></i></button>
                        </div>
                    </div>
                    <h5 class="search-heading pt-3">Sort By</h5>
                    <div class="hotel-result-sort-popup d-sm-flex">
                        <input type="hidden" class="preferenceId" value="{{@$preferenceId}}">
                        <input type="hidden" value="{{ URL::to('') }}" id="base_url">
                        <div class="form-check pe-4">
                            <label class="form-check-label" for="PriceLowToHigh">
                                <input class="form-check-input sortBy_pre" type="checkbox" value="low_to_high"
                                    id="PriceLowToHigh">
                                Price: low to high
                            </label>
                        </div>
                        <div class="form-check pe-4">
                            <label class="form-check-label" for="priceHigh">
                                <input class="form-check-input sortBy_pre" type="checkbox" value="high_to_low"
                                    id="priceHigh">
                                Price: high to low
                            </label>
                        </div>
                        {{-- @dd(request()->top_review) --}}
                        <div class="form-check pe-4">
                            <label class="form-check-label" for="TopReview">
                                <input class="form-check-input sortBy_pre" type="checkbox" value="top_review"
                                    id="TopReview">
                                Top Review
                            </label>
                        </div>
                    </div>
                    <div class="hotels-filter ">
                        {{-- <div class="hotels-result-top-filter">
                            <div class="small-heading mt-3">
                                <h6>Top filters </h6>
                            </div>
                            <div class="hotels-top-filter-popup ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <label class="form-check-label " for="finalPriceWithTaxes">
                                                <input class="form-check-input topFilter" type="checkbox"
                                                    value="final_price_with_taxes_fees" id="finalPriceWithTaxes">
                                                Final price with taxes +
                                                fees
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <label class="form-check-label" for="breakFastIn">
                                                <input class="form-check-input topFilter" type="checkbox"
                                                    value="breakfast_included" id="breakFastIn">
                                                Breakfast Included
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <label class="form-check-label" for="flexibleCheckIn">
                                                <input class="form-check-input topFilter" type="checkbox"
                                                    value="flexible_check_in" id="flexibleCheckIn">
                                                Flexible Check-In
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <label class="form-check-label" for="flexibleCheckOut">
                                                <input class="form-check-input topFilter" type="checkbox"
                                                    value="flexible_check_out" id="flexibleCheckOut">
                                                Flexible Check-Out
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="hotels-result-style">
                            <div class="small-heading mt-3">
                                <h6>Style </h6>
                            </div>
                            <div class="hotels-result-style-popup d-sm-flex">
                                <div class="form-check pe-3">
                                    <label class="form-check-label" for="Modern">
                                        <input class="form-check-input style" type="checkbox" value="modern"
                                            id="Modern">
                                        Modern
                                    </label>
                                </div>
                                <div class="form-check pe-3">
                                    <label class="form-check-label" for="Histotic">
                                        <input class="form-check-input style" type="checkbox" value="historic"
                                            id="Histotic">
                                        Historic
                                    </label>
                                </div>
                                <div class="form-check pe-3">
                                    <label class="form-check-label" for="Contemporary">
                                        <input class="form-check-input style" type="checkbox" value="contemporary"
                                            id="Contemporary">
                                        Contemporary
                                    </label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="hotels-result-budget">
                            <div class="small-heading">
                                <h6>Budget </h6>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-md-3 col-5">
                                    <input type="number" class="form-control budgetMinimum" placeholder="$ Min"
                                        value="{{request()->budgetMinimum}}">
                                </div>
                                <div class="col-md-1 col-2 p-0 text-center">
                                    <span class="form-text">to</span>
                                </div>
                                <div class="col-md-3 col-5">
                                    <input type="number" class="form-control budgetMaximum" placeholder="$ Max"
                                        value="{{request()->budgetMaximum}}">
                                </div>
                            </div>
                        </div>
                        <div class="hotels-result-property">
                            <div class="small-heading">
                                <h6>Property Class </h6>
                            </div>
                            <div class="hotels-result-propertys d-sm-flex">
                                <div class="form-check pe-4">
                                    <input class="form-check-input propertyClass" type="checkbox" value="5" id="5star">
                                    <label for="5star" class="property-class-icon propertyStar"><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                    <label for="5star" class="property-class-icon propertyStar"><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                    <label for="5star" class="property-class-icon  propertyStar"><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                    <label for="5star" class="property-class-icon  propertyStar"><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                    <label for="5star" class="property-class-icon  propertyStar"><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                </div>
                                <div class="form-check pe-4">
                                    <input class="form-check-input propertyClass" type="checkbox" value="4" id="4star">
                                    <label for="4star" class="property-class-icon"><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                    <label class="property-class-icon "><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                    <label for="4star" class="property-class-icon "><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                    <label for="4star" class="property-class-icon "><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                </div>
                                <div class="form-check pe-4">
                                    <input class="form-check-input propertyClass" type="checkbox" value="3" id="3star">
                                    <label for="3star" class="property-class-icon"><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                    <label for="3star" class="property-class-icon "><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                    <label for="3star" class="property-class-icon "><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                </div>
                                <div class="form-check pe-4">
                                    <input class="form-check-input propertyClass" type="checkbox" value="2" id="2star">
                                    <label for="2star" class="property-class-icon"><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                    <label for="2star" class="property-class-icon "><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                </div>
                                <div class="form-check pe-4">
                                    <input class="form-check-input propertyClass" type="checkbox" value="1" id="1star">
                                    <label for="1star" class="property-class-icon"><img
                                            src="{{ asset('assets/images/icons/start.png') }}" width="12"
                                            height="12"></label>
                                </div>
                            </div>
                        </div>
                        <div class="hotels-results-amenities">
                            <div class="small-heading">
                                <h6>Amenities </h6>
                            </div>
                            <div class="hotels-results-amenities-popup d-sm-flex">
                                <div class="amenitylabel form-check pe-md-4 pe-3">
                                    <label class="form-check-label" for="AmenitiesAll">
                                        <input class="form-check-input Amenitiesall" type="checkbox" value="all"
                                            id="AmenitiesAll">
                                        All Amenities
                                    </label>
                                </div>
                                @foreach ($amenities as $amenity)
                                <div class="amenitylabel form-check pe-md-4 pe-3 ">
                                    <input class="form-check-input amenities" type="checkbox" value="{{$amenity->slug}}"
                                        name="amenities" id="AmenityCheck_{{$amenity->id}}">
                                    <label class="form-check-label" for="AmenityCheck_{{$amenity->id}}">{{ Str::limit(@$amenity->amenities, 15) }}</label>
                                    {{-- <i class="{{ @$amenity->icon }} amenityIcon"></i> --}}
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @php $auth = auth()->user(); @endphp
                    <div class="preference-popup-save-btn text-center mt-3">
                        <a href="javascript:;" class="preference-popup-btn btn bg-purple savePreference">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--------- MyPreferences popup end---------->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#AmenitiesAll').on('click',function(){
            if(this.checked){
                $('.amenities').each(function(){
                    this.checked = true;
                });
            }else{
                $('.amenities').each(function(){
                    this.checked = false;
                });
            }
        });
        
        $('.amenities').on('click',function(){
            if($('.amenities:checked').length == $('.amenities').length){
                $('#AmenitiesAll').prop('checked',true);
            }else{
                $('#AmenitiesAll').prop('checked',false);
            }
        });

        if($('.amenities:checked').length == $('.amenities').length){
            $('#AmenitiesAll').prop('checked',true);
        }
    });
    
    $(document).on('click','.savePreference',function(){
        savePreferences();
        // this is class index page
        // $('.myPreference').trigger('click');
    });

    $('.sortBy_pre').on('change',function(){
        $('.sortBy_pre').not(this).prop('checked', false);  
    });

    function savePreferences(){
        var baseUrl = $('#base_url').val();

        var sort_by = $(".sortBy_pre:checked").map(function(){return $(this).val();}).get();
        // var top_filter = $(".topFilter:checked").map(function(){return $(this).val();}).get();
        var property_class = $(".propertyClass:checked").map(function(){return $(this).val();}).get();
        var amenities = $(".amenities:checked").map(function(){return $(this).val();}).get();
        var budgetMinimum = $('.budgetMinimum').val();
        var budgetMaximum = $('.budgetMaximum').val();
        var preferenceId = $('.preferenceId').val();

        let sort_val = sort_by.toString();
        // let filter = top_filter.toString();
        let propertyclass = property_class.toString();
        let amenity = amenities.toString();
        let budgetmin = budgetMinimum.toString();
        let budgetmax = budgetMaximum.toString();

        var value = [
            {sort_val :sort_val, propertyclass : propertyclass, amenity : amenity, budgetmin : budgetmin, budgetmax : budgetmax},
                ];
                
        var val = JSON.stringify(value);
                
        $.cookie("preference", val);
        var get = $.cookie("preference");
        var empArr = $.parseJSON(get);

        // console.log(value);
        formdata = new FormData();
        formdata.append('sort_by', sort_by);
        // formdata.append('top_filter', top_filter);
        formdata.append('property_class', property_class);
        formdata.append('amenities', amenities);
        formdata.append('budgetMinimum', budgetMinimum);
        formdata.append('budgetMaximum', budgetMaximum);
        formdata.append('preferenceId', preferenceId);

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "{{route('add.preference')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (res) {
                $('.mypreferences-popup').modal('hide');
            },
        });
    }


    $(document).ready(function(){
        
        var get = $.cookie("preference");
        var empArr = $.parseJSON(get);

        var sort_value = (empArr[0]['sort_val']);
        sort_arr = sort_value.split(','); 
        $(sort_arr).each(function(val, value) {
            $('.sortBy_pre[value="' + value + '"]').prop('checked', 'checked');
        });
    
        // var filter_value = (empArr[0]['filter']);
        // filter_arr = filter_value.split(',');
        // $(filter_arr).each(function(val, value) {
        //     $('.topFilter[value="' + value + '"]').prop('checked', 'checked');
        // });

        var class_value = (empArr[0]['propertyclass']);
        class_arr = class_value.split(',');
        $(class_arr).each(function(val, value) {
            $('.propertyClass[value="' + value + '"]').prop('checked', 'checked');
        });
        
        var amenity_value = (empArr[0]['amenity']);
        amenity_arr = amenity_value.split(',');
        $(amenity_arr).each(function(val, value) {
            $('.amenities[value="' + value + '"]').prop('checked', 'checked');
        });

       $('.budgetMinimum').val(empArr[0]['budgetmin']);
       $('.budgetMaximum').val(empArr[0]['budgetmax']);
    });

</script>

@if (auth()->check())    
<script>
    $(document).ready(function() {
        savePreferences();
    });
</script>
@endif