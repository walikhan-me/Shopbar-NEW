<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_name',
        'user_email',
        'product_name',
        'product_price',
        'paymnet_status',
        'user_id',
        
    ];
    use HasFactory;

  
}
