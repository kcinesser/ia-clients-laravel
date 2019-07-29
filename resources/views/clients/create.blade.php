@extends('layouts.app')

@section('content')

<form method="POST" action="/clients" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
    {{ csrf_field() }}
    <h1 class="mb-10 text-center">Create A Client</h1>

    @include('clients.form', [
        'client' => new App\Client,
        'buttonText' => 'Create Client',
        'cancelURL' => '/clients',
        'account_managers' => App\User::all()->where('role', 1)
    ])

</form>

@endsection