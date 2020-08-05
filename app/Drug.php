<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Drug extends Model
{
    //
    use Notifiable;

    use HasRoles;

    protected $guard_name = 'drug';

    protected $fillable = [
        'drug_id',  'drug_name', 'box_no', 'packet_no',
        'stock_no', 'stock_date', 'employment_id',
        'employment_name','packet_no','tablets_no', 'expire_date',
    ];

}
