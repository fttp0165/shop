<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded=[''];
     //hasMany orderItems
    public function product()
    {
     return $this->belongesTo(Product::class);
    }
    //belongesTo Order
    public function order()
    {
     return $this->belongesTo(Order::class);
    }

}
