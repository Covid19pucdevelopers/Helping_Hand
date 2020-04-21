<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','is_nid','is_phone', 'status', 'is_delete', 'created_by','updated_by',
    ];
}
