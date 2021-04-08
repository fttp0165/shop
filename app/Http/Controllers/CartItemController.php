<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;
class CartItemController extends Controller
{
    //
    public function store(Request $request){

      $messages=['required'=>'attribute 是必要的','integer'=>'attribute 必須是整數'];
      $validator=Validator::make($request->all(),[
          'product_id'=>'required',
          'cart_id'=>'required',
          'qantity'=>'required|integer'
      ],$messages);
      if($validator->fails()){
          return response($validator->errors(),400);
      }
      $validatedDae=$validator->validate();
      $cart=Cart::find($validatedDae['cart_id']);
      $cart_item=$cart->cartItems()->create(['product_id'=>$validatedDae["product_id"],
                                   'qantity'=>$validatedDae["qantity"]]);
       dd($cart_item);
      return response()->json(true);

    }

}
