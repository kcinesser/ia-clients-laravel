@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <h2 class="text-gray-500 text-sm font-normal">Registrars</h2>
            <a href="/registrars/create" class="button">Create New Registrar</a>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($registrars as $registrar)
            <div class="lg:w-1/3 px-3 pb-6">
                {{ $registrar->name }}
            </div>
        @empty
            <div>No registrars yet.</div>
        @endforelse
    </main>

@endsection