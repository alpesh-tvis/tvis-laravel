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

class ProductController extends Controller
{
    /**

     * Create a new controller instance.
     *
     * @return view

     */

    public function index(){
        $products = Product::all();
        return view('admin.product.index',['products'=>$products]);
        
    }
    
    public function create(){
        $prod = Product::all();
        $productcategories = ProductCategory::all();
        return view('admin.product.create', compact(['productcategories', 'prod']));
    }

    public function store(request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name'    => 'required|string',
                'description' => 'required|string',
                'category'    => 'required|string',
                'image' => 'required|image',
            ]
        );
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        $obj = new Product();
        $obj->id=$request->id;
        $obj->name=$request->name;
        $obj->slug=Str::slug($request->name);
        $obj->content=$request->description;
        $obj->regular_price=$request->regular_price;
        $obj->sale_price=$request->sale_price;
        $obj->currency=$request->currency;
        $obj->category=$request->category;
        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/product/', $image_new_name);
            $obj->image = '/storage/product/' . $image_new_name;
            $obj->save();
        }
        $obj->save();
        
        Session::put('flash_message', 'Product successfully added!');
        return redirect()->back();
    } 
    
    public function show(Product $product){
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product){   
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        if(!is_null($product)){
            $product->name = $request->input('name');
            $product->content = $request->input('content');
            $product->category = $request->input('category');
            $product->regular_price = $request->input('regular_price');
            $product->sale_price = $request->input('sale_price');
            $product->currency = $request->input('currency');

            if($request->hasFile('image')){
                $image = $request->image;
                $image_new_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('storage/product/', $image_new_name);
                $product->image = '/storage/product/' . $image_new_name;
            }
            $product->save();
            Session::put('success_update', 'Product updated successfully');
            return redirect()->back();
            //return redirect()->route('product.index');
        }
        
    }

    public function destroy(Product $product){
        if($product){
            $product->delete();
            return back();
        }

    }
    
    public function getdata(Request $request)
    {   
       return $request->id;
    }

    public function shop(Request $request){
        /*$request = $request->id;
        if ($request) {
          echo 'hello';
        }*/
        $getproducts = Product::paginate(12);
        $productcategories = ProductCategory::all();
        return view('website.shop', compact(['productcategories', 'getproducts']));
    }

    public function addtocart($id){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "name" => $product->name,
                "content" => $product->content,
                "regular_price" => $product->regular_price,
                "sale_price" => $product->sale_price,
                "currency" => $product->currency,
                "category" => $product->category,
                "image" => $product->image,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        Session::put('flash_message', 'Product successfully added!');
        return redirect()->back();
    }

    public function cart(){
        return view('website.cart');
    }
    
    /*public function update(Request $request)
    {   
        $product = Product::findOrFail($id);

        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }*/

    public function updatequantity(Request $request){
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    
    /*public function updateItem($item, $id, $quantity) {
        $this->items[$id]['qty'] = $quantity;
        $this->items[$id]['price'] = $quantity * $item->price;

        $this->totalQty = 0;
        foreach($this->items as $element) {
            $this->totalQty += $element['qty'];
            $this->totalPrice = $this->totalQty * $item->price;
        }
    }*/

    public function updatequantitydetails(Request $request){
        
        /*if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            
            $cart->updateItem($product, $id, $quantity);
            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }*/
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        
        if ($request->id && $request->quantity) {
            if(isset($cart[$id])) {
                $cart[$id]['quantity']++;
            }  else {
                $cart[$id] = [
                    "name" => $product->name,
                    "content" => $product->content,
                    "regular_price" => $product->regular_price,
                    "sale_price" => $product->sale_price,
                    "currency" => $product->currency,
                    "category" => $product->category,
                    "image" => $product->image,
                    "quantity" => 1
                ];
            }
          }

        session()->put('cart', $cart);
        Session::put('flash_message', 'Product successfully added!');
        return redirect()->back();
    }

    public function removecart(Request $request){
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function productdetails($id){   
        $productdetails = Product::findOrFail($id);
        return view('website.product-details', compact('productdetails'));
    }

    public function checkout(){
        $cart = session()->get('cart', []);
        $user = auth()->user();
        if ($user) {
        return view('website.checkout', compact('cart', 'user'));
        }else{
         return view('website.home');
        }
    }

    public function getcategory($categoriess) {
        $categoriess = ProductCategory::find($categoriess);
        return view('website.category', ['categoriess' => $categoriess]);
    }

    public function payorderplace(){
       

    }
}