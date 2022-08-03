<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">Odda</a>
            <button class="navbar-toggler responsive_btn" type="button"data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop" style="position: absolute;
            right: 26px;top: 34px;">
                <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
                <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('hotel.index') }}">Hotels </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('city.index') }}">Cities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('search.index') }}">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="{{ route('planner.index') }}">Planner
                            <span
                                class="position-absolute top-10 start-lg-100 translate-middle badge rounded-pill bg-primary">25</span>
                        </a>
                    </li>
                    @auth
                        <li class="nav-item ps-lg-3">
                            <a class="nav-link" href="{{ route('saved.index') }}">Saved</a>
                        </li>
                    @endauth
                </ul>

                @php
                    if (auth()->check()) {
                        $authId = auth()->user()->id;
                        $property = App\Models\Hotel::where('user_id', $authId)->count();
                    }
                @endphp

                @if (!auth()->check() || $property == 0)
                    @if (!auth()->check())
                        <div class="list-properties pe-5">
                            <a href="javascript:;" class="list-properties-btn btn" data-bs-toggle="modal"
                                data-bs-target="#Log_in_modal">List Your Property</a>
                        </div>
                    @else
                        <div class="list-properties pe-5">
                            <a href="{{ route('property-category') }}" class="list-properties-btn btn">List Your
                                Property</a>
                        </div>
                    @endif
                @else
                    <div class="list-properties pe-5">
                        <a href="{{ route('user.view') }}" class="list-properties-btn btn">My Property</a>
                    </div>
                @endif

                @if (!auth()->check())
                    <div class="list-properties pe-3 mt-3 mt-lg-0">
                        <button type="button" class="list-properties-btn btn " data-bs-toggle="modal"
                            data-bs-target="#Log_in_modal">
                            Login
                        </button>
                    </div>
                @endif

                @if (auth()->check() && auth()->user()->type == 'user')
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle dropdown-btn" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, {{ auth()->user()->name }}
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
        
        <div class="offcanvas offcanvas-start pb-4" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel" style="overflow:auto;top:4px;">
            <div class="d-flex align-items-center py-4 mb-3" style="background: #EEF1F7;">
                <button type="button" class="btn-close text-reset responsive_close_btn" data-bs-dismiss="offcanvas" aria-label="Close"
                    style="position: absolute;right:17px;top: 32px;box-shadow: none;"></button>
                <a class="navbar-brand ps-3" href="{{ route('home.index') }}">Odda</a>
            </div>
            <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('hotel.index') }}">Hotels </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('city.index') }}">Cities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('search.index') }}">Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link position-relative" href="{{ route('planner.index') }}">Planner
                        <span class="position-absolute top-10 start-lg-100 translate-middle badge rounded-pill bg-primary">25</span>
                    </a>
                </li>
                @auth    
                    <li class="nav-item ps-lg-3">
                        <a class="nav-link" href="{{ route('saved.index') }}">Saved</a>
                    </li>
                @endauth
            </ul>

            @php
                if (auth()->check()) {
                    $authId = auth()->user()->id;
                    $property = App\Models\Hotel::where('user_id', $authId)->count();
                }
            @endphp

            @if (!auth()->check() || $property == 0)
                @if (!auth()->check())
                    <div class="list-properties pe-lg-5 mx-auto w-100 px-2">
                        <a href="javascript:;" class="w-100 btn" data-bs-toggle="modal"
                            data-bs-target="#Log_in_modal">List Your Property</a>
                    </div>
                @else
                    <div class="list-properties pe-lg-5 mx-auto">
                        <a href="{{ route('property-category') }}" class="btn">List Your
                            Property</a>
                    </div>
                @endif
            @else
                <div class="list-properties pe-lg-5 mx-auto">
                    <a href="{{ route('user.view') }}" class="btn">My Property</a>
                </div>
            @endif

            @if (!auth()->check())
                <div class="list-properties pe-lg-3 mt-3 mt-lg-0 w-100 mt-auto px-2" data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="w-100 list-properties-btn btn loginDate" data-bs-toggle="modal"
                        data-bs-target="#Log_in_modal" >Login</button>
                </div>
            @endif

            @if (auth()->check() && auth()->user()->type == 'user')
                <div class="w-100 dropdown pe-lg-3 mt-auto mt-lg-0 px-2 mx-auto">
                    <button class="d-flex align-items-center justify-content-center w-100 btn btn-secondary dropdown-toggle dropdown-btn" type="button"
                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Hi, {{ auth()->user()->name }}
                    </button>
                    <ul class="w-100 dropdown-menu dropdown-custom py-0" aria-labelledby="dropdownMenuButton1">
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
        </div>
    </nav>
</header>

@push('script')
<script>
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
