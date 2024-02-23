@extends('layouts.app')

@section('content')

  <h3>добавлення категорії</h3>
  <hr/>
    <form action="{{ route('category.store') }}"   method="post" enctype="multipart/form-data">
        {{ csrf_field() }}	
        <p>вибір батьківської категорії</p>
         <select name="category"> 
          <option  onselect value="">Без батьківської категорії</option>
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
         
          <input  class="inputSubmit" type="submit" >
    </form>
    <br/> 

@endsection