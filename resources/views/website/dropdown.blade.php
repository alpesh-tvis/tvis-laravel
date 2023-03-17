@extends('layouts.website') 
@section('content')    

<div id="owl-demo11" class="owl-carousel owl-theme owl-loaded owl-drag">
   <div class="owl-stage-outer">
      <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1200px;">
         <div class="owl-item active" style="width: 1903px;height: 100%;">
            <div class="item"><img src="http://localhost/larablog/public/website/images/img_1.jpg" alt="" style="width: 100%;height: 100%;">
                <div class="centered"><h3>SHOP</h3>
                  <p><a href="{{ URL::to('/') }}">Home</a> > Shop</p>
                </div>
            </div>
         </div>
        </div>
   </div>
</div>

<div class="col-md-12">
<div class="col-md-6">
    <label>Category</label>
    <select class="form-control" name = "category">
        <option value="0">Please Select Category</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>
<div class="col-md-6">
    <label>Products</label>
    <select class="form-control" name = "product">
        <option value="0">Please Select Product</option>
        @foreach($products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
        @endforeach

    </select>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('select[name=category]').on('change', function () {
        var selected = $(this).find(":selected").attr('value');
        alert(selected);
        $.ajax({
                    url: '{{route('website.shop')}}',
                    type: 'GET',
                    dataType: 'json',

            }).done(function (data) {

                var select = $('select[name=product]');
                select.empty();
                select.append('<option value="0" >Please Select Product</option>');
                $.each(data,function(key, value) {
                    select.append('<option value=' + key.id + '>' + value.name + '</option>');
                });
                console.log("success");
        })
    });
});
</script>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.6/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.6/dist/sweetalert2.min.css" rel="stylesheet"/>




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
  transform: translate(-50%, -50%);
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


 
