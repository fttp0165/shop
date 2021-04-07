<h1>產品首頁</h1>

@extends('layouts.app')
@section('content')

@foreach($products as $product)
<ul class="list-group list-group-flush">
  <li class="list-group-item"><p class="fs-1"> id:{{$product->id}} </p></li>
  <li class="list-group-item"><p class="fs-2"> name:{{$product->name}} </p></li>
  <li class="list-group-item"><img width="520px" height="auto" src={{$product->imageUrl}}> </img></li>
  <li class="list-group-item"><p class="fs-2"> price:{{$product->price}} </p></li>
  <td>
        <form action="/product/{{ $product->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE')}}
            <button class="btn btn-dark">刪除產品</button>
        </form>
    </td>
</ul>


@endforeach


@endsection