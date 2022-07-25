<header class="header">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="{{route('home.index')}}">Odda</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
        <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('hotel.index') }}">Hotels </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('city.index') }}">Cities</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('search.index') }}">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link position-relative" href="{{ route('planner.index') }}">Planner
              <span
                class="position-absolute top-10 start-lg-100 translate-middle badge rounded-pill bg-primary">25</span>
            </a>
          </li>
          <li class="nav-item ps-lg-3">
            <a class="nav-link" href="{{ route('saved.index') }}">Saved</a>
          </li>
        </ul>

        @php  
          if(auth()->check()) {
            $authId = auth()->user()->id;
            $property = App\Models\Hotel::where('user_id', $authId)->count();
          }
        @endphp

        @if(!auth()->check() || $property == 0)
          @if(!auth()->check())
            <div class="list-properties pe-5">
              <a href="javascript:;" class="list-properties-btn btn" data-bs-toggle="modal" data-bs-target="#Log_in_modal">List Your Property</a>
            </div> 
          @else
            <div class="list-properties pe-5">
              <a href="{{route('property-category')}}" class="list-properties-btn btn">List Your Property</a>
            </div>
          @endif
        @else
          <div class="list-properties pe-5">
            <a href="{{route('user.view')}}" class="list-properties-btn btn">My Property</a>
          </div>
        @endif

        @if(!auth()->check())
        <div class="list-properties pe-3 mt-3 mt-lg-0">
          <button type="button" class="list-properties-btn btn" data-bs-toggle="modal" data-bs-target="#Log_in_modal">
            Login
          </button>
        </div>
        @endif

        @if(auth()->check() && auth()->user()->type == 'user')
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle dropdown-btn" type="button" id="dropdownMenuButton1"
              data-bs-toggle="dropdown" aria-expanded="false">
              Hi, {{auth()->user()->name}}
            </button>
            <ul class="dropdown-menu dropdown-custom py-0" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item active" href="{{ route('myaccount.index') }}">My Account</a></li>
              <li><a class="dropdown-item" href="{{ route('orderhistory.index') }}">Order History</a></li>
              <li><a class="dropdown-item" href="{{ route('upcomingtrips.index') }}">Upcoming Trips</a></li>
              <li><a class="dropdown-item " href="{{ route('logout.index') }}"><span class="text--red">Logout</span> </a></li>
            </ul>
          </div>
        @endif
      </div>
    </div>
  </nav>
</header>
