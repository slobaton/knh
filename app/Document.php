<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'type',
        'name',
        'project_id',
        'year',
        'description',
        'files'
    ];

    protected $casts = [
        'shifts' => 'array'
    ];
}
