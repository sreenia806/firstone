<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Outside_training extends Model
{
    protected $fillable = [
        'employee_id',
        'reference_number',
        'order_date',
        'training_details'
    ];
}
