<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Student as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Oldschool extends Model
{
    use HasFactory;
    protected $table = 'old_school';
    // protected $connection = 'secondary';
    protected $fillable =['id',
    'appli_id',
    'from_year',
    'to_year',
    'from_class',
    'to_class',
    'school_name',
    'country',
    'city',
    'state',
]; 
}