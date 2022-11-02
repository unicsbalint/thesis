@if(Auth::user())
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    <img style="width: 3rem;" src="{{asset('images/logo.png')}}" alt="CSB Cloud" class="menuWrapper">
                </a>
                <div>{{$data["sensorData"]}}</div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if(Request::path() != 'home')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('devices') }}">
                                    Eszközök
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cloud') }}">
                                    Cloud
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('statistics') }}">
                                    Statisztika
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('settings') }}">
                                    Beállítások
                                </a>
                            </li>
                        @endif
                    </ul>
                        
                    </li>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
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
                                    <a class="dropdown-item" href="{{ route('settings') }}">
                                        Beállítások
                                    </a>
                                    <a class="dropdown-item" href="{{ route('statistics') }}">
                                        Statisztika
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Kijelentkezés') }}
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
    @endif