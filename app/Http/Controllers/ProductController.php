<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

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

    public function edit($id){
        
        $product=Product::where('id',$id)->first();
        return view('product.edit',['product'=>$product]);
    }


    public function show($id ,Request $request){
    
        $product=Product::where('id',$id)->first();
        return view('product.show',['product'=>$product]);
    }



    public function store(Request $request){
        $diskName="product_images";
        $name = $request->file('imageUrl')->getClientOriginalName();
        $path = $request->file('imageUrl')->storeAs(
          '' ,$name, $diskName
        );
        $url=Storage::disk($diskName)->url($path);
        $localPath=public_path(Storage::disk($diskName)->url($path));
        $fullURL=asset(Storage::disk($diskName)->url($path));
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
        'imageUrl'=> $fullURL]);
        redirect("products.index");
      
    }

    public function update(Request $request,$id){
        $product=Product::find($id);
        $validateData= $request -> validate([
            'name'=>['required','string','max:255'],
            'descript'=>['required','string','max:500'],
            'price'=>['required','integer','max:255'],
            'imageUrl'=>[]
        ]);
        $product->save();
        return route("products");
    }

    public function destroy($id){
        $product=Product::find($id);
        $product->delete();
        redirect("products.index");
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




