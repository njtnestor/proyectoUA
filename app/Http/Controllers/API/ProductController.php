<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use App\Http\Controllers\Controller;
use App\Product;
//use App\Http\Controllers\API\AuthController;

use App\User;
use DB;
use Hash;

class ProductController extends Controller
{
    public function index() {
        return ProductResource::collection(Product::get());
    }
    public function indexApproved(){
      return ProductResource::collection(Product::get()->where('approved',1));
    }
    public function show($id){
      return new ProductResource(Product::find($id)->load('recipes'));
     //return Product::find($id)
    }
    public function indexByUser(){
      return ProductResource::collection(Product::get()->where('user_id',auth()->user()->id));
    }
  
    public function indexByNotApproved(){

      $id=auth()->user()->id;
      
      $products = Product::with('user_product_votes')->whereDoesntHave('user_product_votes', function($query) use ($id) {
        $query->where('user_id', $id);
      })->get();

      return ProductResource::collection($products->where('approved','=',0));
      //return ProductResource::collection(Product::get()->where('approved','=',0));
    }
    public function store(Request $request)
    {
      $product = Product::create([
        'name' => request('name'),
        'marca' => request('marca'),
        'approved' => false,
        'user_id' => auth()->user()->id
      ]);

      return new ProductResource($product);
    }
    public function voteup(Request $request,$id){
      $product = Product::find($id);
      $product->votes_p = $product->votes_p + 1;
      $product->save();
      $product->user_product_votes()->attach(auth()->user()->id);
      return new ProductResource($product);
    }
    public function votedown(Request $request,$id){
      $product = Product::find($id);
      $product->votes_p = $product->votes_n + 1;
      $product->save();
      $product->user_product_votes()->attach(auth()->user()->id);
      return new ProductResource($product);
    }
    public function prueba()
    {
      return auth()->user();
    }
}
