@extends('layouts.website') 
@section('content') 

<div id="owl-demo11" class="owl-carousel owl-theme owl-loaded owl-drag">
   <div class="owl-stage-outer">
      <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1200px;">
         <div class="owl-item active" style="width: 1903px;">
            <div class="item"><img src="http://localhost/larablog/public/website/images/img_1.jpg" alt="" style="width: 100%;height: 50%;">
                <div class="centered"><h3>Checkout</h3>
                  <p><a href="{{ URL::to('/') }}">Home</a> >> <a href="{{ URL::to('/shop') }}">Shop</a> >> <a href="{{ URL::to('/cart') }}">Cart</a></p>
                </div>
            </div>
         </div>
        </div>
   </div>
</div> 
<?php //echo "<pre>"; print_r(session('cart')); echo "<pre>"; 
//echo "<pre>"; print_r($cart); echo "<pre>";
?>
<div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-7 col coupon">
                    <form method="get">
                        <input type="text" name="coupon" id="coupon" placeholder="Coupon code">
                        <input type="submit" name="submit" value="Apply Coupon">
                    </form>
                </div>
            </div>
            <div class="row">
                    <!-- @if (auth()->user())
                     {{ @$user->id }}
                    @endif -->
                <form method="get">
                    <div class="col-7 col">
                        <h3 class="topborder"><span>Billing Details</span></h3>
                        <label for="country">Country</label>
                        <select name="country" id="country" required>
                            <option value="">Please select a country</option>
                            <option value="Canada">Canada</option>
                            <option value="Not Canada">Not Canada</option>
                        </select>
                        <div class="width50 padright">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" value="{{@$user->name}}"required>
                        </div>
                        <div class="width50">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" required>
                        </div>
                        <label for="company">Company Name</label>
                        <input type="text" name="company" id="company" required>
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" required>
                        <input type="text" name="address" id="address2" placeholder="Optional">
                        <label for="city">Town / City</label>
                        <input type="text" name="city" id="city" required>
                        <div class="width50 padright">
                            <label for="province">Province</label>
                            <select name="province" id="province" required>
                                <option value="">Please select a province</option>
                                <option value="ab">Alberta</option>
                                <option value="bc">British Columbia</option>
                                <option value="mb">Manitoba</option>
                                <option value="nb">New Brunswick</option>
                                <option value="nl">Newfoundland and Labrador</option>
                                <option value="ns">Nova Socia</option>
                                <option value="on">Ontario</option>
                                <option value="pe">Prince Edward Island</option>
                                <option value="qc">Quebec</option>
                                <option value="sk">Saskatchewan</option>
                                <option value="not-canada">Not Canada</option>
                            </select>
                        </div>
                        <div class="width50">
                            <label for="postcode">Postcode</label>
                            <input type="text" name="postcode" id="postcode" placeholder="Postcode / Zip" required>
                        </div>
                        <div class="width50 padright">
                            <label for="email">Email Address</label>
                            <input type="text" name="email" id="email" value="{{@$user->email}}" required>
                        </div>
                        <div class="width50">
                            <label for="tel">Phone</label>
                            <input type="text" name="tel" id="tel" required>
                        </div>
                       
                    </div>
                     <div class="col-4 col order">
                        <h3 class="topborder"><span>Your Order</span></h3>
                        @php $totals = 0 @endphp
                        @foreach($cart as $item)
                        @php $totals += $item['regular_price'] * $item['quantity'] @endphp
                        <div>
                            <p class="prod-description inline">{{ $item['name'] }} <div class="qty inline"><span class="smalltxt">x</span>{{ $item['quantity'] }} </div>
                            </p>
                        </div>
                        @endforeach
                        <div><h5>Cart Subtotal</h5> {{ $item['currency'] }} {{ $totals }}</div>
                        <div><h5>Product Total</h5> {{ $item['currency'] }} {{ $totals }}</div>
                        <div>
                            <h5 class="inline difwidth">Shipping and Handling</h5>
                            <p class="inline alignright center">Free Shipping</p>
                        </div>
                        <div><h5>Order Total</h5> </div>

                        <div>
                            <h3 class="topborder"><span>Payment Method</span></h3>
                            <input type="radio" value="banktransfer" name="payment" checked><p>Direct Bank Transfer</p>
                            <p class="padleft">
                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.
                            </p>
                        </div>
                        <div><input type="radio" value="cheque" name="payment"><p>Cash on delivery Payment</p></div>
                        <div>
                         <input type="radio" value="cheque" name="payment">
                             <p>
                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                    <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
                                </svg>
                                Pay with PayPal
                            </p>
                        </div>
                        
                        <a class="btn btn-primary btn-lg" href="/cart/pay-with-paypal">Place Order</a>
                        <input type="submit" name="submit" value="Place Order" class="redbutton">
                    </div>
                   
                </form>
            </div>
        </div>
