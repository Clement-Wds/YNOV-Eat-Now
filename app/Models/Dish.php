<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'photo',
        'name',
        'price',
        
    ];
}

