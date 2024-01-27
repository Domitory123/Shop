@extends('app')

@section('content')

<h1>Корзина</h1> 

@if(!is_null($cart))

    @foreach($cart->products as $product)
        <div class="card" style="width: 18rem;">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
            <h5 class="card-title"><strong>{{$product->name}}</strong></h5>
            <p class="card-text">{{$product->description}}</p>
            <p class="card-text">{{$product->price}}</p>
            <p class="card-text">кількість {{$product->pivot->quantity}}</p>
        </div>
        </div>
        <br>

    @endforeach 
   
  <a href="{{ route('buy') }}"  class="btn btn-primary" >оформити</a>
@else
<h3>корзина порожня</h3>
@endif




@endsection
