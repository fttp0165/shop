<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[''];
     //hasMany orderItems
    public function orderItems()
    {
     return $this->hasMany(OrderItem::class);
    }
    //belongesTo User
    public function user()
    {
     return $this->belongesTo(User::class);
    }
    //belongesTo Cart
    public function cart()
    {
     return $this->belongesTo(Cart::class);
    }
}
