<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'position',
        'cellphone',
        'phone',
        'location',
        'partner_id',
        'photo'
    ];
}
