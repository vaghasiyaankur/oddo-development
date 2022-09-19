@php
    @$id = Request::route('id');
    $hotel = App\Models\Hotel::whereUuid($id)->first();
    $room = App\Models\Room::whereHotel_id($hotel->id)->get();
@endphp

<aside class="side-content position-sticky top-0">
    <div class="side-content-list">
        <ul class="nav flex-column flex--row">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('basic-info') ? 'active' : '' }}" href="{{route('basic-info', ['id' => @$id])}}" >Basic Info</a>
            </li>
            <li class="nav-item">
                @if ($room->count() == 0)
                    <a class="nav-link layout-button {{ Request::routeIs('layout-form', 'layout-pricing-form', 'room-list') ? 'active' : '' }}" href="{{route('layout-pricing-form', ['id' => @$id])}}">Layout & Pricing</a>
                @else   
                    <a class="nav-link layout-button {{ Request::routeIs('layout-form', 'layout-pricing-form', 'room-list') ? 'active' : '' }}" href="{{route('room-list', ['id' => @$id])}}">Layout & Pricing</a>
                @endif
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('facilities-form') ? 'active' : '' }}" href="{{route('facilities-form', ['id' => @$id])}}">Facilities & Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('amenities') ? 'active' : '' }}" href="{{route('amenities', ['id' => @$id])}}">Amenities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('photo') ? 'active' : '' }}" href="{{route('photo', ['id' => @$id])}}">Photos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('policy') ? 'active' : '' }}" href="{{route('policy', ['id' => @$id])}}">Policies</a>
            </li>
        </ul>
    </div>
</aside>
