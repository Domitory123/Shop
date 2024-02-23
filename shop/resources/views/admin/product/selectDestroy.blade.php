@extends('layouts.app')

@section('content')

 <div class="blockOneNews">

    <h1>вибір товару для видалення</h1>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          Оберіть товар
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          @foreach($products as $product)
              <a class="dropdown-item" href="{{ route('product.showDestroy', $product) }}">{{ $product->name }}</a>
          @endforeach
      </div>
  </div>
  
  

 
</div>
     
 @endsection