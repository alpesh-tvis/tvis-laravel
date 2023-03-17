<?php
namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Message\Response;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Validator;
use Session;

use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;

class OrderController extends Controller
{
    public function payorderplace(){
       $cart = session()->get('cart');
       return view('website.category', ['categoriess' => $categoriess]);

    }
}
