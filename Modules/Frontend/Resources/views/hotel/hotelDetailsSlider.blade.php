@foreach ($photos as $hotelPhoto)
    <div class="item">
        {{-- @dd($hotelPhotoData) --}}
        <img src="{{ asset('storage/'. $hotelPhoto->photos) }}" alt="{{ $hotelPhoto->category->name }}"
            alt="" title="" class="img-fluid">
    </div>
@endforeach