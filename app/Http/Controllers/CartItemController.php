<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCartItem;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;
class CartItemController extends Controller
{
    //
    public function store(Request $request){

      $messages=['required'=>':attribute 是必要的','integer'=>':attribute 必須是整數'];
      $validator=Validator::make($request->all(),[
          'product_id'=>'required',
          'cart_id'=>'required',
          'quantity'=>'required|integer'
      ],$messages);
      if($validator->fails()){
          return response($validator->errors(),400);
      }
      $validatedDae=$validator->validate();
      $cart=Cart::find($validatedDae['cart_id']);
      $cart_item=$cart->cartItems()->create(['product_id'=>$validatedDae["product_id"],
                                   'quantity'=>$validatedDae["quantity"]]);
       dd($cart_item);
      return response()->json(true);

    }

    public function update(UpdateCartItem $request,$id){

        $form =$request->validated();
        CartItem::find($id)->update([
            'quantity'=>$form["quantity"],
            'updated_at'=>now()
        ]);
        return response()->json(true);
    }

    public function destroy($id){

        $cartItem=CartItem::find($id);
        $cartItem->delete();
        return response()->json(true);

    }

}
