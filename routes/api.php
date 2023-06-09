<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Auth::routes();


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/products/' , [ProductController::class,'index']);
Route::post('productcategory' , [ProductCategoryController::class,'index']);


Route::post('register', 'Api\RegisterController@register');
Route::post('login', 'Api\RegisterController@login');