<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'description',
        'deadline',
        'price_discount',
        'shop_id',
  
  
    ];
}
