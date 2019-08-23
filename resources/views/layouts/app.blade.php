<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Interactive Client Database</title>
    <link rel="shortcut icon" href="/media/logos/favicon.ico"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>




<body class="bg-gray-100">
    <div id="app">
        <nav class="flex items-center justify-between flex-wrap bg-orange-500 font-display p-6">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
                <a href="/"><img id="logo" class="mr-6" src="/media/logos/Firespring-icon-wht_298px.png"></a>
                <a href="/" class="font-semibold text-xl tracking-tight">Interactive Client Database</a>
            </div>
            <div class="block lg:hidden">
                <button class="flex items-center px-3 py-2 border rounded text-white border-teal-400 hover:text-gray-500 hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow">

                </div>
                <div class="text-sm text-white">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else

                            <div class="mr-3 items-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="addMenuButton" data-toggle="dropdown"><i class="fa fa-2x fa-plus mr-1"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="addMenuButton">
                                        <h6 class="dropdown-header">Create New</h6>
                                        <button class="dropdown-item" data-toggle="modal" data-target="#newClientMenuModal">Client</button>
                                        <button class="dropdown-item" data-toggle="modal" data-target="#newSiteMenuModal">Site</button>
                                        <button class="dropdown-item" data-toggle="modal" data-target="#newJobMenuModal">Job</button>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="mr-3 items-center">
                                <a href="/settings"><i class="fa fa-2x fa-cog mr-1"></i></a>
                            </div>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    @if(auth()->user()->avatar)
                                        <img src="{{ auth()->user()->avatar }}" alt="avatar" width="32" height="32" style="margin-right: 8px;">
                                    @else
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    @endif

                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container mx-auto p-6">
            @yield('content')

            @include('layouts.partials._new_client_modal')
            @include('layouts.partials._new_site_modal')
            @include('layouts.partials._new_job_modal')
        </main>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
