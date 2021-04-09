<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];
    protected $guarded=[''];
    public function cartItems()
    {
     return $this->hasMany(CartItem::class);
    }

    public function user()
    {
     return $this->belongesTo(User::class);
    }
    //belongesTo Cart
    public function order()
    {
     return $this->hasMany(Order::class);
    }
}
