

@extends('layouts.backend.app')
@section('content')
<h1>產品首頁</h1>
<a href={{route('products.create')}} class="btn btn-outline-success">新增產品</a>
@foreach($products as $product)
<ul class="list-group list-group-flush">
  <li class="list-group-item"><p class="fs-1"> id:{{$product->id}} </p></li>
  <li class="list-group-item"><p class="fs-2"> name:{{$product->name}} </p></li>
  <li class="list-group-item"><img width="520px" height="auto" src={{$product->imageUrl}}> </img></li>
  <li class="list-group-item"><p class="fs-2"> price:{{$product->price}} </p></li>
  <td>
        <form action="{{route('products.destroy',['product' => $product->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark">刪除產品</button>
        </form>
    </td>
    <td>
        <div>
          <a type="button" class="btn btn-outline-secondary" href="{{route('products.edit',['product'=>$product['id']])}}">編輯</a>
        </div>
    </td>
    <td>
        <div>
          <a type="button" class="btn  btn-outline-secondary" href="{{route('products.show',['product'=>$product['id']])}}">SHOW</a>
        </div>
    </td>
</ul>


@endforeach


@endsection