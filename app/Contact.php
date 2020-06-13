<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'user_id', 'type', 'email',
        'phone_1', 'phone_2', 'region',
        'district', 'ward', 'street',
    ];

}
