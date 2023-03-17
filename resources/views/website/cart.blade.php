@extends('layouts.website') 
@section('content') 

<div id="owl-demo11" class="owl-carousel owl-theme owl-loaded owl-drag">
   <div class="owl-stage-outer">
      <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1200px;">
         <div class="owl-item active" style="width: 1903px;">
            <div class="item"><img src="http://localhost/larablog/public/website/images/img_1.jpg" alt="" style="width: 100%; height: 50%;">
                <div class="centered"><h3>Cart</h3>
                  <p><a href="{{ URL::to('/') }}">Home</a> > <a href="{{ URL::to('/shop') }}">Shop</a></p>
                </div>
            </div>
         </div>
        </div>
   </div>
</div> 
<?php //echo "<pre>"; print_r(session('cart')); ?>
<div class="container">
    <div class="divTable div-hover">
      <h3>Shopping Cart</h3>
           @php $total = 0 @endphp
           @php $itemtotal = 0 @endphp
           @if(session('cart'))
           <div class="rowTable bg-primary text-white pb-2 bg-header">
                <div class="divTableCol">Product</div>
                <div class="divTableCol">Name</div>
                <div class="divTableCol">Quantity</div>
                <div class="divTableCol">Price</div>
                <div class="divTableCol">Total</div>
                <div class="divTableCol">Actions</div>
            </div>
           @foreach(session('cart') as $id => $details)
           @php $total += $details['regular_price'] * $details['quantity'] @endphp
            <div class="rowTable" data-id="{{ $id }}">
                <div class="divTableCol">
                    <div class="media">
                        <a class="thumbnail pull-left mr-2" href="{{ URL::to('/product-details/') }}/{{ $id }}">
                            <img class="media-object" src="{{ $details['image'] }}" style="width: 72px; height: 72px;" />
                        </a>
                     </div>
                </div>
                <div class="divTableCol"><strong class="label label-warning">{{ $details['name'] }}</strong></div>
                <div class="divTableCol qty-number">
                    <!-- <input type="number" class="form-control qty-num quantity cart_update" value="{{ $details['quantity'] }}" /> -->
                    <input type="number" value="{{ $details['quantity'] }}" class="form-control qty-num quantity update-cart" />
                </div>
                <div class="divTableCol"><strong>{{ $details['currency'] }} {{ $details['regular_price'] }}</strong></div>
                <div class="divTableCol"><strong>{{ $details['currency'] }} {{ $details['regular_price'] }}</strong></div>
                <div class="divTableCol">
                    <button type="button" class="btn btn-danger cart_remove"><i class="fa fa-trash-o"></i> Remove</button>
                </div>
            </div>
            @endforeach
            
            <div class="rowTable">
                <div class="divTableCol"></div>
                <div class="divTableCol"></div>
                <div class="divTableCol"></div>
                <div class="divTableCol"><h5>Total Product Item</h5></div>
                <div class="divTableCol">
                    <h5><strong>{{ count((array) session('cart')) }}</strong></h5>
                </div>
            </div>
            <div class="rowTable">
                <div class="divTableCol"></div>
                <div class="divTableCol"></div>
                <div class="divTableCol"></div>
                <div class="divTableCol"><h5>Subtotal</h5></div>
                <div class="divTableCol">
                    <h5><strong>{{ $details['currency'] }} {{ $total }}</strong></h5>
                </div>
            </div>
            <div class="rowTable">
                <div class="divTableCol"></div>
                <div class="divTableCol"></div>
                <div class="divTableCol"></div>
                <div class="divTableCol"><h5>Total Price</h5></div>
                <div class="divTableCol">
                    <h5><strong>{{ $details['currency'] }} {{ $total }}</strong></h5>
                </div>
            </div>
            <div class="rowTable">
                <div class="divTableCol"></div>
                <div class="divTableCol"></div>
                <div class="divTableCol"></div>
                <div class="divTableCol"><h3>Total</h3></div>
                <div class="divTableCol">
                    <h3><strong>{{ $details['currency'] }} {{ $total }}</strong></h3>
                </div>
            </div>
            <div class="rowTable">
                <div class="divTableCol"></div>
                <div class="divTableCol"></div>
                <div class="divTableCol"></div>
                <div class="divTableCol">
                    <button type="button" class="btn btn-default" style=""></span> <a href="{{ URL::to('/shop') }}" style="color: #000;"> <i class="fa fa-arrow-left"></i> Continue Shopping </a></button>
                </div>
                <div class="divTableCol">
                    <button type="button" class="btn btn-success process-checkout"><a href="{{ URL::to('/checkout') }}">Process to Checkout</a></span></button>
                </div>
            </div> 
            
            @else
            <p>No product in cart</p>
            <button type="button" class="btn btn-default" style=""></span> <a href="{{ URL::to('/shop') }}" style="color: #000;"> <i class="fa fa-arrow-left"></i> Continue Shopping </a></button>
            @endif       
    </div>
</div>
 <div class="container">
  
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
  
    @yield('content')
</div>
@endsection

@section('script')
<script type="text/javascript">
$(".update-cart").change(function (e) {
    e.preventDefault();
    var qval = $(this);
    
    if(confirm("Do you really want to update quantity?")) {
        $.ajax({
            url: '{{ route('website.update-cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: qval.parents(".rowTable ").attr("data-id"), 
                    quantity: qval.parents(".rowTable").find(".quantity").val()
                },
                success: function (response) {
                window.location.reload();
                }
            });
    }
});


$(".cart_remove").click(function (e) {
//$(".cart_remove").click(function () {
 e.preventDefault();
 var val = $(this);
 if(confirm("Do you really want to remove?")) {
      $.ajax({
          url: '{{ route('remove_from_cart') }}',
          method: "DELETE",
          data: {
              _token: '{{ csrf_token() }}', 
              id: val.parents(".rowTable").attr("data-id")
          },
          success: function (response) {
              window.location.reload();
          }
      });
  }
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection

<style>
.rowTable.bg-primary.text-white.pb-2.bg-header {
  background: #e6e6e6 !important;
  color: #000 !important;
  font-weight: 600;
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
.process-checkout{color: #fff;
background-color: #2f89fc;
border-color: #2f89fc;}
.form-control.qty-num {
  width: 69px;
  height: 23px;
}   
.mr-2{
  margin-right: 20px;
}

.divTable{
   display: table;
   width: 100%;
   height: 50%;
text-align: center;
padding: 14px 2px 30px 0px;
}
.rowTable {
   display: table-row;
}
.divTableHeading {
   display: table-header-group;
}
.divTableCol, .divTableHead {
   border-bottom: 1px solid #eee;
   display: table-cell;
   padding: 3px 10px;
}
.divTableHeading {
   background-color: #EEE;
   display: table-header-group;
   font-weight: bold;
}
.divTableFoot {
   background-color: #EEE;
   display: table-footer-group;
   font-weight: bold;
}
.divTableBody {
   display: table-row-group;
}
</style>


