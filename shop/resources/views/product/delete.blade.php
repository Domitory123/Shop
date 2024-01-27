@extends('app')

@section('content')

 <div class="blockOneNews">
  {{-- зробити через форму --}}
    <h1>Видалити  {{$product->name}} ?</h1>
    </div> 
    <div class="text"> 
               </div>  
               <a href="\" >назад</a>
               <a href="{{route('product.destroy',$merch) }}" >видалити</a>
      </div>
  </div>
</div>
     
 @endsection