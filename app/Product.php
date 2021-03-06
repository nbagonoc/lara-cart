<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'status', 'category', 'description', 'imgPath'
    ];

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
