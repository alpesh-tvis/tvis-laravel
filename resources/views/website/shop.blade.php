@extends('layouts.website') 
@section('content')    

<div id="owl-demo11" class="owl-carousel owl-theme owl-loaded owl-drag">
   <div class="owl-stage-outer">
      <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1200px;">
         <div class="owl-item active" style="width: 1903px;">
            <div class="item"><img src="http://localhost/larablog/public/website/images/img_1.jpg" alt="" style="width: 100%;height: 50%;">
                <div class="centered"><h3>SHOP</h3>
                  <p><a href="{{ URL::to('/') }}">Home</a> >> Shop</p>
                </div>
            </div>
         </div>
        </div>
   </div>
</div>
<div class="shop-fill">
<h4>Select Category</h4>
<select class="show-menu-arrow" name="pro_cate" id="pro_cate">
  <option name="" value="" disabled>Select Category</option>
  @foreach($productcategories as $cname)
  <option name="{{ $cname->name }}" value="{{ $cname->id }}" data-id="{{ $cname->id }}">{{ $cname->name }}</option>
  @endforeach
</select>
</div>

<div class="" id="product_data" style="display: none;"></div>

<div class="container d-flex justify-content-center mt-50 mb-50">
  <div class="row">
   @foreach ($getproducts as $product)
      <div class="col-md-3 mt-2" id="product_data">
         <div class="card">
            <div class="card-body">
               <div class="card-img-actions" >
                <a href="{{ route('product-details', $product->id) }}"><img src="{{ $product->image }}" class="card-img product-img" alt="" height="100px" width="100px"></a>
               </div>
            </div>
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

            <div class="card-body bg-light text-center">
               <div class="mb-2">
                  <h6 class="font-weight-semibold mb-2">
                     <a href="{{ route('product-details', $product->id) }}" class="text-default mb-2" data-abc="true"> {{ $product->name }} </a>
                  </h6>
                  <!-- <a href="#" class="text-muted" data-abc="true">{!!  substr(strip_tags($product->content), 0, 50) !!}</a> -->
               </div>
               <h3 class="mb-0 font-weight-semibold">{{ $product->currency }} {{ $product->regular_price }}</h3>
               <div>
                  <i class="fa fa-star star"></i>
                  <i class="fa fa-star star"></i>
                  <i class="fa fa-star star"></i>
                  <i class="fa fa-star star"></i>
               </div>
               <div class="text-muted mb-3">34 reviews</div>
               <button type="button" class="btn bg-cart" id="remBtn"><a href="{{ route('add_to_cart', $product->id) }}" id="remBtn"><i class="fa fa-cart-plus mr-2"></i> Add to cart</a></button>
               <button type="button" class="btn bg-carts view"><a href="{{ route('product-details', $product->id) }}">View</a></button>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</div>
<div class="card-footer d-flex justify-content-center pagination-shop">
     {{ $getproducts->links() }} 
</div>


@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.6/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.6/dist/sweetalert2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <script>
$('.bg-cart').click(function(e){
//e.preventDefault();
/*swal.fire({
    title: 'Added into cart',
    //showConfirmButton: true,
});*/
swal("Save!", 
    "Added into cart!", 
    "success")

});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $('#pro_cate').on('change', function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).val();
    //var product_cat = $(this).data('product_cat')
    alert(id);
    //if (id) {
      $.ajax({
        type: "GET",
        url: '{{ route('get.data.by.id') }}',
        data: { 'id': id},
        dataType: "json",
        success: function(data) {
            //$('#product_data').html(data); 
            $('#product_data').html(data.html);
        }
      });
    //}
  });
});  
</script>
@endsection


<style>
button.btn.bg-carts.view {
    background-color: #2154a5;
    color: white;
}    
select.show-menu-arrow {
    background: grey;
    color: #fff;
}.shop-fill {
    text-align: center;
   background: none;
    padding: 10px 0px 0px 0px;
}    
.card-footer.d-flex.justify-content-center.pagination-shop {
  background: none;
  border: none;
}    
.container {
  position: relative;
  text-align: center;
  color: white;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  /*transform: translate(-50%, -50%);*/
}
.centered p {
    color: #2154a5;
    font-size: 14px;
    font-weight: 600;
}   
.product-img {max-width: 64%; height: 120px;}
.mt-50{
     margin-top: 50px;
}
.mb-50{
     margin-bottom: 50px;
}
.card {
     position: relative;
     display: -ms-flexbox;
     display: flex;
     -ms-flex-direction: column;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(0,0,0,.125);
     border-radius: .1875rem;
}
.card-img-actions {
     position: relative;
}
.card-body {
 -ms-flex: 1 1 auto;
 flex: 1 1 auto;
 padding: 1.25rem;
 text-align: center;
}
.card-img{
 width: 350px;
}
.star{
 color: red;
}
.bg-cart {
 background-color:#2154a5;
 color:#fff;
}
.btn.bg-cart a {
  color: #fff;
}
.bg-cart:hover {
 color:#fff;
}
.bg-buy {
 background-color:green;
 color:#fff;
 padding-right: 29px;
}
.bg-buy:hover {
 color:#fff;
}
a{
 text-decoration: none !important;
}
</style>


 
