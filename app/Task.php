<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name','details', 'status', 'is_delete', 'created_by','updated_by',
    ];
}
