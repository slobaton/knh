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
        // 'city',
        'photo'
    ];

    public function partner()
    {
        $this->belongsTo('App\Partner', 'partner_id');
    }
}
