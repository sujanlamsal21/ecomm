<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table='like';

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
