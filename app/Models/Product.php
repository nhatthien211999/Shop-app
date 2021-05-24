<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'status',
        'sale',
        'name',
        'description',
        'image',
        'promotion_id',
        'total_sold',
        'menu_id',

    ];
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function cartDetail(){
        return $this->hasMany(CartDetail::class);
    }
    public function orderDetail(){
        return $this->hasMany(OrderDetail::class);
    }
    public function promotion(){}

}
