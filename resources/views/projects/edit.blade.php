@extends('layouts.app')

@section('content')

<form method="POST" action="{{ $project->path() }}" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <h1 class="mb-10 text-center">Edit Your Project</h1>

    @include('projects.form', [
        'buttonText' => 'Update Project',
        'cancelURL' => $project->path(),
        'services' => App\Service::all(),
        'technologies' => App\Enums\Technologies::toSelectArray(),
        'developers' => App\User::all()->where('role', 0)
    ])

</form>

@endsection