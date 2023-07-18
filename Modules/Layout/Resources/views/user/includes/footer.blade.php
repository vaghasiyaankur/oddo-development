@php
     $bottomPages = App\Models\Pages::whereStatus('1')->whereLocation('0')->get();
@endphp
    <!-------- Footer start -------->
    {{-- <footer class="footer hotel-result">
      <div class="container">
          <div class="footer-main">
              <div class="row">
                  <div class="col-lg-4">
                      <div class="footer-title mb-3">
                          <a href="#">Odda</a>
                      </div>
                      <div class="footer-icon d-flex">
                          <div class="icon-inner me-2"><i class="fa-brands fa-facebook-f text-white"></i></div>
                          <div class="icon-inner me-2"><i class="fa-brands fa-youtube text-white"></i></i></div>
                          <div class="icon-inner me-2"><i class="fa-brands fa-instagram text-white"></i></div>
                          <div class="icon-inner me-2"><i class="fa-brands fa-twitter text-white"></i></div>
                          <div class="icon-inner me-2"><i class="fa-brands fa-linkedin text-white"></i></div>
                      </div>
                  </div>
                  <div class="col-lg-2 col-sm-6 mt-3 mt-lg-0 mb-3 mb-lg-0">
                      <div class="footer-link">
                          <h5 class="purple">Products</h5>
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link ps-0 active" href="#">Hotels</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link ps-0" href="#"> Places</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link ps-0" href="#">Transportation</a>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-2 col-sm-6 mb-3 mb-lg-0">
                      <div class="footer-link">
                          <h5 class="purple">Customers</h5>
                          <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link ps-0 active" href="#">Testimonials</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-0" href="#"> Reviews</a>
                                </li> 

                                @foreach ($bottomPages as $bottomPage)
                                    <li class="nav-item">
                                        <a class="nav-link ps-0" href="{{ url('/'.$bottomPage->slug) }}"> {{$bottomPage->title}}</a>
                                    </li> 
                                @endforeach
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-2 col-sm-6 mb-3 mb-lg-0">
                      <div class="footer-link">
                          <h5 class="purple">Company</h5>
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link ps-0 active" href="#">About</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link ps-0" href="#"> Hotel Partners</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link ps-0" href="#">Job</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link ps-0" href="#">Blog</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link ps-0" href="#">Newsroom</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link ps-0" href="#">Terms of Use</a>
                              </li>
                          </ul>
                      </div> 
                  </div>
                  <div class="col-lg-2 col-sm-6 mb-3 mb-lg-0">
                      <div class="footer-link">
                          <h5 class="purple">Resources</h5>
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link ps-0 active" href="#">Support</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link ps-0" href="#"> Contact</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link ps-0" href="#"> Legal</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link ps-0" href="#">Privacy & Terms</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link ps-0" href="#">Legal Agreement</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="footer-copyright">
                  <p class="mb-0">© Inc. All Rights Reserved</p>
              </div>
          </div>
      </div>
    </footer> --}}
    <footer class="footer hotel-result">
        <div class="container">
            <div class="footer-main">
                <div class="row footer-logo d-flex align-items-center">
                    <div class="col-xl-10 col-lg-9 col-md-8 col-sm-7  footer-title d-flex justify-content-sm-start justify-content-center">
                        <a href="#">
                            <img src="{{asset('assets/images/white_background.png')}}" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5  footer-icons">
                        <div class="footer-icons d-flex justify-content-sm-between justify-content-center">
                            <div class="icon-inner mx-sm-0 mx-2"><i class="fa-solid fa-phone"></i></div>
                            <div class="icon-inner mx-sm-0 mx-2"><i class="fa-solid fa-envelope"></i></div>
                            <div class="icon-inner mx-sm-0 mx-2"><i class="fa-solid fa-location-dot"></i></div>
                        </div>
                    </div>
                </div>
                <div class="row footer-content">
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <div class="footer-link">
                            <h5 class="purple">Products</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link ps-0 active" href="#">Hotels</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-0" href="#"> Places</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-0" href="#">Transportation</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <div class="footer-link">
                            <h5 class="purple">Customers</h5>
                            <ul class="nav flex-column">
                                  <li class="nav-item">
                                      <a class="nav-link ps-0 active" href="#">Testimonials</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link ps-0" href="#"> Reviews</a>
                                  </li> 
  
                                  @foreach ($bottomPages as $bottomPage)
                                      <li class="nav-item">
                                          <a class="nav-link ps-0" href="{{ url('/'.$bottomPage->slug) }}"> {{$bottomPage->title}}</a>
                                      </li> 
                                  @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <div class="footer-link">
                            <h5 class="purple">Company</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link ps-0 active" href="#">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-0" href="#"> Hotel Partners</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-0" href="#">Job</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-0" href="#">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-0" href="#">Newsroom</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-0" href="#">Terms of Use</a>
                                </li>
                            </ul>
                        </div> 
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <div class="footer-link">
                            <h5 class="purple">Resources</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link ps-0 active" href="#">Support</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-0" href="#"> Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-0" href="#"> Legal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-0" href="#">Privacy & Terms</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-0" href="#">Legal Agreement</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-sm-0 mb-3">
                        <p class="mb-0 text-sm-start text-center">© Inc. All Rights Reserved</p>
                    </div>
                    <div class="col-sm-6 mb-sm-0 mb-3">
                        <div class="footer-icon d-flex justify-content-sm-end justify-content-center">
                            <div class="icon-inner"><i class="fa-brands fa-facebook-f"></i></div>
                            <div class="icon-inner"><i class="fa-brands fa-youtube"></i></div>
                            <div class="icon-inner"><i class="fa-brands fa-instagram"></i></div>
                            <div class="icon-inner"><i class="fa-brands fa-twitter"></i></div>
                            <div class="icon-inner"><i class="fa-brands fa-linkedin"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  <!-------- Footer end -------->