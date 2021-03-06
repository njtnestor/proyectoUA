<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Recipe as RecipeResource;

class Product extends JsonResource
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
            'name' => $this->name,
            'marca' => $this->marca,
            'approved' => $this->approved,
            'votes_p' => $this->votes_p,
            'votes_n' => $this->votes_n,
            'rating' => $this->rating,        
            'recipes' => RecipeResource::collection($this->whenLoaded('recipes'))
        ];
    }
}
