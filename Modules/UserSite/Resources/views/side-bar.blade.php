<aside class="side-content">
    <div class="side-content-list">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('property-form') ? 'active' : '' }}" href="{{route('property-form')}}" >Basic Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('layout-pricing-form') ? 'active' : '' }}" href="{{route('layout-pricing-form')}}">Layout & Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('facilities-form') ? 'active' : '' }}" href="{{route('facilities-form')}}">Facilities & Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:;">Aminities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript">Photos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript">Policies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript">Payments</a>
            </li>
        </ul>
    </div>
</aside>