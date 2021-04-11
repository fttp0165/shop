<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    // protected $fillable = ['user_id'];
    protected $guarded=[''];
    private $rate=1;

    public function cartItems()
    {
     return $this->hasMany(CartItem::class);
    }

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    //belongesTo Cart
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function checkout(){


        foreach($this->cartItems as $cartItem ){
          $product=$cartItem->product;
          if(!$product->checkQuantity($cartItem->quantity)){
              return $product->name.'數量不足';
          }
        }
       
        //create order
        $order=$this->order()->create([
            'user_id'=> $this->user_id
        ]);
        //if member level equal 2 discount 20% off
        if($this->user->level == 2){
            $this->rate=0.8;
        }
   
        //check every item in cart and add in orderitem
        foreach($this->cartItems as $cartItem ){
            $order->orderItems()->create([
                'product_id'=>$cartItem->product_id,
                'price' => $cartItem->product->price * $this->rate
            ]);
            $currProductQuan=$cartItem->product->quantity - $cartItem->quantity;
            $cartItem->product->update(['quantity'=>$currProductQuan]);
        }

        //setting the order is checkout
        $this->update(['checkouted' => true]);

        //add orderItem in order
        $order->orderItems;

        return $order;
    }
}
