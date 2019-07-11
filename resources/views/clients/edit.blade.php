@extends('layouts.app')

@section('content')

<form method="POST" action="{{ $client->path() }}" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <h1 class="text-2xl font-normal mb-10 text-center">Edit {{ $client->name }}</h1>

    @include('clients.form', [
        'buttonText' => 'Update Client',
        'cancelURL' => $client->path()
    ])

</form>

@endsection