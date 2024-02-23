@extends('layouts.app')

@section('content')

<h1>Видалити цей товар?</h1>
<form action="{{ route('product.destroy', ['product' => $product]) }}"   method="POST" enctype="multipart/form-data">
  @csrf
  @method('DELETE')
     
  <div class="card-body">
    <h5 class="card-title"><strong>{{$product->name}}</strong></h5>
    <p class="card-text">{{$product->description}}</p>
    <p class="card-text">{{$product->price}}</p>
  </div>

  <input  class="inputSubmit" type="submit" value="видалити">
</form>
 @endsection