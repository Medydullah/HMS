<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    protected $fillable = [
        'name', 'code', 'si_unit', 'icon', 'color',
    ];

}
