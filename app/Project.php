<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_code',
        'project_name',
        'coordinator_name',
        'coordinator_phone',
        'coordinator_cellphone',
        'coordinator_email',
        'location',
        'city',
        'description',
        'partner_id',
        'created_date',
        'end_date',
    ];
}
