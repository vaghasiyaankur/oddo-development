<div class="col-lg-2 col-md-2 col-12 left-sidebar-main">
    <div class="sidebar-inner">
        <ul class="p-0 m-0">
            <li class="{{ Request::routeIs('user.view') ? 'active' : '' }}"><a href="{{route('user.view')}}">Home</a>
            </li>
            <li class="{{ Request::routeIs('calender') ? 'active' : '' }}"><a href="{{route('calender')}}">Calender &
                    Pricing</a></li>
            <li><a href="#">Payment</a></li>
            <li><a href="#">Security</a></li>
            <li><a href="#">Dog site</a></li>
            <li><a href="#">Dogistry</a></li>
            <li><a href="#">PawLibs</a></li>
            <li><a href="#">Orders</a></li>
            <li class="pb-5"><a href="#">My Pawpoints</a></li>
            <li class="logout mt-5 mb-3"><a href="#">Log Out</a></li>
        </ul>
    </div>
</div>