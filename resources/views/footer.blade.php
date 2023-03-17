<div class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-3">
            <h3 class="footer-heading mb-4">About Us</h3>
            <p>{{ $setting->description }} </p>
            <p>Email : {{ $setting->email }} </p>
            <p>Phone No : {{ $setting->phone }} </p>
            <p>Address : {{ $setting->address }} </p>
          </div>
          <div class="col-md-3 ml-auto">
            <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
            <ul class="list-unstyled float-left mr-5">
              <li><a href="{{ route('website') }}">Home</a></li>
              <li><a href="{{ route('website.about') }}">About Us</a></li>
              <li><a href="{{ route('website.contact') }}">Contact US</a></li>
            </ul>
            
          </div>
          <div class="col-md-3">
            <div>
              <h3 class="footer-heading mb-4">Usefull link</h3>
                <ul class="list-unstyled float-left">
                @foreach($categories as $category)
                  <li><a href="{{ route('website.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div>
              <h3 class="footer-heading mb-4">Connect With Us</h3>
              <p>
                @if($setting->facebook)<a target="_blank" href="{{ $setting->facebook }}"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a> @endif
                @if($setting->twitter)<a target="_blank" href="{{ $setting->twitter }}"><span class="icon-twitter p-2"></span></a> @endif
                @if($setting->instagram)<a target="_blank" href="{{ $setting->instagram }}"><span class="icon-instagram p-2"></span></a> @endif
                @if($setting->reddit)<a target="_blank" href="{{ $setting->reddit }}"><span class="icon-rss p-2"></span></a> @endif
                @if($setting->email)<a target="_blank" href="{{ $setting->email }}"><span class="icon-envelope p-2"></span></a> @endif
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <p>
              {{ $setting->copyright }} |
              <div class="mb-0">Developed By tvistech on <a href="">Laravel Blog Development</a></div>
              </p>
          </div>
        </div>
      </div>
    </div>


  <script src="{{ asset('website') }}/js/jquery-3.3.1.min.js"></script>
  <script src="{{ asset('website') }}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{ asset('website') }}/js/jquery-ui.js"></script>
  <script src="{{ asset('website') }}/js/popper.min.js"></script>
  <script src="{{ asset('website') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('website') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('website') }}/js/jquery.stellar.min.js"></script>
  <script src="{{ asset('website') }}/js/jquery.countdown.min.js"></script>
  <script src="{{ asset('website') }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('website') }}/js/bootstrap-datepicker.min.js"></script>
  <script src="{{ asset('website') }}/js/aos.js"></script>

  <script src="{{ asset('website') }}/js/main.js"></script>
  @yield('script')