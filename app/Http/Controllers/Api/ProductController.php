<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Session;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
//Illuminate\Database\QueryException

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $client = new Client();
        $api_response = 'https://www.dboxstorage.be/wp-json/wp/v2/product?page=3';
        $response = $client->request('GET', $api_response, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());
        echo "<pre>";
         print_r($responseBody);
        echo "<pre>";

        foreach ($responseBody as  $value) {
            $productcat = $value->product_cat[0];
            $prodcateurl = 'https://www.dboxstorage.be/wp-json/wp/v2/product_cat/'.$productcat.'';
            $responsecate = $client->request('GET', $prodcateurl, [
            'verify'  => false,
            ]);
            $responseBodycate = json_decode($responsecate->getBody());
            $prodcatename = $responseBodycate->name;
            
            $featured_media_id   = $value->featured_media;
            $prodimage_url = 'https://www.dboxstorage.be/wp-json/wp/v2/media/'.$featured_media_id.'';
            $responseimg = $client->request('GET', $prodimage_url, [
            'verify'  => false,
            ]);
            $responseBodyimage = json_decode($responseimg->getBody());
            $responseBodyimage->guid->rendered;
                
            $productdb = new Product;
            $productdb->id = $value->id;
            $productdb->name = $value->title->rendered;
            $productdb->slug = $value->slug;
            $productdb->content = $value->content->rendered;
            $productdb->category = $prodcatename;
            $productdb->image = $responseBodyimage->guid->rendered;
            $productdb->date = $value->date;
            $productdb->save();
            
            /*$image = $productdb->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/product/', $image_new_name);
            $post->image = '/storage/product/' . $image_new_name;*/

        }
       //return view('product.index', compact('products'));

    }

    public function store(request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id'    => 'required|string',
                'title'    => 'required|string',
                'slug' => 'required|string',
                'content'    => 'required|string',
                'image'    => 'required|string',
                'date'    => 'string',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }


        $obj = new Product();
        
        $obj->id=$request->id;
        $obj->title=$request->title;
        $obj->slug=$request->slug;
        $obj->content=$request->content;
        $obj->image=$request->image;
        $obj->date=$request->date;
        $obj->save();
        
        return response()->json([
            'status' => true,
            'products' => $obj
        ]);

    }
        
}
