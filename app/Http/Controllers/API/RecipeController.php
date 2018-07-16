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
        $recipeRemoveId=Product::find($id)->recipes()->orderBy('rating','desc')->first()->user_id;

        //$recipes=Product::find($id)->recipes()->where('user_id','!=',$recipeRemoveId)->orderBy('rating','desc')->paginate(5); 
        $recipes=Product::find($id)->recipes()->where('user_id','!=',$recipeRemoveId)->orderBy('rating','desc')->paginate(4);
        return RecipeResource::collection($recipes);
    }
    public function showOutstanding($id) {
        $recipes=Product::find($id)->recipes()->orderBy('rating','desc')->first();      
        return new RecipeResource($recipes);
    }
}
