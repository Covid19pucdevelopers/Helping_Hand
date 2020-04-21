<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $fillable = [
        'name','unit', 'status', 'is_delete', 'created_by','updated_by',
    ];
}
