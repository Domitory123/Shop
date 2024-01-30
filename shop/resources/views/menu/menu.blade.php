
{{-- <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
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

          @if (auth()->check()&& auth()->user()->isAdmin())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin') }}">Адмінка</a>
          </li>
          @endif
    
          @if (auth()->check())
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
  </nav > --}}

  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                  
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('product.index')}}">Товари</a>
                  </li>

                  @if (auth()->check()&& auth()->user()->isAdmin())
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}">Адмінка</a>
                  </li>
                  @endif
            
                  @if (auth()->check())
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('order.show') }}">замовлення</a>
                  </li>
                  @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('cart.index') }}">корзина</a>
                    </li>
          

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>