@extends('layouts.app')

@section('content')

<div class="product">
  <h3>редагування товару</h3>
  <hr/>


    <form action="{{ route('product.update', ['product' => $product]) }}"   method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <p>Категорія</p>
      <select name="category_id"> 
        @foreach($categories  as $category)
        <option selected value="{{$product->category->id}}">{{$product->category->name}}</option>
          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach 
      </select> 

         <br/>
          <label for="name">Назва</label><br/>
          <input class="inputText" name="name" type="text" value="{{$product->name}}">
          <br/>
           @error('name')
           <b class="text-danger" >{{$message}}</b>
           <br/>
           @enderror
         
           <label for="price">Ціна</label><br/>
           <input class="inputText" name="price" type="number" value="{{$product->price}}">
           <br/>
            @error('price')
            <b class="text-danger" >{{$message}}</b>
            <br/>
            @enderror

          <label for="description">Опис</label> <br/>
          <textarea name="description" cols="28"  rows="5" >{{$product->description}}</textarea> <br/>

          @error('description')
           <b class="text-danger">{{$message}}</b>
           @enderror

           <input  class="inputSubmit" type="submit" value="редагувати">
          
    </form>
    <br/> 




</div> 

@endsection