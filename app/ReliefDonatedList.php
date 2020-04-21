<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReliefDonatedList extends Model
{
    protected $fillable = [
        'tbl_recipient_user_id','tbl_user_id','tbl_relief_package_goods_id','date',
        'status', 'is_delete', 'created_by','updated_by',
    ];
}
