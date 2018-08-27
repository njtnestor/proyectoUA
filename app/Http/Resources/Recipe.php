<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Step as StepResource;
use App\Http\Resources\Ingredient as IngredientResource;
use App\Http\Resources\Comment as CommentResource;

class Recipe extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'serving' => $this->serving,
            'image' => $this->image,
            'description' => $this->description,
            'votes_p' => $this->votes_p,
            'votes_n' => $this->votes_n,
            'rating' => $this->rating,
            'user'=> new UserResource($this->user),
            'product'=> new ProductResource($this->product),
            'steps' => StepResource::collection($this->steps),
            'ingredients' => IngredientResource::collection($this->ingredients),
            'comments' => CommentResource::collection($this->comments),
            //'product_id' => $this->product_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
