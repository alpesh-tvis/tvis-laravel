<?php
namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Session;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Message\Response;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Validator;

class ProductCategoryController extends Controller
{
    public function index()
    {   
        $productscategory = ProductCategory::all();
        return view('admin.productcategory.index',['productscategory'=>$productscategory]);
    }
    public function create(){
        return view('admin.productcategory.create');
    }

    public function show(ProductCategory $productcategory){
         return view('admin.productcategory.show', compact('productcategory'));
    }
    public function edit(ProductCategory $productcategory)
    {   
         return view('admin.productcategory.edit', compact('productcategory'));
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'name' => 'required|unique:posts,title',
            'description' => 'required',
            'image' => 'required',
        ]);
        $productcategory = ProductCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'image' => 'image.jpg',
            'published_at' => Carbon::now(),
        ]);
        

        //$post->tags()->attach($request->tags);

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/productcategory/', $image_new_name);
            $productcategory->image = '/storage/productcategory/' . $image_new_name;
            $productcategory->save();
        }
               
        Session::flash('success', 'Product Category created successfully');
        return redirect()->back();
    }
    public function update(Request $request, $id){

       $productcategoryupdate = ProductCategory::find($id);
        if(!is_null($productcategoryupdate)){
            $productcategoryupdate->name= $request->input('name');
            $productcategoryupdate->description=$request->input('description');
            
            if($request->hasFile('image')){
                $image = $request->image;
                $image_newname = time() . '.' . $image->getClientOriginalExtension();
                $image->move('storage/productcategory/', $image_newname);
                $productcategoryupdate->image = '/storage/productcategory/' . $image_newname;
                $productcategoryupdate->update();
            }
            $productcategoryupdate->update();
            return redirect()->back();
        }else{
            $data = array('msg' => 'The product category, you want to update, does not exist', 'error' => true);
            echo json_encode($data);
        }   
    }

    public function destroy(ProductCategory $productcategory){
       if($productcategory){
            $productcategory->delete();

            Session::flash('success', 'Product category deleted successfully');
            return redirect()->route('productcategory.index');
        }

    }

}
