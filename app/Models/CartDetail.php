<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'quantity',
        'total',
        'user_id',
    ];
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
