@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-start w-full items-center">
            <h1 class="text-blue-500"><i class="fa fa-users mr-3"></i>All Clients</h1>
            <a href="" class="button btn-add ml-4" data-toggle="modal" data-target="#newClientModal"><i class="fa fa-plus"></i></a>
        </div>
    </header>

    <main>
        <div class="flex items-center justify-between">
            <div id="client-filter" class="mb-3 flex items-center search-bar">
                <div class="control flex items-center">
                    <p class="mb-0 mr-3">Filter:</p>
                    <input type="text" data-model="client" placeholder="Search clients...">
                </div>
            </div>
            <a href="/clients/archives" class="headline-lead text-xs text-gray-500 hover:text-orange-500 no-underline pl-3"><i class="fa fa-archive mr-1"></i> archived clients</a>
        </div>


        <div class="tab-content settings-tabs" id="settingsTabContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <div class="lg:flex p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                    <div class="lg:w-2/5"><p>Client Name <button class="sort" data-order="asc" data-sort="name" data-model="client"><i class="fa fa-sort mr-1"></i></button></p></div>
                    <div class="lg:w-2/5"><p>Account Manager <button class="sort" data-order="asc" data-sort="AM" data-model="client"><i class="fa fa-sort mr-1"></i></button></p></div>
                </div>
                <div id="client-modal-list">
                    @foreach($clients as $client)
                        <div class="lg:flex justify-between p-3">
                            <div class="lg:w-2/5"><a href="{{ $client->path() }}">{{ $client->name }}</a></div>
                            <div class="lg:w-2/5"><p>{{ $client->accountManager->name }}</p></div>
                            <div class="lg:w-1/5 text-right">
                                @if(!$client->favorite)
                                    <form method="POST" action='/favorite/client/{{ $client->id }}'>
                                        @csrf
                                        <button type="submit"><i class="fa fa-star-o text-yellow-500"></i></button>
                                    </form>
                                @else
                                    <form method="POST" action='/favorite/{{ $client->favorite->id }}'>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="fa fa-star text-yellow-500"></i></button>
                                    </form>
                                @endif   
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
       
        @include('clients._new_client_modal')

    </main>
@endsection
