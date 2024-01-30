@extends('layouts.app')

@section('content')

<h1>Замовлення</h1> 

@foreach($orders as $order)

<h3>статус: {{$order->status}}</h3>

    @foreach($order->products as $product)

    <div class="card" style="width: 18rem;">
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
    <div class="card-body">
        <h5 class="card-title"><strong>{{$product->name}}</strong></h5>
        <p class="card-text">{{$product->description}}</p>
        <p class="card-text">{{$product->price}}</p>
    
    </div>
    </div>
    <br>
    @endforeach 
@endforeach 



@endsection
