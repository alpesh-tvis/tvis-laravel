<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductCategory;
use Session;
use GuzzleHttp\Client;

use GuzzleHttp\Message\Response;
use Illuminate\Support\Facades\Validator;


class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $client = new Client();
        $api_response_category = 'https://www.dboxstorage.be/wp-json/wp/v2/product_cat?page=3';
        $responsecategory = $client->request('GET', $api_response_category, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($responsecategory->getBody());
        die();
        foreach ($responseBody as  $value) {
            $productdb = new ProductCategory;
            $productdb->product_id = $value->id;
            $productdb->name = $value->name;
            $productdb->slug = $value->slug;
            $productdb->description = $value->description;
            //$productdb->image = $value->image;
            $productdb->save();
            
        }
        return response()->json([
            'status' => true
        ]);

    }
    

}
