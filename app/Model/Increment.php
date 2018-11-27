<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Increment extends Model
{
    protected $fillable = [
        'employee_id',
        'increment_type',
        'reference_number',
        'sanction_date'
    ];
}
