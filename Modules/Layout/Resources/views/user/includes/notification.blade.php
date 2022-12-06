<div class="notification-inner">
    <div class="notification-heading">Notification</div>
    @if (@$demos)
    @foreach (@$demos as $hotelD)
    @foreach ($hotelD as $h)
            <div class="inner-box">
                <div class="notification-img">
                    <img src="{{ @$h->mainPhoto->first()->photos ? asset('storage/' . @$h->mainPhoto->first()->photos) : asset('assets/images/default.png') }}" alt="">
                </div>
                <?php 
                    $date = $h->created_at;
                ?>
                <div class="notification-data">
                    <h5>{{ @$h->property_name }}</h5>
                    <div class="data-time">
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>Hotel has been booked
                            {{ $h->notification[0]->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="notification-close-btn" data-id="{{ @$h->id }}">
                    <a href="javascript:;"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
            </div>
            @endforeach
        @endforeach
    @else
        <p class="notification-empty" style="padding:5px;">Notification box is empty.</p>
    @endif
</div>