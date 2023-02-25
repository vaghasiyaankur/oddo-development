@php 
    $logoFavicon = Modules\Frontend\Http\Controllers\HomeController::logoFavicon();
    $pages = App\Models\Pages::whereStatus('1')->whereLocation('1')->get();
@endphp

<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container position-relative">
            <a class="navbar-brand " href="{{ route('home.index') }}">
                <img class="logoImage" src="{{ $logoFavicon->logo == null ? asset('storage/'.$logoFavicon->default_logo) : asset('storage/'.$logoFavicon->logo) }}" alt="logo">
            </a>
            {{-- <a href="javascript:;" class="notification-button mobile-view-notification">
                <div class="notification-icon">
                    <i class="fa-solid fa-bell"></i>                 
                </div>
                <?php 
                    $hotelCount = 0;
                    if (auth()->check()) {
                        $userId = auth()->user()->id;
                        $hotelCount = App\Models\BookingNotification::where('user_id',$userId)->count();
                    }
                ?> 
                <span
                class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill notificationCount"><span class="data-content">0</span> <span
                    class="visually-hidden">unread messages</span></span>   
                <input type="hidden" class="hotelCount" value="">
                
                @if ($hotelCount > 0)   
                <div class="notification-box" id="mobile-box" style="display: none;">
                </div>
                @else
                <div class="notification-box" id="mobile-box"  style="display: none;">
                    <div class="notification-inner">
                        <div class="notification-heading">Notification</div>  
                        <p class="notification-empty" style="padding:5px;">Notification box is empty.</p>
                    </div>
                </div>
                @endif  
            </a> --}}
            <button class="navbar-toggler responsive_btn" type="button"data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop" style="position: absolute;
            right: 0px; color: #6a78c7;">
                <span class="navbar-toggler-icon d-flex align-items-center justify-content-center"><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
                <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('hotel.index') }}">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('city.index') }}">Destinations we love</a>
                        
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('search.index') }}">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="{{ route('planner.index') }}">Planner
                            <span
                                class="position-absolute top-10 start-lg-100 translate-middle badge rounded-pill bg-primary">25</span>
                        </a>
                    </li> --}}
                    
                    @foreach ($pages as $page)
                        <li class="nav-item">
                            <a class="nav-link position-relative" href="{{ url('/'.$page->slug) }}">{{$page->title}}</a>
                        </li>
                    @endforeach

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('saved.index') }}">Saved</a>
                        </li>
                    @endauth

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
                        
                    </li>
                </ul>
                <a href="javascript:;" class="notification-button">
                    <div class="notification-icon">
                        <i class="fa-solid fa-bell"></i>                   
                    </div>
                    <?php 
                        $hotelCount = 0;
                        if (auth()->check()) {
                            $userId = auth()->user()->id;
                            $hotelCount = App\Models\BookingNotification::where('user_id',$userId)->count();
                        }
                    ?> 
                    <span
                    class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill notificationCount">
                    <span class="data-content">0</span> <span
                        class="visually-hidden">unread messages</span></span>   
                    <input type="hidden" class="hotelCount" value="">
                    
                    @if ($hotelCount > 0)   
                    <div class="notification-box" id="box" style="display: none;">
                    </div>
                    @else
                    <div class="notification-box" id="box"  style="display: none;">
                        <div class="notification-inner">
                            <div class="notification-heading">
                                Notification
                            </div>  
                            <p class="notification-empty" style="padding:5px;">Notification box is empty.</p>
                        </div>
                    </div>
                    @endif  
                </a>
                @php
                    if (auth()->check()) {
                        $authId = auth()->user()->id;
                        $property = App\Models\Hotel::where('user_id', $authId)->count();
                    }
                @endphp

    
                @if (!auth()->check() || $property == 0)
                    @if (!auth()->check())
                        <div class="list-properties pe-3">
                            <a href="javascript:;" class="list-properties-btn btn" data-bs-toggle="modal"
                                data-bs-target="#Log_in_modal">List Your Property</a>
                        </div>
                    @else
                        <div class="list-properties pe-3">
                            <a href="{{ route('property-category') }}" class="list-properties-btn btn">List Your
                                Property</a>
                        </div>
                    @endif
                @else
                    <div class="list-properties pe-3">
                        <a href="{{ route('user.view') }}" class="list-properties-btn btn">My Property</a>
                    </div>
                @endif

                @if (!auth()->check())
                    <div class="list-properties mt-3 mt-lg-0">
                        <button type="button" class="list-properties-btn btn " data-bs-toggle="modal"
                            data-bs-target="#Log_in_modal">
                            {{-- Log In --}}
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </button>
                    </div>
                @endif

                @if (auth()->check() && auth()->user()->type == 'user')
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle dropdown-btn" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-custom py-0" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item {{ Request::routeIs('myaccount.index') ? 'active' : '' }}"
                                    href="{{ route('myaccount.index') }}">My Account</a></li>
                            <li><a class="dropdown-item {{ Request::routeIs('orderhistory.index') ? 'active' : '' }}"
                                    href="{{ route('orderhistory.index') }}">Order History</a></li>
                            <li><a class="dropdown-item {{ Request::routeIs('upcomingtrips.index') ? 'active' : '' }}"
                                    href="{{ route('upcomingtrips.index') }}">Upcoming Trips</a></li>
                            <li><a class="dropdown-item {{ Request::routeIs('logout.index') ? 'active' : '' }}"
                                    href="{{ route('logout.index') }}"><span class="text--red">Logout</span> </a></li>
                        </ul>
                    </div>
                @endif
            </div>
        
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
                <div class="offcanvas-header d-flex align-items-center">
                    <button type="button" class="btn-close text-reset responsive_close_btn" data-bs-dismiss="offcanvas" aria-label="Close"
                        style="position: absolute;right:17px;box-shadow: none;"></button>
                    <a class="navbar-brand" href="{{ route('home.index') }}">
                        <img class="logoImage" src="{{ $logoFavicon->logo == null ? asset('storage/'.$logoFavicon->default_logo) : asset('storage/'.$logoFavicon->logo) }}" alt="logo">
                    </a>
                </div>
                <div class="offcanvas-body position-relative">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('hotel.index') }}">Search </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('city.index') }}">Cities</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('search.index') }}">Search</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link position-relative" href="{{ route('planner.index') }}">Planner
                                <span class="position-absolute top-10 start-lg-100 translate-middle badge rounded-pill bg-primary">25</span>
                            </a>
                        </li>
                        @auth    
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('saved.index') }}">Saved</a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
                        </li>
                    </ul>
                    <div class="listproperty_btn">
                        <div class="listproperty_login">
                            @if (!auth()->check() || $property == 0)
                                @if (!auth()->check())
                                    <div class="list-properties pe-3">
                                        <a href="javascript:;" class="list-properties-btn btn" data-bs-toggle="modal"
                                            data-bs-target="#Log_in_modal">List Your Property</a>
                                    </div>
                                @else
                                    <div class="list-properties pe-3">
                                        <a href="{{ route('property-category') }}" class="list-properties-btn btn">List Your
                                            Property</a>
                                    </div>
                                @endif
                            @endif
                            @if (!auth()->check())
                                <div class="list-properties " data-bs-dismiss="offcanvas" aria-label="Close">
                                    <button type="button" class="w-100 list-properties-btn btn loginDate" data-bs-toggle="modal"
                                        data-bs-target="#Log_in_modal" >
                                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                    </button>
                                </div>
                            @endif
                            @if (auth()->check() && auth()->user()->type == 'user')
                                <div class="list-properties w-100 pe-3">
                                    <a href="{{ route('user.view') }}" class="list-properties-btn btn">My Property</a>
                                </div>
                            @endif
                            @if (auth()->check() && auth()->user()->type == 'user')
                                <div class="dropdown ">
                                    <button class="btn btn-secondary dropdown-toggle dropdown-btn w-100" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-user"></i> 
                                    </button>
                                    <ul class="dropdown-menu dropdown-custom py-0" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item {{ Request::routeIs('myaccount.index') ? 'active' : '' }}"
                                                href="{{ route('myaccount.index') }}">My Account
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item {{ Request::routeIs('orderhistory.index') ? 'active' : '' }}"
                                                href="{{ route('orderhistory.index') }}">Order History
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item {{ Request::routeIs('upcomingtrips.index') ? 'active' : '' }}"
                                                href="{{ route('upcomingtrips.index') }}">Upcoming Trips
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item {{ Request::routeIs('logout.index') ? 'active' : '' }}"
                                                href="{{ route('logout.index') }}"><span class="text--red">Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                        {{-- <div class="listproperty_user">
                          
                        </div> --}}
                    </div>
                </div>
            @php
                if (auth()->check()) {
                    $authId = auth()->user()->id;
                    $property = App\Models\Hotel::where('user_id', $authId)->count();
                }
            @endphp
               
            </div>
        </div>
    </nav>
