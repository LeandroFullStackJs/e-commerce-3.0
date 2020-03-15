<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $table = 'admins';
    public $timestamps = false;
    public $guarded = [];
}
