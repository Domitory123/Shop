@extends('layouts.app')

@section('content')
<a href="{{ URL::previous() }}">&larr; Повернутися до товарів</a>

<div class="card" style="width: 18rem;">
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
    <div class="card-body">
      <h5 class="card-title"><strong>{{$product->name}}</strong></h5>
      <p class="card-text">{{$product->description}}</p>
      <p class="card-text">{{$product->price}}</p>
  
      <form action="{{ route('cart.addToCart') }}" method="post">
        @csrf
        <input style="display:none;" name="product_id" type="text" value="{{$product->id}}" >
        <button type="submit">купити</button>
    </form>
    
    </div>
  </div>

 @endsection