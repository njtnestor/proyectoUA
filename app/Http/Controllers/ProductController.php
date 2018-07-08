<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use App\Product;

class ProductController extends Controller
{
    public function index() {
        return ProductResource::collection(Product::get());
    }

    public function store(Request $request)
    {
      $product = Product::create([
        'name' => request('name'),
        'marca' => request('marca'),
        'approved' => true,
      ]);

      return new ProductResource($product);
    }
}
