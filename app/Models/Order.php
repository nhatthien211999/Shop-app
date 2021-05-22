<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_quantity',
        'address',
        'transport_price',
        'discount',
        'status',
    ];
    public function orderDetail(){
        return $this->hasOne(OrderDetail::class);
    }
    public function user(){
        return $this->belongsToMany(User::class);
    }

}
