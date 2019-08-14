@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <h2 class="text-gray-500">Interactive Clients</h2>
            <a href="" class="button btn-add mb-1 -mt-1 ml-2" data-toggle="modal" data-target="#newModal"><i class="fa fa-plus"></i></a>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($clients as $client)
            <div class="lg:w-1/3 px-3 pb-6">
                <div class="card" style="">
                    <h3 class="py-4 -ml-5 border-l-4 border-blue-500 pl-4">
                        <a href="{{ $client->path() }}" class="text-black no-underline">{{ $client->name }}</a>
                    </h3>
                </div>
            </div>
        @empty
            <div>No clients yet.</div>
        @endforelse

       
        @include('clients._new_client_modal')

    </main>

@endsection
