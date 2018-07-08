<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','marca','approved'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    /*public function users_pivot(){
        return $this->belongsToMany('App\User','recipes');

    }*/
}