@endsection


@section('script')

@endsection

<style>
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
.wrapper {
    padding: 30px 0px 0px 2px;
}

ol, ul {
    list-style: none;
}
blockquote, q {
    quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
    content: '';
    content: none;
}

/* Form Styles */
form
{
    width: 100%;
}

input[type="text"], input[type="password"], select, input[type="email"], input[type="tel"], input[type="date"], textarea
{
    border: 1px solid #ddd;
    background-color: #fff;
    color: #959595;
    width: 100%;
    padding: 10px;
    font-size: 12px;
    margin: 7px 0 25px 0;
}

label
{
    font-size: 14px;
}



input[type="checkbox"]
{
    margin: 5px 10px 5px 0px;
}

.user-pswd input[type="checkbox"]
{
    margin: 5px 10px 5px 15px;
}

input[type="checkbox"] + p, input[type="radio"] + p
{
    font-size: 15px;
    padding: 0 5px;
    display: inline;
    color: #959595;
}

input[type="radio"] 
{
    font-size: 13px;
    padding: 0 0 0 20px;
}

input[type="submit"]
{
    padding: 10px 20px;
    color: #fff; 
    background-color: #000;
    text-transform: uppercase;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover
{
    background-color: #D6544E;
    border: none;
}

.coupon input[type="text"]
{
    width: 160px;
}

.coupon input[type="submit"]
{
    margin: 0 0 0 20px;
}

.order .redbutton
{
    background-color: #D6544E;
    padding: 13px 30px;
    font-size: 14px;
    font-weight: 100;
    margin-top: 25px;
}

.order .redbutton:hover
{
    background-color: #000;
    border: none;
}

textarea
{
    height: 120px;
}

textarea:hover, input:hover
{
    border: 1px solid #D6544E;
    background-color: #fff;
}

textarea:active, input:active
{
    border: 1px solid #D6544E;
    background-color: #f5f5f5;
}

textarea:focus, input:focus
{
    border: 1px solid #000;
    background-color: #f5f5f5;
}

label:not(.notes):after
{
    content: "*";
    color: red;
    padding-left: 5px;
}

.notes
{
    display: block;
    padding-top: 20px;
}


.wrapper
{
    width: 100%;
    margin: 0 auto;
    margin-bottom: 100px;
}

.row:before, .row:after
{
    content: " ";
    display: table;
}

.row:after
{
    clear: both;
}

.col
{
    margin-right: 16px;
    float: left;
}

.col:last-child
{
    margin-right: 0;
}

.col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12
{
    width: 100%;
} 

.col-push-4, .col-push-7{
    margin-left: 0;
} 

/* TABLET STARTS HERE */

@media(min-width: 768px)
{
    .wrapper
    {
        width: 768px;
    }

    .col-4, .col-7
    {
        width: 376px;
    }

    .col-12
    {
        width: 100%;
    }

    .col-push-1, .col-push-2, .col-push-3, .col-push-4, .col-push-5, .col-push-6, .col-push-7, .col-push-8, .col-push-9, .col-push-10, .col-push-11
    {
        margin-left: 392px;
    }

    .col:nth-child(2n+2)
    {
        margin-right: 0;
    }

}


/*DESKTOP STARTS HERE*/

@media(min-width: 1136px)
{
    .wrapper
    {
        width: 1136px;
    }

    .col-1
    {
        width: 80px;
    }

    .col-2
    {
        width: 176px;
    }

    .col-3
    {
        width: 272px;
    }

    .col-4
    {
        width: 368px;
    }

    .col-5
    {
        width: 464px;
    }

    .col-6
    {
        width: 560px;
    }

    .col-7
    {
        width: 656px;
    }

    .col-8
    {
        width: 752px;
    }

    .col-9
    {
        width: 848px;
    }

    .col-10
    {
        width: 944px;
    }

    .col-11
    {
        width: 1040px;
    }

    .col-12
    {
        width: 100%;
    }
    .col-push-1
    {
        margin-left: 96px;
    }
    .col-push-2
    {
        margin-left: 192px;
    }
    .col-push-3
    {
        margin-left: 288px;
    }
    .col-push-4
    {
        margin-left: 384px;
    }
    .col-push-5
    {
        margin-left: 480px;
    }
    .col-push-6
    {
        margin-left: 576px;
    }
    .col-push-7
    {
        margin-left: 672px;
    }
    .col-push-8
    {
        margin-left: 768px;
    }
    .col-push-9
    {
        margin-left: 864px;
    }
    .col-push-10
    {
        margin-left: 960px;
    }
    .col-push-11
    {
        margin-left: 1056px;
    }

    .col:nth-child(2n+2)
    {
        margin-right: 16px;
    }

    .col:last-child
    {
        margin-right: 0;
    }
}


/* Main CSS Starts Here */


h1, h2, h3, h4, h5, h6
{
    text-transform: uppercase;
    font-weight: 900;
    padding: 20px 0;
    color: #000;
}

h1
{
    font-size: 72px;
    color: #000;
}

h2
{
    font-size: 28px;
}

h3
{
    font-size: 16px;
}

h4
{
    font-size: 15px;
}

/*h5
{
    font-size: 14px;
}*/

h6
{
    font-size: 13px;
}



/* Heading Top Border Styles Start Here */
 h3 
{
    position: relative;
}
  
 h3.topborder 
{
 margin-top: 0;
 font-size: 0.75rem;
}
  
h3.topborder:before 
{
    content: "";
    display: block;
    border-top: 1px solid #c2c2c2;
    width: 100%;
    height: 1px;
    position: absolute;
    top: 50%;
    z-index: 1;
}
  
h3.topborder span {
    background: #fff;
    padding: 0 10px 0 0;
    position: relative;
    z-index: 5;
}




.fa-info
{
    font-size: 24px;
    padding: 0 20px; 
    color: #757575;
    line-height: 56px;
    vertical-align: middle;
}

a
{
    color: #D6544E;
    font-size: 13px;
    text-decoration: none;
}

a:hover
{
    color: #000;
}

.info-bar
{
    height: 56px;
    background-color: #f5f5f5;
    margin: 20px 0;
}

.info-bar p:first-child
{
    padding: 0;
}

.order
{
    border: 12px solid #f5f5f5;
    padding: 30px;
    margin-top: 28px;
}

.order div:not(.qty)
{
    width: 100%;
    border-bottom: 1px solid #DDDDDD;
    padding: 20px 0;
}

.order a
{
    display: block;
}

.order p
{
    padding: 0;
    line-height: 20px;
    font-size: 12px;
}

.order h4, h5
{
    padding: 0;
}

.order div:nth-child(6)
{
    border: none;
}

.width50
{
    width: 50%;
    float: left;
    padding-top:  10px;
}

.padleft
{
    margin-left: 39px;
}

.padright
{
    padding-right: 40px;
}

.inline
{
    display: inline-block;
}

.alignright
{
    float: right;
}

.prod-description
{
    text-transform: uppercase;
    color: #000;
}

.qty
{
    font-weight: 900;
    font-size: 13px;
    color: #000;
    padding-left: 4px;
}

.smalltxt
{
    font-size: 9px;
    vertical-align: middle;
}

.paymenttypes
{
    border: 1px solid #DDDDDD;
    width: 135px;
    padding: 0 8px;
    margin: 0 0 20px 10px;
    display: inline-block;
    vertical-align: middle;
}

.difwidth
{
    width: 150px;
    line-height: 20px;
    font-size : 14px;
}

.order .center
{
    line-height: 40px;
    color: #000;
}   
</style>


