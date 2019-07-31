@extends('layouts.app')

@section('content')

<form method="POST" action="{{ $domain->path() }}" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
    @csrf
    @method('PATCH')
    <h1 class="text-2xl font-normal mb-10 text-center">Edit {{ $domain->site->name }}</h1>
    @include('domains.form', [
        'account' => new App\DomainAccount,
        'buttonText' => 'Save Domain',
        'cancelURL' => $site->path()
    ])
</form>

@endsection