<div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-primary">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    {{ config('app.name', 'CPIC') }}
                </a>
                <a class="navbar-brand" href="{{ url('/chat/index') }}">
                    <i class="fas fa-comments text-light"></i>
                </a>
                <a class="navbar-brand" href="{{ url('/event/index') }}">
                    <i class="fas fa-users text-light"></i>
                </a>
                <a class="navbar-brand" href="{{ url('/setting/index') }}">
                    <i class="fas fa-cog text-light"></i>
                </a>
                <ul class="navbar-nav ml-auto ">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録画面') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>