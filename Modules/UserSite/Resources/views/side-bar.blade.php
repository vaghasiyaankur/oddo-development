<aside class="side-content position-sticky top-0">
    <div class="side-content-list">
        <ul class="nav flex-column flex--row">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('basic-info') ? 'active' : '' }}" href="{{route('basic-info')}}" >Basic Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link layout-button {{ Request::routeIs('layout-form', 'layout-pricing-form', 'room-list') ? 'active' : '' }}" href="{{route('layout-pricing-form')}}">Layout & Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('facilities-form') ? 'active' : '' }}" href="{{route('facilities-form')}}">Facilities & Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('amenities') ? 'active' : '' }}" href="{{route('amenities')}}">Amenities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('photo') ? 'active' : '' }}" href="{{route('photo')}}">Photos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('policy') ? 'active' : '' }}" href="{{route('policy')}}">Policies</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="javascript">Payments</a>
            </li> --}}
        </ul>
    </div>
</aside>