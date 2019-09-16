@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <h1 class="text-blue-500"><i class="fa fa-archive"></i> Archived Sites</h1>
            <a href="/sites" class="button">Back to all Sites</a>
        </div>
    </header>

    <main>
        <div class="tab-content settings-tabs" id="settingsTabContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                    <div class="lg:w-1/2"><p>Site Name <button class="sort" data-order="asc" data-sort="name" data-model="client"><i class="fa fa-sort mr-1"></i></button></p></div>
                    <div class="lg:w-1/2"><p>Client Name <button class="sort" data-order="asc" data-sort="AM" data-model="client"><i class="fa fa-sort mr-1"></i></button></p></div>
                </div>
                <div id="client-modal-list">
                    @forelse ($archive_sites as $site)
                        <div class="lg:flex justify-between p-3">
                            <div class="lg:w-1/2"><a href="{{ $site->path() }}" class="text-black no-underline">{{ $site->name }}</a></div>
                            <div class="lg:w-1/2"><p>{{ $site->client->name }}</p></div>
                        </div>
                    @empty
                        <div>No archives found.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>

@endsection
