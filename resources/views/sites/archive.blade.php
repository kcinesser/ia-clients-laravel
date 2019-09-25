@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <h1 class="text-blue-500"><i class="fa fa-archive"></i> {{ $client->name }} Archived Sites</h1>
            <a href="{{ $client->path() }}" class="button">Back <span class="hidden sm:inline">to {{ $client->name }}</span></a>
        </div>
    </header>

    <main>
        <div class="tab-content settings-tabs" id="settingsTabContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                    <div class="lg:w-full"><p>Site Name</p></div>
                </div>
                <div id="client-modal-list">
                    @forelse ($archived_sites as $site)
                        <div class="lg:flex justify-between p-3">
                            <div class="lg:w-full"><a href="{{ $site->path() }}" class="text-black no-underline">{{ $site->name }}</a></div>
                        </div>
                    @empty
                        <div class="p-3">No archives found.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>

@endsection
