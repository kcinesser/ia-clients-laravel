@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <h2 class="text-gray-500 text-sm font-normal">Interactive Clients</h2>
            <a href="/clients/create" class="button">Create New Client</a>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($clients as $client)
            <div class="lg:w-1/3 px-3 pb-6">
                @include ('clients.card')
            </div>
        @empty
            <div>No clients yet.</div>
        @endforelse
    </main>

@endsection