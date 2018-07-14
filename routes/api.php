<?php

use Illuminate\Http\Request;

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

Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');
Route::get('/users','API\AuthController@index');
/*Route::apiResources([
    'products' => 'ProductController'
]);*/


//Route::get('/products', 'ProductController@index');
//Route::post('/products','ProductController@store');
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'API\AuthController@logout');
    Route::get('/get-user', 'API\AuthController@getUser');
   // Route::get('/prueba', 'API\ProductController@prueba');
    Route::resource('products', 'API\ProductController');
});
Route::resource('products', 'API\ProductController')->only([
    'index', 'show'
]);
Route::resource('recipes', 'API\RecipeController')->only([
    'index'
]);
Route::get('products/{id}/recipes','API\RecipeController@indexByProductId');