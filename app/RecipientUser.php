<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipientUser extends Model
{
    protected $fillable = [
        'name', 'email','user_name', 'password', 'tbl_category_id', 'nid', 'birth_date', 'phone', 'address', 'image',
        'family_member','earner_person','request_time','request_status', 'status', 'is_delete', 'created_by', 'updated_by',
    ];
}
