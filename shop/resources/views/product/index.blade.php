@extends('layouts.app')

@section('content')

<h1>Товари</h1>

  @foreach($products as $product)
  
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
          
          <a href="{{ route('product.show', $product)}}">переглянути</a>
          </div>
        </div>
<br>
   @endforeach 

   <div class="pagination">
    {{-- Попередня сторінка --}}
    @if ($products->onFirstPage())
        <span>&laquo; Попередня</span>
    @else
        <a href="{{ $products->previousPageUrl() }}">&laquo; Попередня</a>
    @endif

    {{-- Нумерація сторінок --}}
    @for ($i = 1; $i <= $products->lastPage(); $i++)
<span>_</span>
        <a href="{{ $products->url($i) }}">{{ $i }}</a>
        <span>_</span>
    @endfor

    {{-- Наступна сторінка --}}
    @if ($products->hasMorePages())
        <a href="{{ $products->nextPageUrl() }}">Наступна &raquo;</a>
    @else
        <span>Наступна &raquo;</span>
    @endif
</div>




@endsection


