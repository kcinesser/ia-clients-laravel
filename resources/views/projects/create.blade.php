@extends('layouts.app')

@section('content')

<form method="POST" action="{{ $client->path() . '/projects' }}" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
    {{ csrf_field() }}
    <h1 class="mb-10 text-center">Create A Project</h1>

    @include('projects.form', [
        'project' => new App\Project,
        'buttonText' => 'Create Project',
        'cancelURL' => '/projects',
        'services' => App\Service::all(),
        'technologies' => App\Enums\Technologies::toSelectArray(),
        'developers' => App\User::all()->where('role', 0)
    ])

</form>

@endsection