<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class HealthCareEmployee extends Authenticatable
{

    use Notifiable;

    use HasRoles;

    protected $guard_name = 'health_care_employee';

    protected $fillable = [
        'health_provider_id',  'profession', 'email', 'password',
        'name', 'phone', 'employment_id',
        'qualification', 'specialization',
    ];

    public function files()
    {
      return $this->hasMany(File::class);
    }
}
