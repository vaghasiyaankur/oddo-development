<div class="notification-inner">
    <div class="notification-heading">Notification</div>

    {{-- @dd('hello'); --}}
    @if (@$hotels)
        @foreach (@$hotels as $hotelDetails)
            @foreach ($hotelDetails as $hotel)
            <div class="inner-box">
                <div class="notification-img">
                    <img src="{{ asset('storage/city/bangkok.webp') }}" alt="">
                </div>
                <div class="notification-data">
                    <h5>{{ @$hotel->property_name }}</h5>
                    <div class="data-time">
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>Hotel has been booked
                            {{$hotel->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="notification-close-btn" data-id="{{ @$hotel->id }}">
                    <a href="javascript:;"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
            </div>
            @endforeach
        @endforeach
    @else
        <p class="notification-empty" style="padding:5px;">Notification box is empty.</p>
    @endif
</div>