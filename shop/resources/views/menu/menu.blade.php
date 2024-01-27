
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Головна</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('product.index')}}">Товари</a>
          </li>

          @if (Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin') }}">Адмінка</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('product.create') }}">добавлення товару</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('category.create') }}">добавлення категорії</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('order.show') }}">замовлення</a>
          </li>

          
          @endif

        </ul>
        <span class="navbar-text">
          <a href="{{ route('cart.index') }}">Корзина</a>
         
          @if (!Auth::check())
           <a href="{{ route('getSigin') }}">Увійти</a>
           <a href="{{ route('registration.getSigUp') }}"><b>&nbsp;Зареєструватися.</b></a>
           @else
           <a href="{{ route('logout')}}"> Вихід </a>
          @endif

        </span>
      </div>
    </div>
  </nav >
