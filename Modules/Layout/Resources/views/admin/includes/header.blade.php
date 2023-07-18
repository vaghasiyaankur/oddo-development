@php $logoFavicon = Modules\Admin\Http\Controllers\AdminController::logoFavicon() @endphp
<div class="overlay">
    <div class="overlayDoor"></div>
    <div class="overlayContent">
        <div class="loader">
            <div class="inner"></div>
        </div>
    </div>
</div>
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex align-items-center">
            <!-- LOGO -->
            <div class="navbar-brand-box horizontal-logo">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img
                            src="{{ $logoFavicon->logo == null ? asset('storage/' . $logoFavicon->default_logo) : asset('storage/' . $logoFavicon->logo) }}" height="50" width="124" alt="logo">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ $logoFavicon->logo == null ? asset('storage/' . $logoFavicon->default_logo) : asset('storage/' . $logoFavicon->logo) }}"
                            height="50" width="124" alt="logo">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                id="topnav-hamburger-icon">
                <span class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>

            <!-- Back Button Pos Link-->
            {{-- <div class="navbar-header-links fs-4">
                <button type="button" class="btn btn-success px-3 px-sm-4 fs-5"
                    onclick="javascript:window.history.back();">
                    <i class="fa fa-angle-double-left me-2" aria-hidden="true"></i>
                    Back</button>
            </div> --}}
        </div>

        <div class="d-flex align-items-center">
            <div class="navbar-header-links fs-4">
                <a type="button" class="btn btn-success px-3 px-sm-3 fs-5"
                    href="{{route('home.index')}}">
                    <i class="fa fa-eye me-2" aria-hidden="true"></i>
                    View Site</a>
            </div>
            <div class="dropdown d-none topbar-head-dropdown header-item">
                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                    id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-search fs-22"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown topbar-head-dropdown ms-1 header-item position-relative headerDiv">
                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle btnNotificaion"
                    id="page-header-notifications-dropdown">
                    <i class="bx bx-bell fs-22"></i>
                    <span
                        class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger notificationCount">0<span
                            class="visually-hidden">unread messages</span></span>
                </button>
                <input type="hidden" class="hotelCount" value="">
                <div class="notificationMainDiv">
                    @if (isset($hotels))
                        @include('layout::admin.includes.notification')
                    @endif
                </div>
            </div>

            <!-- noti end  -->

            <div class="dropdown ms-sm-3 header-item topbar-user">
                <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center">
                        <img class="rounded-circle header-profile-user"
                            src="{{ asset('assets/Admin/assets/images/users/avatar-1.jpg') }}" alt="Header Avatar" >
                        <span class="text-start ms-xl-2">
                            <span
                                class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ auth()->user()->name }}</span>
                            <span
                                class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ auth()->user()->email }}</span>
                        </span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end" style="">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('profile') }}"><i
                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">My Profile</span></a>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"><i
                            class="fa fa-sign-out text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">Log out</span></a>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="preloader" class="preloader off updateLoader">
    <div class="black_wall"></div>
    <div class="loader"></div>
</div>

<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu" style="z-index: 112;">
    {{-- <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/Admin/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/Admin/assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/Admin/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/Admin/assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div> --}}

    @include('layout::admin.includes.nav-bar')
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

@push('scripts')
<script>
    var baseUrl = $('#base_url').val();

    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        

        // show notification panel
        $(document).on('click', '.btnNotificaion', function() {
            var countValue = $('.hotelCount').val();

            if(countValue != 0){
                show();
            }
        });

        function show() {
            $.ajax({
                url: "{{route('notification.show')}}",
                type: 'post',
                dataType: "HTML",
                processData: false,
                contentType: false,
                success: function(response){
                    $('.notificationMainDiv').html(response);
                    $('.notifactionDiv').addClass('show');
                }
            });
        }

        // delete Notification
        $(document).on('click', '.deleteNotification', function(){
            var hotel_id = $(this).data('id');

            formdata = new FormData();
            formdata.append('hotel_id', hotel_id);

            $.ajax({
                url: "{{route('notification.delete')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) {
                    show();
                },
            });
        });

        notificationCount();
        setInterval(notificationCount,5000);

        // count notifiation
        function notificationCount(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('property.notification')}}",
                type: 'post',
                processData: false,
                contentType: false,
                success: function(response){
                    var count = $('.notificationCount').html(response.hotelCount);
                    $('.hotelCount').val(response.hotelCount);
                }
            });
        }
    });
</script>
@endpush
