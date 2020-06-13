<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'visit_id', 'encounter_code', 'description',
        'text_1', 'text_2', 'text_3',
    ];
}
