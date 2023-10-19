<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SecondaryUser;

class Secondary extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'application_fee';
    protected $fillable =['amount',
    'year', 
];
   
}
?>