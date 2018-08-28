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

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'API\AuthController@logout');
    Route::get('/get-user', 'API\AuthController@getUser');
    Route::resource('products', 'API\ProductController');
    Route::post('/products/{id}/recipes','API\RecipeController@store');
    Route::get('/productsByUser','API\ProductController@indexByUser');
    Route::get('/recipesByUser','API\RecipeController@indexByUser');
    Route::get('/productsByNotApproved','API\ProductController@indexByNotApproved');
    Route::post('/recipes/{id}/comments','API\CommentController@store');
    Route::post('/products/{id}/voteup','API\ProductController@voteup');
    Route::post('/products/{id}/votedown','API\ProductController@votedown');
});
Route::resource('products', 'API\ProductController')->only([
    'index', 'show'
]);

Route::get('/productsApproved', 'API\ProductController@indexApproved');
Route::resource('recipes', 'API\RecipeController')->only([
    'index', 'show'
]);
Route::get('products/{id}/recipes','API\RecipeController@indexByProductId');//no incluye el mejor/recomendado/outstanding
Route::get('products/{id}/recipes/outstanding','API\RecipeController@showOutstanding');

//Route::get('/recipes/{id}/comments', 'API\ProductController');