<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //白名單 設定的可以改,其他不能改
    //protected $fillable =[''];

    //黑名單 設定的不能改,其他可以改
    protected $guarded =[''];

    //隱藏名單
    //protected $hidden =[''];
    
    //自訂方法
    protected $appends =['current_price'];
    public function getCurrentPriceAttribute()
      {
        return $this->price *0.85;
      }

    //Relation
    
    public function cartItems()
    {
        return $this->hasmany(CartItem::class);
    }

    public function orderItems()
    {
        return $this->hasmany(OrderItem::class);
    }
    
    public function checkQuantity($quantity){

      if($this->quantity < $quantity){
        return false;
      }
      return true;

    }
    
}
