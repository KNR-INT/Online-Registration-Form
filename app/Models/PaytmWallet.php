<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaytmWallet extends Model
{
    use HasFactory;
    
    protected $table = 'payment';
    protected $fillable = [
        'id',		
		'txn_id',	
		'order_id',	
		'user_id',	
		'mobile_no',	
		'txn_amount',	
		'status',	
		'txn_date',		
		'bank_name',	
		'appli_id'
    ];
}