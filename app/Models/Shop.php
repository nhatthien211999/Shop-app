<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
  use HasFactory;
  
  protected $fillable = [
    'shop_name',
    'user_id',
    'background',
    'status',
    'address'
  ];
  public function user(){
    return $this->belongsTo(User::class);
  }
  public function menu(){
    return $this->hasMany(Menu::class);
  }


}
