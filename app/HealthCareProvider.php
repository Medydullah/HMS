<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class HealthCareProvider extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'facility_name', 'facility_type', 'facility_registration_number',
        'phone_1', 'phone_2',
        'region', 'district', 'ward',

        'full_name', 'job_position', 'employee_id_number',

        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        '', 'remember_token',
    ];
}



