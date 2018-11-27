<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'employee_id',
        'designation_id',
        'promotion_type',
        'reference_number',
        'order_date',
        'from_date',
        'to_date'
    ];

//    protected $appends = ['designation_name'];

    public function designation()
    {
        return $this->belongsTo('App\Model\Designation');
    }
}
