<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';
    public $timestamps = false;
    public $guarded = [];


    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function mark(){
        return $this->belongsTo('App\Mark', 'mark_id');
    }
}
