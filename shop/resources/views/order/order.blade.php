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


<div class="pagination">
    {{-- Попередня сторінка --}}
    @if ($orders->onFirstPage())
        <span>&laquo; Попередня</span>
    @else
        <a href="{{ $orders->previousPageUrl() }}">&laquo; Попередня</a>
    @endif

    {{-- Нумерація сторінок --}}
    @for ($i = 1; $i <= $orders->lastPage(); $i++)
<span>_</span>
        <a href="{{ $orders->url($i) }}">{{ $i }}</a>
        <span>_</span>
    @endfor

    {{-- Наступна сторінка --}}
    @if ($orders->hasMorePages())
        <a href="{{ $orders->nextPageUrl() }}">Наступна &raquo;</a>
    @else
        <span>Наступна &raquo;</span>
    @endif
</div>





@endsection
