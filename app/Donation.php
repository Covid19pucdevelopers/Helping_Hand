<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'tbl_user_id','tbl_goods_id', 'status', 'is_delete', 'created_by','updated_by',
    ];
}
