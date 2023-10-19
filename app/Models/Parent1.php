<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Parent1 as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Parent1 extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable =['father_name',
    'father_mob',
    'father_email_verified_at',
    'father_mother_tongue',
    'father_residential_address',
    'father_area',
    'father_district',
    'father_state',
    'father_country',
    'father_pincode',
    'father_residential_no',
    'father_organization',
    'father_company',
    'father_designation',
    'father_company_address',
    'father_office_number',
    'father_annual_income',
    'mother_name',
    'mother_mob',
    'mother_email_verified_at',
    'mother_mother_tongue',
    'mother_residential_address	',
    'mother_area',
    'mother_district',
    'mother_state',
    'mother_country',
    'mother_pincode',
    'mother_residential_no',
    'mother_organization',
    'mother_company',
    'mother_designation',
    'mother_company_address',
    'mother_office_number',
    'mother_annual_income',
];
   
}