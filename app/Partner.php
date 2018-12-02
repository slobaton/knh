<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';

    protected $fillable = [
        'partner_name',
        'partner_email',
        'partner_phone',
        'partner_location',
        'partner_city',
        'partner_photo',
    ];
}
