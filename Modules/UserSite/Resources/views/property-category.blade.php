@extends('user_site.layout.master')

@section('title')
    Property-Category
@endsection

@section('content')
     <!------ list-properties nav start------->
    <section class="l-p-navbar">
        <div class="container">
                {{-- <div class="l-p-nav-list d-flex">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active rounded-pill" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Properties</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Balnace</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Balnace</button>
                        </li>
                    </ul>
                </div> --}}
        </div>
    </section>
    <!------ list-properties nav end------->
    <!------- list properties content start------->
    <section class="l-p-myproperties pb-5">
        <div class="container">
            <div class="myproperties-heading">
                <h4>List Your Property and start welcoming guests in no time!</h4>
                <h5 class="heading-fs-16 d-l-Purple" >To get started, select the type of property you want to list</h5>
            </div>
            <div class="l-p-myproperties-card">
                <div class="d-flex flex-wrap">
                @foreach($propertys as $no => $property)
                    @if($no <= 5)
                    <div class="border-right property-type">
                        <div class="l-mypro-card text-center">
                            <div class="l-mypro-card-logo">
                                <img src="../assets/images/icons/house.png">
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

            @if($propertys->count() > 5)
            <div class="l-p-myproperties-card mt-3">
                <div class="row">
                 @foreach($propertys as $no => $property)
                    @if($no > 5)
                    <div class="col-lg-2 col-md-4 col-sm-6 col-12 border-right ">
                        <div class="l-mypro-card text-center">
                            <div class="l-mypro-card-logo">
                                <img src="../assets/images/icons/house.png">
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
@endpush

@push('scripts')
<!------- Custom JS Link -----  -->
<script src="{{asset('assets/js/custom.js')}}"></script>

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