<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'comment_id',
        'user_id',
        'comment',
    ];
    public function product(){
        return $this->belongsToMany(Product::class);
    }
    public function user(){
        return $this->belongsToMany(User::class);
    }
}
