@extends('layouts.app')

@section('content')

<form method="POST" action="{{ $project->path() }}/domains" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
    {{ csrf_field() }}
    <h1 class="text-2xl font-normal mb-10 text-center">Create A Domain</h1>
    @include('domains.form', [
        'domain' => new App\Domain,
        'buttonText' => 'Create Domain',
        'cancelURL' => '/projects'
    ])
</form>

@endsection