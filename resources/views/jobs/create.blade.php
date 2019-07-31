@extends('layouts.app')

@section('content')

<form method="POST" action="{{ $client->path() . '/jobs' }}" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
    {{ csrf_field() }}
    <h1 class="text-2xl font-normal mb-10 text-center">Create A Job</h1>

    @include('jobs.form', [
        'job' => new App\Job,
        'buttonText' => 'Create Job',
        'cancelURL' => $client->path(),
        'services' => App\Service::all(),
        'technologies' => App\Enums\Technologies::toSelectArray(),
        'developers' => App\User::all()->where('role', 0),
        'sites' => $client->sites,
    ])

</form>

@endsection