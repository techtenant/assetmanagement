<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //

    protected $fillable = [
        'name','category_id','serial_number'
    ];


}
