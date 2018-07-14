<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resources\Recipe as RecipeResource;
use App\Http\Resources\Product as ProductResource;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\Product;


class RecipeController extends Controller
{
    public function index() {
        return RecipeResource::collection(Recipe::get());
    }
    public function indexByProductId($id) {

        $recipes=Product::find($id)->recipes()->paginate(5);
     
        return RecipeResource::collection($recipes);



        /*$recipes = Product::find($id)->recipes;
        return $recipes;*/
    }
}
