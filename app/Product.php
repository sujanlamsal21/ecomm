<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Product extends Model
{
    protected $table = 'product';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function rating(){
        return $this->hasMany('App\Rating');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
