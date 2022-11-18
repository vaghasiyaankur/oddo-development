<div class="col-lg-2 col-md-2 col-12 left-sidebar-main">
    <div class="sidebar-inner">
        <ul class="p-0 m-0">
            <li class="{{ Request::routeIs('user.view') ? 'active' : '' }}"><a href="{{route('user.view')}}">Home</a>
            </li>
            <li class="{{ Request::routeIs('calender') ? 'active' : '' }}"><a href="{{route('calender')}}">Calender &
                    Pricing</a></li>
            <li class="{{ Request::routeIs('property-category') ? 'active' : '' }} "><a href="{{route('property-category')}}">Add Property</a></li>
            <li class="{{ Request::routeIs('booking') ? 'active' : '' }}"><a href="{{route('booking')}}">Bookings</a></li>
            {{-- <li class="logout mt-5 mb-3"><a href="#">Log Out</a></li> --}}
            
        </ul>
    </div>
</div>
