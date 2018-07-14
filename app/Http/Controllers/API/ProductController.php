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
    public function show($id){
      return new ProductResource(Product::find($id));
     //return Product::find($id)
    }
    public function store(Request $request)
    {
      $product = Product::create([
        'name' => request('name'),
        'marca' => request('marca'),
        'approved' => true,
        'user_id' => auth()->user()->id
      ]);

      return new ProductResource($product);
    }

    public function prueba()
    {
      return auth()->user();
    }
}
