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
                            src="{{ $logoFavicon->logo == null ? asset('storage/' . $logoFavicon->default_logo) : asset('storage/' . $logoFavicon->logo) }}">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ $logoFavicon->logo == null ? asset('storage/' . $logoFavicon->default_logo) : asset('storage/' . $logoFavicon->logo) }}"
                            height="50">
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
            <div class="navbar-header-links fs-4">
                <button type="button" class="btn btn-success px-3 px-sm-4 fs-5"
                    onclick="javascript:window.history.back();">
                    <i class="fa fa-angle-double-left me-2" aria-hidden="true"></i>
                    Back</button>
            </div>
        </div>

        <div class="d-flex align-items-center">

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
                        class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">3<span
                            class="visually-hidden">unread messages</span></span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end notifactionDiv p-0">
                    <div class="dropdown-head bg-primary bg-pattern rounded-top">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                </div>
                                <div class="col-auto dropdown-tabs">
                                    <span class="badge badge-soft-light fs-13"> 4 New</span>
                                </div>
                            </div>
                        </div>
                        <div class="px-2 mt-2 mb-0">
                            <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                                id="notificationItemsTab" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab">
                                        All (4)
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#messages-tab" role="tab">
                                        Messages
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#alerts-tab" role="tab">
                                        Alerts
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="notificationItemsTabContent">
                        <div class="tab-pane fade py-2 ps-2 active show" id="all-noti-tab" role="tabpanel">
                            <div data-simplebar="init" style="max-height: 300px;" class="pe-2">
                                <div class="simplebar-wrapper" style="margin: 0px -8px 0px 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                aria-label="scrollable content"
                                                style="height: auto; overflow: hidden scroll;">
                                                <div class="simplebar-content" style="padding: 0px 8px 0px 0px;">
                                                    <div
                                                        class="text-reset notification-item d-block dropdown-item position-relative">
                                                        <div class="d-flex">
                                                            <div class="avatar-xs me-3">
                                                                <span
                                                                    class="avatar-title bg-soft-info text-info rounded-circle fs-16">
                                                                    <i class="bx bx-badge-check"></i>
                                                                </span>
                                                            </div>
                                                            <div class="flex-1">
                                                                <a href="#!" class="stretched-link">
                                                                    <h6 class="mt-0 mb-2 lh-base">Your <b>Elite</b>
                                                                        author Graphic
                                                                        Optimization <span
                                                                            class="text-secondary">reward</span> is
                                                                        ready!
                                                                    </h6>
                                                                </a>
                                                                <p
                                                                    class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                    <span><i class="mdi mdi-clock-outline"></i> Just 30
                                                                        sec ago</span>
                                                                </p>
                                                            </div>
                                                            <div class=" fs-15">
                                                                <a href="javascript;;"
                                                                    class="btn btn-primary py-1 px-2"> View</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="text-reset notification-item d-block dropdown-item position-relative active">
                                                        <div class="d-flex">
                                                            <img src="{{ asset('assets\images\h-details-4.png') }}"
                                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                            <div class="flex-1">
                                                                <a href="#!" class="stretched-link">
                                                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela
                                                                        Bernier</h6>
                                                                </a>
                                                                <div class="fs-13 text-muted">
                                                                    <p class="mb-1">Answered to your comment on the
                                                                        cash flow forecast's
                                                                        graph 🔔.</p>
                                                                </div>
                                                                <p
                                                                    class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                    <span><i class="mdi mdi-clock-outline"></i> 48 min
                                                                        ago</span>
                                                                </p>
                                                            </div>
                                                            <div class="fs-15">
                                                                <a href="javascript;;"
                                                                    class="btn btn-primary py-1 px-2"> View</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="text-reset notification-item d-block dropdown-item position-relative">
                                                        <div class="d-flex">
                                                            <div class="avatar-xs me-3">
                                                                <span
                                                                    class="avatar-title bg-soft-danger text-danger rounded-circle fs-16">
                                                                    <i class="bx bx-message-square-dots"></i>
                                                                </span>
                                                            </div>
                                                            <div class="flex-1">
                                                                <a href="#!" class="stretched-link">
                                                                    <h6 class="mt-0 mb-2 fs-13 lh-base">You have
                                                                        received <b class="text-success">20</b> new
                                                                        messages in the conversation
                                                                    </h6>
                                                                </a>
                                                                <p
                                                                    class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                    <span><i class="mdi mdi-clock-outline"></i> 2 hrs
                                                                        ago</span>
                                                                </p>
                                                            </div>
                                                            <div class="fs-15">
                                                                <a href="javascript;;"
                                                                    class="btn btn-primary py-1 px-2"> View</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="text-reset notification-item d-block dropdown-item position-relative">
                                                        <div class="d-flex">
                                                            <img src="{{ asset('assets\images\nav-img5.png') }}"
                                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                            <div class="flex-1">
                                                                <a href="#!" class="stretched-link">
                                                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen
                                                                        Gibson</h6>
                                                                </a>
                                                                <div class="fs-13 text-muted">
                                                                    <p class="mb-1">We talked about a project on
                                                                        linkedin.</p>
                                                                </div>
                                                                <p
                                                                    class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                    <span><i class="mdi mdi-clock-outline"></i> 4 hrs
                                                                        ago</span>
                                                                </p>
                                                            </div>
                                                            <div class=" fs-15">
                                                                <a href="javascript;;"
                                                                    class="btn btn-primary py-1 px-2"> View</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="my-3 text-center">
                                                        <button type="button"
                                                            class="btn btn-soft-success waves-effect waves-light">View
                                                            All Notifications <i
                                                                class="ri-arrow-right-line align-middle"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: auto; height: 510px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                    <div class="simplebar-scrollbar"
                                        style="height: 176px; display: block; transform: translate3d(0px, 0px, 0px);">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel">
                            <div data-simplebar="init" style="max-height: 300px;" class="pe-2">
                                <div class="simplebar-wrapper" style="margin: 0px -8px 0px 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                aria-label="scrollable content"
                                                style="height: auto; overflow: hidden scroll;">
                                                <div class="simplebar-content" style="padding: 0px 8px 0px 0px;">
                                                    <div class="text-reset notification-item d-block dropdown-item">
                                                        <div class="d-flex">
                                                            <img src="{{ asset('assets\images\nav-img5.png') }}"
                                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                            <div class="flex-1">
                                                                <a href="#!" class="stretched-link">
                                                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">James
                                                                        Lemire</h6>
                                                                </a>
                                                                <div class="fs-13 text-muted">
                                                                    <p class="mb-1">We talked about a project on
                                                                        linkedin.</p>
                                                                </div>
                                                                <p
                                                                    class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                    <span><i class="mdi mdi-clock-outline"></i> 30 min
                                                                        ago</span>
                                                                </p>
                                                            </div>
                                                            <div class="fs-15">
                                                                <a href="javascript;;"
                                                                    class="btn btn-primary py-1 px-2"> View</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-reset notification-item d-block dropdown-item">
                                                        <div class="d-flex">
                                                            <img src="{{ asset('assets\images\h-details-4.png') }}"
                                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                            <div class="flex-1">
                                                                <a href="#!" class="stretched-link">
                                                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela
                                                                        Bernier</h6>
                                                                </a>
                                                                <div class="fs-13 text-muted">
                                                                    <p class="mb-1">Answered to your comment on the
                                                                        cash flow forecast's
                                                                        graph 🔔.</p>
                                                                </div>
                                                                <p
                                                                    class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                    <span><i class="mdi mdi-clock-outline"></i> 2 hrs
                                                                        ago</span>
                                                                </p>
                                                            </div>
                                                            <div class="fs-15">
                                                                <a href="javascript;;"
                                                                    class="btn btn-primary py-1 px-2"> View</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-reset notification-item d-block dropdown-item">
                                                        <div class="d-flex">
                                                            <img src="{{ asset('assets\images\nav-img3.png') }}"
                                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                            <div class="flex-1">
                                                                <a href="#!" class="stretched-link">
                                                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">Kenneth
                                                                        Brown</h6>
                                                                </a>
                                                                <div class="fs-13 text-muted">
                                                                    <p class="mb-1">Mentionned you in his comment on
                                                                        📃 invoice #12501.
                                                                    </p>
                                                                </div>
                                                                <p
                                                                    class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                    <span><i class="mdi mdi-clock-outline"></i> 10 hrs
                                                                        ago</span>
                                                                </p>
                                                            </div>
                                                            <div class="fs-15">
                                                                <a href="javascript;;"
                                                                    class="btn btn-primary py-1 px-2"> View</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-reset notification-item d-block dropdown-item">
                                                        <div class="d-flex">
                                                            <img src="{{ asset('assets\images\nav-img5.png') }}"
                                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                            <div class="flex-1">
                                                                <a href="#!" class="stretched-link">
                                                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen
                                                                        Gibson</h6>
                                                                </a>
                                                                <div class="fs-13 text-muted">
                                                                    <p class="mb-1">We talked about a project on
                                                                        linkedin.</p>
                                                                </div>
                                                                <p
                                                                    class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                    <span><i class="mdi mdi-clock-outline"></i> 3 days
                                                                        ago</span>
                                                                </p>
                                                            </div>
                                                            <div class="fs-15">
                                                                <a href="javascript;;"
                                                                    class="btn btn-primary py-1 px-2"> View</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="my-3 text-center">
                                                        <button type="button"
                                                            class="btn btn-soft-success waves-effect waves-light">View
                                                            All Messages <i
                                                                class="ri-arrow-right-line align-middle"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: auto; height: 522px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                    <div class="simplebar-scrollbar"
                                        style="height: 172px; display: block; transform: translate3d(0px, 0px, 0px);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel">
                            <div class="w-25 w-sm-50 pt-3 mx-auto">
                                <img src="{{ asset('assets\images\nav-img3.png') }}" class="img-fluid"
                                    alt="user-pic">
                            </div>
                            <div class="text-center pb-5 mt-2">
                                <h6 class="fs-18 fw-semibold lh-base">Hey! You have no any notifications </h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- noti end  -->

            <div class="dropdown ms-sm-3 header-item topbar-user">
                <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center">
                        <img class="rounded-circle header-profile-user"
                            src="{{ asset('assets/Admin/assets/images/users/avatar-1.jpg') }}" alt="Header Avatar">
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
    <!-- LOGO -->
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
    </div>

    @include('layout::admin.includes.nav-bar')
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
