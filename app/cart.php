<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public $table = 'carts';
    public $timestamps = false;
    public $guarded = [];
}
