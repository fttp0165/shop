
@extends('layouts.app')
@section('content')
<h1>編輯產品</h1>

<form action="{{route('products.update',['product' => $product->id])}}" method="post" class="form-horizontal">
  @csrf
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <label for="name">產品名稱：</label>
      <input type="text" name="name" value="{{$product->name}}" /><br />
    </li>
    <li class="list-group-item">
      <div style="margin-top:20px; ">
        <label for="descript">產品描述：</label>
        <textarea type="text" name="descript" value="" style="height: 50px;margin-top:40px; width:150px;">
        {{$product->descript}}
        </textarea>
      </div>
    </li>
    <li class="list-group-item">
      <label for="price">Price:</label>
      <input type="text" value="{{$product->price}}" name="price" />
    </li>
    <li class="list-group-item">
      <label for="imageUrl">產品照片：</label>
      <input type="file" name="imageUrl" />
    </li>
    <li class="list-group-item">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit " class="btn btn-outline-success me-md-2"> 提交</button>
        <a type="button" href="{{route('products.index')}}" class="btn btn-outline-secondary  "> 返回</a>
      </div>
    </li>
</form>


@endsection