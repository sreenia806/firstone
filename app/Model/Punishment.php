<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Punishment extends Model
{
    protected $fillable = [
        'employee_id',
        'punishment_type',
        'reference_number',
        'order_date',
        'punishment_details'
    ];
}
