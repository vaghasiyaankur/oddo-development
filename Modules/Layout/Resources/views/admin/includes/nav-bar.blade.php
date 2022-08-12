<div id="scrollbar">
    <div class="m-0 ps-2">
        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="nav-item">
                <a class="nav-link menu-link ps-0" href="{{ route('dashboard') }}">
                    <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                </a>
            </li> <!-- end Dashboard Menu -->

            <li class="nav-item">
                <a class="nav-link menu-link {{ Request::routeIs(['amenity.index', 'amenityCategory.index']) ? 'active' : '' }}" href="#amenityList1" data-bs-toggle="collapse"
                    role="button" aria-expanded="false" aria-controls="amenityList1">
                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">Amenity</span>
                </a>
                <div class="collapse menu-dropdown" id="amenityList1">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::routeIs('amenity.index') ? 'submenu_active' : '' }}" href="{{ route('amenity.index') }}">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Amenity</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::routeIs('amenityCategory.index') ? 'submenu_active' : '' }}" href="{{ route('amenityCategory.index') }}">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Amenity category</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ Request::routeIs(['roomType.index', 'room.index']) ? 'active' : '' }}" href="#roomList1" data-bs-toggle="collapse"
                    role="button" aria-expanded="false" aria-controls="roomList1">
                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">Room</span>
                </a>
                <div class="collapse menu-dropdown" id="roomList1">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::routeIs('roomType.index') ? 'submenu_active' : '' }}" href="{{ route('roomType.index') }}">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Room Type</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::routeIs('room.index') ? 'submenu_active' : '' }}" href="{{ route('room.index') }}">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Room</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ Request::routeIs('location.index') ? 'active' : '' }}" href="{{ route('location.index') }}">
                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">Location</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ Request::routeIs('facilities.index') ? 'active' : '' }}" href="{{ route('facilities.index') }}"><i class="ri-apps-2-line"></i>Facilities</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ Request::routeIs('food.index') ? 'active' : '' }}" href="{{ route('food.index') }}">
                    <i class="ri-apps-2-line"></i> <span data-key="t-landing">Food</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ Request::routeIs('bathroomitem.index') ? 'active' : '' }}" href="{{ route('bathroomitem.index') }}">
                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">Bathroom Item</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ Request::routeIs('bed.index') ? 'active' : '' }}" href="{{ route('bed.index') }}">
                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">Bed</span>
                </a>
            </li>
            <li class="nav-item">

                <a class="nav-link menu-link {{ Request::routeIs('property.index') ? 'active' : '' }}" href="{{ route('property.index') }}">
                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">Property</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ Request::routeIs('booking.index') ? 'active' : '' }}" href="{{ route('booking.index') }}">
                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">Booking</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ Request::routeIs('setting.index') ? 'active' : '' }}" href="{{ route('setting.index') }}">
                    <i class="ri-rocket-line"></i> <span data-key="t-landing">Settings</span>

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('admin.logout') }}">
                    <i class="ri-rocket-line"></i> <span data-key="t-landing">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Sidebar -->
</div>
