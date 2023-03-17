<?php
use Illuminate\Support\Facades\Route;

Auth::routes();
use App\Http\Controllers\Admin\AdminAuthController;
Route::get('/home', 'HomeController@index')->name('home');

// Front End Routes
Route::get('/', 'FrontEndController@home')->name('website');
Route::get('/about', 'FrontEndController@about')->name('website.about');
Route::get('/category/{slug}', 'FrontEndController@category')->name('website.category');
Route::get('/tag/{slug}', 'FrontEndController@tag')->name('website.tag');
Route::get('/contact', 'FrontEndController@contact')->name('website.contact');
Route::get('/post/{slug}', 'FrontEndController@post')->name('website.post');
Route::get('/review-store', 'PostController@reviewstore')->name('review.store');
//Route::get('/shop', 'FrontEndController@shop')->name('website.shop');
//Route::get('/shop', 'ProductController@shop')->name('website.shop');
Route::get('/shop', 'ProductController@shop')->name('website.shop');
Route::get('/checkout', 'ProductController@checkout')->name('website.checkout');
Route::get('/cart', 'ProductController@cart')->name('website.cart');
Route::patch('update-cart', 'ProductController@updatequantity')->name('website.update-cart');
Route::patch('update-carts', 'ProductController@updatequantitydetails')->name('website.update-carts');
    
Route::delete('remove-from-cart', 'ProductController@removecart')->name('remove_from_cart');
Route::get('get-data-by-id', 'ProductController@getdata')->name('get.data.by.id');


Route::get('product-details/{id}', 'ProductController@productdetails')->name('product-details');
//Route::get('product-details/{id}', 'ProductController@relatedproduct')->name('product-details');

Route::get('/categories' , 'ProductController@getcategory')->name('website.categories');

//Route::post('post/{slug}',[PostController::class, 'reviewstore'])->name('review.store');

Route::post('/contact', 'FrontEndController@send_message')->name('website.contact');

//Admin Panel Routes
Route::group(['prefix' => 'admin', 'middleware' => [ 'web','auth']], function () {
    Route::get('/dashboard','DashboardController@index')->name('dashboard');

    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');
    Route::resource('comment', 'ReviewController');
    Route::resource('allposts', 'AllPostController');
    Route::resource('user', 'UserController');
    Route::resource('product', 'ProductController');

    Route::get('search/', 'ProductController@search')->name('search');
    Route::get('admin/product/searchproductitem', 'ProductController@searchproductitem')->name('admin.product.searchproductitem');
    
    Route::get('add-to-cart/{id}', 'ProductController@addtocart')->name('add_to_cart');
    
    Route::resource('productcategory', 'ProductCategoryController');
    Route::resource('role', 'RoleController');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile', 'UserController@profile_update')->name('user.profile.update');
    
    // setting
    Route::get('setting', 'SettingController@edit')->name('setting.index');
    Route::post('setting', 'SettingController@update')->name('setting.update');

    // Contact message
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::get('/contact/show/{id}', 'ContactController@show')->name('contact.show');
    
    Route::delete('/contact/delete/{id}', 'ContactController@destroy')->name('contact.destroy');

    
});

//Test Example
/*Route::get('/user/{id}/{name}', function($id,$name)  
{  
      return "User id is : ". $id ." ,".  "User Name is : ".$name ;  

})->where(['id'=>'[0-9]+', 'name'=>'[a-zA-z]+']); 

Route::get('/user/{id}', function ($id) {
    return $id;
})->where('id', '.*');

Route::get('student/details',function()  
{  
 $url=route('student.details');  
 return $url;  
})->name('student.details');*/  



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
    Route::post('/dashboard', [AdminAuthController::class, 'postDashboard'])->name('admindashboardPost');
    
    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/', function () {
            return view('welcome');
        })->name('adminDashboard');

    });
});

Route::post('/product/search',[ProductController::class,'showproduct'])->name('product.search');
Route::post('/review-store', 'PostController@reviewstore')->name('review.store');

Route::get('alert/{AlertType}','sweetalertController@alert')->name('alert');


