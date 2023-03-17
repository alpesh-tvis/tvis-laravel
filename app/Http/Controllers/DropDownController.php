<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class DropDownController extends Controller
{
   public function index(){

        $categories = ProductCategory::all();
        $products = Product::all();

        return view('website.dropdown', compact('categories','products'));
    }

    public function getProducts($id){
        if($id!=0){
            $products = ProductCategory::find($id)->products()->select('id', 'name')->get()->toArray();
        }else{
            $products = Product::all()->toArray();
        }
        return response()->json($products);
    }
}
