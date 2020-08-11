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
        'drug_id', 'drug_name','price','expire_date', 'box_no', 'packet_no',
        'stock_no', 'employment_id',
        'employment_name', 'total_drug','stock_date',
    ];

}
