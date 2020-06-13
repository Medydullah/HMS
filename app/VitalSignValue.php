<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VitalSignValue extends Model
{
    protected $fillable = [
        'vital_sign_id', 'user_id', 'active',
        'value'
    ];

}
