@extends('layouts.app')

@section('content')

<div class="product">
  <h3>добавлення товару</h3>
  <hr/>

  @if(!$categories->isEmpty())
    <form action="{{ route('product.store') }}"   method="post" enctype="multipart/form-data">
        {{ csrf_field() }}	
        
        <p>Категорія</p>
       <select name="category"> 
        @foreach($categories  as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach 
        </select> 

         <br/>
          <label for="name">Назва</label><br/>
          <input class="inputText" name="name" type="text" value="{{old('name')}}">
          <br/>
           @error('name')
           <b class="text-danger" >{{$message}}</b>
           <br/>
           @enderror
         
           <label for="price">Ціна</label><br/>
           <input class="inputText" name="price" type="number" value="{{old('price')}}">
           <br/>
            @error('price')
            <b class="text-danger" >{{$message}}</b>
            <br/>
            @enderror

          <label for="description">Опис</label> <br/>
          <textarea name="description" cols="28"  rows="5" >{{old('description')}}</textarea> <br/>
          @error('description')
           <b class="text-danger">{{$message}}</b>
           @enderror


           <input  class="inputSubmit" type="submit">
          
    </form>
    <br/> 

@else
<h3>відсутні категорії</h3>

@endif


</div> 

@endsection