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
            <div class="flex items-center justify-start w-1/6 flex-shrink-0 text-white md:w-1/2">
                <a href="/"><img id="logo" class="md:mr-6" src="/media/logos/Firespring-icon-wht_298px.png"></a>
                <a href="/" class="font-semibold text-xl tracking-tight hidden md:block">Interactive Client Database</a>
            </div>

            <div class="flex items-center justify-end w-5/6 flex-grow lg:w-auto text-white md:w-1/2">
                <ul class="nav navbar-nav navbar-right items-center">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @else
                        <div id="nav-search" class="mr-3 items-center nav-search-bar" tabindex="0">
                            <div class="control dropdown">
                                <input type="text" placeholder="Search..." id="addSearchResults" data-toggle="dropdown">
                                <div class="dropdown-menu search-results" aria-labelledby="addSearchResults">
                                    <h6 class="dropdown-header">Clients</h6>
                                    <div class="nav-clients-results dropdown-item ">
                                        <p class="text-gray-500 text-sm font-normal">No results found.</p>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Sites</h6>
                                    <div class="nav-sites-results dropdown-item ">
                                        <p class="text-gray-500 text-sm font-normal">No results found.</p>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Jobs</h6>
                                    <div class="nav-jobs-results dropdown-item ">
                                        <p class="text-gray-500 text-sm font-normal">No results found.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mr-3 items-center">
                            <div class="dropdown">
                                <button class="button btn-add dropdown-toggle btn-blue" type="button" id="addMenuButton" data-toggle="dropdown"><i class="fa fa-plus"></i></button>
                                <div class="dropdown-menu center-drop" aria-labelledby="addMenuButton">
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

                        <li class="dropdown items-center flex">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                @if(auth()->user()->avatar)
                                    <img src="{{ auth()->user()->avatar }}" alt="avatar" width="32" height="32" style="margin-right: 8px;">
                                @else
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                @endif

                            </a>

                            <ul class="dropdown-menu right-drop">
                                <li>
                                    <a class="dropdown-item text-sm" href="{{ route('logout') }}"
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
