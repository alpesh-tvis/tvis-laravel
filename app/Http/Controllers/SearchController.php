<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function index(){
        return view('search.search');
    }
    public function search(Request $request){
        $search_text = $_GET['text'];
        if ($search_text==NULL) {
        $data= Product::all();
        } else {
        $data=Product::where('name','LIKE', '%'.$search_text.'%')->get();
        }
        return view('results')->with('results',$data);
    }
}
