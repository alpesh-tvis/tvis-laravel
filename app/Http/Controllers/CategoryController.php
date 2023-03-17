<?php

namespace App\Http\Controllers;

use Session;
use App\Category;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = Category::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {   
        $category = Category::all();
        return view('admin.category.create',  compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'    => 'required|string',
                'description' => 'required|string',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        $postcategory = new Category();
        $postcategory->id=$request->id;
        $postcategory->name=$request->name;
        $postcategory->slug=Str::slug($request->name);
        $postcategory->description=$request->description;
        
        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/category/', $image_new_name);
            $postcategory->image = '/storage/category/' . $image_new_name;
            $postcategory->save();
        }
        $postcategory->save();

        Session::flash('success', 'Category created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoryupdate = Category::find($id);
        if(!is_null($categoryupdate)){
            $categoryupdate->name= $request->input('name');
            $categoryupdate->description=$request->input('description');
            
            if($request->hasFile('image')){
                $image = $request->image;
                $image_newname = time() . '.' . $image->getClientOriginalExtension();
                $image->move('storage/category/', $image_newname);
                $categoryupdate->image = '/storage/category/' . $image_newname;
                $categoryupdate->update();
            }
            $categoryupdate->update();
            return redirect()->back();
        }else{
            $data = array('msg' => 'The category, you want to update, does not exist', 'error' => true);
            echo json_encode($data);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category){
            $category->delete();

            Session::flash('success', 'Category deleted successfully');
            return redirect()->route('category.index');
        }
    }
}
