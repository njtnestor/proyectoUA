<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resources\Recipe as RecipeResource;
use App\Http\Resources\Product as ProductResource;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\Product;
use App\Step;


class RecipeController extends Controller
{
    public function index() {
        return RecipeResource::collection(Recipe::get());
    }
    public function show($id){
        return new RecipeResource(Recipe::find($id));
    }
    public function store(Request $request,$id){
        
        $recipe = Recipe::create([
            'image' => $request->input('image'),
            'serving' => $request->input('serving'),
            'product_id' => $id,
            'user_id' => auth()->user()->id,
        ]);
        foreach ($request->input('steps') as $key=>$step) {
            $step= new Step(
                [
                    'step' => $key,
                    'description' =>$step['description']
                ]
            );
            $recipe->steps()->save($step);
        }
        return new RecipeResource($recipe);
        
    }
    public function indexByProductId($id) {
        $recipeRemoveId=Product::find($id)->recipes()->orderBy('rating','desc')->first()->user_id;

        //$recipes=Product::find($id)->recipes()->where('user_id','!=',$recipeRemoveId)->orderBy('rating','desc')->paginate(5); 
        $recipes=Product::find($id)->recipes()->where('user_id','!=',$recipeRemoveId)->orderBy('rating','desc')->paginate(4);
        return RecipeResource::collection($recipes);
    }
    public function indexByUser(){
        return RecipeResource::collection(Recipe::get()->where('user_id',auth()->user()->id));
    }
    public function showOutstanding($id) {
        $recipes=Product::find($id)->recipes()->orderBy('rating','desc')->first();      
        return new RecipeResource($recipes);
    }
}
