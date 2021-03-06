<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['serving','description','user_id','product_id','image'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function product(){
        return $this->belongsTo('App\Product');
    }
    public function steps(){
        return $this->hasMany('App\Step');
    }
    public function ingredients(){
        return $this->hasMany('App\Ingredient');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
