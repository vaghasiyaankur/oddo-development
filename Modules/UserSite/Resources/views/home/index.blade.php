@extends('layout::user.UserSite.master')

@section('title')
Add-Layout
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('user/asset/css/user-style.css')}}">
@endpush

@section('content')
<section class="account-content">
    <div class="container">
        <div class="row py-4">
            @include('usersite::user.sidebar.sidebar')
            <div class="col-lg-10 col-md-10 col-12 right-side-content">
                <div id="tabs">
                    <div class="col-xs-12 hotelProperty">
                        @include('usersite::home.property')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('scripts')
<!------- loading icon link -------->
<script src="{{ asset('assets/Admin/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>

<script>
$(document).ready(function(){
    var baseUrl = $('#base_url').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.propertyDelete', function(){
        let id = $(this).data('value');
         
        formdata = new FormData();
        formdata.append('id', id);

        $.ajax({
            url: baseUrl + "/user/propertyDelete/" + id,
            type: "POST",
            processData: false,
            contentType: false,
            success: function (response) { 
                console.log(response);
                propertyList();
            },
        }); 

    });

    function propertyList(){
        $.ajax({
            url: "{{route('property.List')}}",
            type: "GET",
            dataType: "HTML",
            success: function (response) {
                $(".hotelProperty").html(response); 
            }
        });
    }
});
</script>
@endpush