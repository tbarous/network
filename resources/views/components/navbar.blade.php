<nav class="navbar navbar-expand-md">
    <div class="container">
        <a class="navbar-brand text-dark" href="{{ url('/') }}">
            Social Network for Developers
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>

            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-rounded btn-outline-primary waves-effect mr-0" href="{{ route('login') }}">Login</a>
                    </li>

                    @if (Route::has('register'))
                        <li class="nav-item ml-3">
                            <a class="nav-link btn btn-outline-primary waves-effect mr-0" href="{{ route('register') }}">Join</a>
                        </li>
                    @endif
                @else
                    <li>
                        @include('components.search')
                    </li>

                    <li class="nav-item dropdown d-flex align-items-center ml-5">
                        @if(count(auth()->user()->notifications) == 0)
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell-o"></i>
                            </a>
                        @else
                            <a id="navbarDropdown1" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell notification"></i>
                            </a>
                        @endif

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            @foreach(auth()->user()->notifications as $notification)
                                @if($notification->type == 'friend_request')
                                    <a class="dropdown-item" href="/connections">
                                        {{$notification->title}}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item dropdown d-flex align-items-center ml-5">
                        <a id="navbarDropdown2" class="nav-link dropdown-toggle font-weight-bold" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
                            <a class="dropdown-item" href="/profile">Profile</a>
                            <a class="dropdown-item" href="/connections">Connections</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
