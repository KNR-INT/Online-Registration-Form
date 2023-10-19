<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Student as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable =[
        'image',
        'student_adr',
    'father_aadhar',
    'birth_cer',
    'mother_aadhar',
    'immunization_card'
];

}