<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relief extends Model
{
    protected $fillable = [
        'division_id','district_id', 'area_id', 'address', 'nid', 'members_in_family', 'earning_members', 'image',
            'lat', 'long', 'contact_no', 'date_given', 'given_by', 'given_to',
    ];
}
