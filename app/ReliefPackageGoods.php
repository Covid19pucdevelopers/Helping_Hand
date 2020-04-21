<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReliefPackageGoods extends Model
{
    protected $fillable = [
        'tbl_relief_package_id','tbl_goods_stock_id','quantity','days', 'status', 'is_delete', 'created_by','updated_by',
    ];
}
