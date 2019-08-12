@extends('layouts.app')

@section('content')

<form method="POST" action="{{ $client->path() . '/sites' }}" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
   	@csrf
    <h1 class="mb-10 text-center">Create A Site</h1>

    @include('sites.create_form', [
        'site' => new App\Site,
        'buttonText' => 'Create Site',
        'cancelURL' => $client->path(),
        'technologies' => App\Enums\Technologies::toSelectArray(),
        'services' => App\Service::all(),
        'statuses' => App\Enums\SiteStatus::toSelectArray(),
        'registrars' => App\Registrar::all()
    ])

</form>

@endsection
