@extends('layouts.backend.app')

@section('content')
<div class="row">
  <div class="col-6">
      <img src="{{$product->imageUrl }}" alt="">
  </div>
  <div class="col-6">
     <table class="table table-hover">
        <tr>
          <td>產品名稱:</td>
          <td>{{$product->name}}</td>
        </tr>
        <tr>
          <td>產品描述:</td>
          <td>{{$product->descript}}</td>
        </tr>
        <tr>
          <td>產品價格:</td>
          <td>{{$product->price}}</td>
        </tr>
    </table>
  </div>
  <a type="button" href="{{route('products.index')}}" class="btn btn-outline-secondary  "> 返回</a>
</div>
@endsection