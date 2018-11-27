<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Induction extends Model
{
    protected $fillable = [
        'file_number', 'do_number', 'induction_date', 'status', 'created_by'
    ];

    public function employees()
    {
        return $this->belongsToMany('App\Model\Employee')
            ->withTimestamps();
    }
}
