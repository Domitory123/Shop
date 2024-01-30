@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3><b>Товар</b></h3>
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
        </div>
        <div class="col-md-6">
            <h3><b>Дані для замовлення </b></h3>
            <form action="{{ route('order') }}"  method="post" enctype="multipart/form-data">
                {{ csrf_field() }}	
        
                  <label for="name_user"> Ім'я</label><br/>
                  <input class="inputText"  name="name_user" type="text">
                  <br/>
        
                  <label for="delivery_address">Адреса доставки</label><br/>
                  <input class="inputText"  name="delivery_address" type="text">
                  <br/>      
                 
                  <label for="email">Електронна пошта</label><br/>
                  @if (Auth::check())
                        <input class="inputText" name="email" type="email" value="{{ Auth::user()->email }}">
                    @else
                        <input class="inputText" name="email" type="email" >
                    @endif
                  <br/>   
        
                  <label for="phone">Номер телефону</label><br/>
                  <input class="inputText"  name="phone" type="text">
                  <br/> 
        
                  <label for="comment">Коментар до замовлення</label> <br/>
                  <textarea name="comment" cols="28"  rows="5" ></textarea><br/>
                 
                  <input class="btn btn-primary"  type="submit" value="Оформити">
        
            </form>



        </div>
    </div>
</div>




@endif
 @endsection