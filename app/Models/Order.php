<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_client',
        'delivery_time',
        'status',
        'price',
        'restaurant_id',
        'dish_id'
    ];
}
