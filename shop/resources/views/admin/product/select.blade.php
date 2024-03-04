@extends('layouts.app')

@section('content')

      <div class="container">
        <h2>Список товарів</h2>
        <table class="table table-bordered text-center ">
          <thead>
            <tr>
              <th>ID</th>
              <th>Назва</th>
              <th>Ціна</th>
              <th>Категорія</th>
              <th>Опис</th>
              <th>Дія</th>
            </tr>
          </thead>
          <tbody>
          
            @foreach($products as $product)
            <tr>
              <td>{{ $product->id }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->category->name }}</td>
              <td>{{ $product->description }}</td>
              <td>
                <a class="btn btn-primary" href="{{ route('product.edit', $product) }}"> Редагувати </a>
                <a class="btn btn-danger" href="{{ route('product.showDestroy', $product) }}">видалити</a>
              </td>
            </tr>
            @endforeach
          
          </tbody>
        </table>
      </div>



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