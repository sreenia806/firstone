<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'employee_number',
        'parent_unit_number',
        'date_of_birth',
        'date_of_appointment',
        'pao_id_number',
        'designation_id',
        'rank_id',
        'nativeunit_id',
        'photo',
        'category',
        'date_of_joining',
        'aadhar_number',
        'pan_number',
        'father_name',
        'marital_status',
        'spouse_name',
        'gh_unit_id',
        'blood_group',
        'caste',
        'community',
        'account_number',
        'bankname',
        'branchname',
        'micrcode',
        'ifsccode',
        'gpf_number',
        'cps_number',
        'tsgli_number',
        'bhadrata_number',
        'qualification',
        'tech_qualification',
        'el_balance',
        'hpl_balance',
        'promotiontype',
        'date_of_promotion',
        'mobile_number',
        'alternate_mobile_number'


    ];



    public function categories()
    {
        return $this->belongsToMany('App\Model\Induction')
            ->withTimestamps();
    }

    public function presentAddress()
    {
        return $this->belongsTo('App\Model\Address', 'present_address_id');
    }

    public function permanentAddress()
    {
        return $this->belongsTo('App\Model\Address', 'permanent_address_id');
    }

    public function designation()
    {
        return $this->hasOne('App\Model\Designation');
    }

    public function rank()
    {
        return $this->belongsTo('App\Model\Rank');
    }

    public function gh_unit()
    {
        return $this->belongsTo('App\Model\Unit');
    }

    public function nativeunit()
    {
        return $this->hasOne('App\Model\Nativeunit');
    }


}
