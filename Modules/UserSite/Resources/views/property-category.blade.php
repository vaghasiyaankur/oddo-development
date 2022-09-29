@extends('layout::user.UserSite.master')

@section('title')
    Property-Category
@endsection

@section('content')
    <!------- list properties content start------->
    <section class="l-p-myproperties py-5 d-flex align-items-center">
        <div class="container">
            <div class="myproperties-heading">
                <h4>List Your Property and start welcoming guests in no time!</h4>
                <h5 class="heading-fs-16 d-l-Purple" >To get started, select the type of property you want to list</h5>
            </div>
            <div class="l-p-myproperties-card">
                <div class="d-flex flex-wrap">
                @foreach($properties as $no => $property)
                    @if($no <= 5)
                    <div class="border-right property-type">
                        <div class="l-mypro-card text-center">
                            <div class="l-mypro-card-logo">
                                <img src="{{asset('assets/images/icons/house.png')}}">
                            </div>
                            <div class="l-mypro-card-heading">
                                <h5 class="l-mypro-card-head fw-bold pt-3">{{$property->type}}</h5>
                            </div>
                            <div class="l-mypro-card-content">
                                <p class="m-0">{{$property->description}}</p>
                            </div>
                            <div class="l-mypro-card-btn">
                                <a href="javascript:;" class="btn card-btn button-property" data-property='{{$property->id}}'>List your Properties</a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                </div>
            </div>  

            @if($properties->count() > 5)
            <div class="l-p-myproperties-card mt-3">
                <div class="row">
                 @foreach($properties as $no => $property)
                    @if($no > 5)
                    <div class="col-lg-2 col-md-4 col-sm-6 col-12 border-right ">
                        <div class="l-mypro-card text-center">
                            <div class="l-mypro-card-logo">
                                <img src="{{ asset('assets/images/icons/house.png') }}">
                            </div>
                            <div class="l-mypro-card-heading">
                                <h5 class="l-mypro-card-head fw-bold pt-3">{{$property->type}}</h5>
                            </div>
                            <div class="l-mypro-card-content">
                                <p class="m-0">{{$property->description}}</p>
                            </div>
                            <div class="l-mypro-card-btn">
                                <a href="javascript:;" class="btn card-btn">List your Properties</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>  
            @endif

        </div>
    </section>
   <!-------- list properties content end -------->
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('Adminpannel design/css/pannel.css')}}">
    <style>
        section.l-p-myproperties {
        min-height: calc(100vh - 361px);
    }
    </style>
@endpush

@push('scripts')
<!------- Custom JS Link -----  -->
{{-- <script src="{{asset('assets/js/custom.js')}}"></script> --}}

<script>
    $(document).ready(function(){
        $(document).on('click', '.button-property', function(){
            var property = $(this).attr('data-property');
            formdata = new FormData();

            formdata.append('property', property);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: "{{route('add-property')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (res) {
                    if (res.redirect_url) {
                        window.location = res.redirect_url;
                    }
                },
            }); 
        });

        
    });
</script>
@endpush