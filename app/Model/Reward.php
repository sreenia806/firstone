<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = [
        'employee_id',
        'reward_type',
        'reference_number',
        'sanction_date',
        'reward_details'
    ];
}
