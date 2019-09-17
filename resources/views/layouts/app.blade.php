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
        @include('layouts.partials._header')

        <main class="container mx-auto p-6 mb-12">
            @yield('content')

            @include('layouts.partials._new_client_modal')
            @include('layouts.partials._new_site_modal')
            @include('layouts.partials._new_project_modal')
        </main>

        @include('layouts.partials._footer')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
