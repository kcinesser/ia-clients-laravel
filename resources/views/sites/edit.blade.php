@extends('layouts.app')

@section('content')

<form method="POST" action="{{ $site->path() }}" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
   	@csrf
   	@method('PATCH')
    <h1 class="text-2xl font-normal mb-10 text-center">Create A Site</h1>

    @include('sites.form', [
        'buttonText' => 'Update Site',
        'cancelURL' => $client->path(),
        'technologies' => App\Enums\Technologies::toSelectArray(),
        'services' => App\Service::all(),
        'statuses' => App\Enums\SiteStatus::toSelectArray(),
    ])

</form>

@endsection