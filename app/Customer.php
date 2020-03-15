<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table = 'users';
    public $timestamps = false;
    public $guarded = [];
}