</header>


@push('script')
<script>
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(document).ready(function(){
        
        // show notification panel
        $(document).on('click','.notification-button',function() {
            var countValue = $('.hotelCount').val();            
            if(countValue != 0){
                show();
            }
            $('.notification-box').toggle();
        });

        window.addEventListener('mouseup',function(event){
            var pol = document.getElementById('box');
            if(event.target != pol && event.target.parentNode != pol){
                    pol.style.display = 'none';
                }
        }); 
        window.addEventListener('mouseup',function(event){
            var pol = document.getElementById('mobile-box');
            if(event.target != pol && event.target.parentNode != pol){
                    pol.style.display = 'none';
                }
        }); 


        $(document).on('click','.notification-close-btn', function(){
            $('.notification-button').removeProp('display','none');
            $('.notification-box').removeProp('display','none');
            var hotel_id = $(this).data('id');

            formdata = new FormData();
            formdata.append('hotel_id', hotel_id);

            $.ajax({
                url: "{{route('booking.delete')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) {
                    show();
                    notificationCount();  
                },
            });
        });
        
        var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
        if (loggedIn){
            notificationCount();
            setInterval(notificationCount,5000);
            show();  
        }

        function show() {
            $.ajax({
                url: "{{route('bookingNotification.show')}}",
                type: 'post',
                dataType: "HTML",
                processData: false,
                contentType: false,
                success: function(response){
                    $('.notification-box').html(response);
                }
            });
        }


        // count notifiation
        function notificationCount(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('booking.notification')}}",
                type: 'post',
                processData: false,
                contentType: false,
                success: function(response){
                    var count = $('.data-content').html(response.hotelCount);
                    $('.hotelCount').val(response.hotelCount);
                }
            });
        }        
    });
    
    $(document).ready(function(){
        // $(document).on('click', '.responsive_btn', function(){
        //     $(this).addClass('d-none');
        // });

        // $(document).on('click', '.responsive_close_btn', function(){
        //     $('.responsive_btn').removeClass('d-none');
        // });

        // $(document).on("click", function(event) {
        //     var $trigger = $(".offcanvas-start");
        //     if ($trigger !== event.target && !$trigger.has(event.target).length) {
        //         $(".offcanvas-start").toggleClass("show");
        //     }
        // });
        
    });
</script>
@endpush
