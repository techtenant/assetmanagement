<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetUser extends Model
{
    //

    protected $table = 'asset_user';

    protected $fillable = ['asset_id','user_id','from_date','to_date','department_id'];
}
