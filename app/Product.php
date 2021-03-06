<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','marca','approved','user_id'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function recipes(){
        return $this->hasMany('App\Recipe');
    }
    /*public function users_pivot(){
        return $this->belongsToMany('App\User','recipes');

    }*/
    public function user_product_votes(){
        return $this->belongsToMany('App\User','users_products_votes')->withTimestamps();
    }
}
