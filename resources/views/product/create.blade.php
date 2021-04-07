<h1>新增產品</h1>

@extends('layouts.app')
@section('content')
<form action="/products" method="post" class="form-horizontal">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <label for="name">產品名稱：</label>
      <input type="text" name="name" /><br />
    </li>
    <li class="list-group-item">
      <div style="margin-top:20px; ">
        <label for="descript">產品描述：</label>
        <textarea type="text" name="descript" style="height: 50px;margin-top:40px; width:150px;">
      </textarea>
      </div>
    </li>
    <li class="list-group-item">
      <label for="price">Price:</label>
      <input type="text" name="price" />
    </li>
    <li class="list-group-item">
      <label for="imageUrl">產品照片：</label>
      <input type="file" name="imageUrl" />
    </li>
    <li class="list-group-item">
      <button type="submit " class="btn btn-outline-success"> 提交</button>
    </li>
</form>


@endsection