<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user=auth()->user();
        $cart=Cart::get()->where('user_id',$user->id)
                         ->firstOrCreate(['user_id'=>$user->id]);
    
        // $cartItem=CartItem::get()->Where('cart_id',$cart[0]->id);
        // $cart=collect($cart);
        // $cart['items']=collect($cartItem);
        return response($cart);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user_id=$request['user_id'];
        $cart=new Cart;
        $cart->create(['user_id'=>$user_id]);
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkout(){
        $user=auth()->user();
        $cart=$user->carts()->where('checkouted',false)->with('cartItems')->first();
        if($cart){
            $result=$cart->checkout();
            return response($result);
        }else{
            return response('沒有購物車',400);
        }
    }
}
