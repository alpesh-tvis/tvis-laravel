<header class="site-navbar" role="banner">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-12 search-form-wrap js-search-form">
        <form method="get" action="#">
          <input type="text" id="s" class="form-control" placeholder="Search...">
          <button class="search-btn" type="submit"><span class="icon-search"></span></button>
        </form>
      </div>
      <div class="col-4 site-logo">
        <a href="{{ URL::to('/') }}" class="text-black h2 mb-0"><img src="{{ asset($setting->site_logo) }}" class="img-fluid" alt=""></a>
      </div>
      <div class="col-8 text-right">
        <nav class="site-navigation" role="navigation">
          <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
            @foreach($categories as $category)
            <li><a href="{{ route('website.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
            @endforeach
            <li><a href="{{ route('website.category', ['slug' => $category->slug]) }}"></a></li>


            <li><a href="{{ route('website.shop') }}">Shop</a></li>
            <li><a href="{{ route('website.cart') }}"><i class="fa fa-shopping-cart" style="font-size:24px;color:#2154a5">
              
            </i></a>
              <span class='badge badge-warning' id='lblCartCount'>{{ count((array) session('cart')) }}
                <span>
                </li>
           </ul>
        </nav>
        <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
      </div>
  </div>
  

</header>

<style>
 .badge {
  padding-left: 9px;
  padding-right: 9px;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}

.label-warning[href],
.badge-warning[href] {
  background-color: #c67605;
}
#lblCartCount {
    ont-size: 10px;
background: #2154a5;
color: #fff;
padding: 2px 5px;
vertical-align: top;
margin-left: -10px;
} 
</style>