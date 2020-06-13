<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodRelative extends Model
{
    protected $fillable = [
        'user_id', 'relationship', 'dmw_token',
    ];

}
