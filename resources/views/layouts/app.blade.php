<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CMS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{asset ('js/jquery.js')}}"></script>


    <!-- Fonts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

    <!-- Custom Javascript-->
    <script type="text/javascript" src="{{asset ('js/main.js') }}"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md  navbar-laravel bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard.home') }}">
                {{ config('app.name', 'CMS') }}
            </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> @endif
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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


        <div class="card-body">
            <div class="row">
                @if(Auth::check())
                <div class="col-lg-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('dashboard.home')}}"> Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('user.profile')}}">My profile</a>
                        </li>

                        @if(\Illuminate\Support\Facades\Auth::user()->admin)

                        <li class="list-group-item">
                            <a href="{{route('users')}}"> User list</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{route('user.create')}}"> Create User</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{route('settings')}}">Blog settings</a>
                        </li>
                        @endif

                        <li class="list-group-item">
                            <a href="{{route('posts.show')}}">All Posts</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('category.show')}}">All Category</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('tag.show')}}"> All Tags </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('category.create')}}">Create Category</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('post.create')}}"> Create a new post</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('tag.create')}}">Create Tags</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('post.deleted')}}"> Trashed Posts</a>
                        </li>
                    </ul>
                </div>
                @endif
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
