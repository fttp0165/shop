<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;


class ProductController extends Controller
{
    //index
    public function index(){
     //firstOrCreate(); 沒有資料自動產生一筆
    //$products=Product::firstOrCreate();
     $products=Product::all();
        return view('product.index',['products'=>$products]);
    }

    public function create(){
        return view('product.create');
    }



    public function store(Request $request){

        $messages=['required'=>'attribute 是必要的','integer'=>'attribute 必須是整數'];
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'descript'=>'required',
            'price'=>'required|integer',
            'imageUrl'=>'required'
        ],$messages);

        if($validator->fails()){
            return response($validator->errors(),400);
        }
        // $form=$request->all();
        $validateData=$validator->validate();
        // dd($validateData);
        $result=Product::create(['name'=>$validateData['name'],
        'descript'=>$validateData['descript'],
        'price'=>$validateData['price'],
        'imageUrl'=>$validateData['imageUrl']]);
         return response()->JSON($result);
      
    }

    public function update(Request $request,$id){
        $form=$request->all();
        $product=Product::find('id',$id);
        $product->fill([
            'name'=>$form['name'],
            'descript'=>$form['descript'],
            'price'=>$form['price'],
            'imageUrl'=>$form['imageUrl'],
            'updated_at'=>now()
        ]);
        $product->save();
        return response()->JSON(true);
    }

    public function destroy($id){
        $product=Product::find('id',$id);
        $product->delete();
        return response()->JSON(true);
    }


    function get_product(){
        return [
            [
              "id"=>1,
              "name"=>"Orange",
              "price"=>15
            ],
            [
              "id"=>2,
              'name'=>"Apple",
              'price'=>45,
              "imageUrl" => asset( "images/apple.jpeg")
              ]
        ];
    }

  
}




