<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>E-shop</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <title>e-shop</title>

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <script>
    const breakdownUrl = "{{route('i_index')}}";
  </script>

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div id="app" class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-header">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('index')}}">
          <img src="<?= asset('item/bg.jpeg') ?>" alt="Logo" width="30" class="d-inline-block align-text-top" />
          E-shop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('index')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{route('list')}}">All items</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
          <div class="header-icons">
            @if(session('cart') == null)
            <a href="{{ route('cart') }}" class="btn btn-light btn-block"><i class="fa fa-shopping-cart"
                aria-hidden="true"></i> Cart 0</span></a>
            @else
            @php $totals = 0 @endphp
            @foreach(session('cart') as $id => $details)
            @php $totals += $details['quantity'];
            @endphp
            @endforeach
            <a href="{{ route('cart') }}" class="btn btn-light btn-block"><i class="fa fa-shopping-cart"
                aria-hidden="true"></i> Cart {{ $totals }}</span></a>
            @endif
          </div>

          
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item mt-2">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif
            @if (Route::has('register'))
            <li class="nav-item mt-2">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            @if(Auth::user()->role >=10)
            <a class="nav-link mt-2" href="{{ route('a_index') }}">
              Admin Dashboard
            </a>
            @endif
            <li class="nav-item dropdown mt-2">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-end col-2 " aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <a class="dropdown-item" href="{{ route('o_index') }}">
                  Orders
                </a>
                <a class="dropdown-item" href="{{ route('ua_index') }}">
                  Info
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

  @if(Session::has('ok'))
  <div class="bg-foto">
    <div class="row justify-content-center" style="width: 100%">
      <div class="col-6 m-4">
        <div class="alert alert-success">
          {{Session::get('ok')}}
        </div>
      </div>
    </div>
  </div>
  @endif

  @if(Session::has('not'))
  <div class="bg-foto">
    <div class="row justify-content-center" style="width: 100%">
      <div class="col-6 m-4">
        <div class="alert alert-danger">
          {{Session::get('not')}}
        </div>
      </div>
    </div>
  </div>
  @endif

  <div class="bg-foto">

    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    @yield('content')

  </div>
  <footer>
    @include('layouts.footer')
  </footer>

  @yield('scripts')
</body>
</html>