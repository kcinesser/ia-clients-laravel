@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <h1 class="text-blue-500"><i class="fa fa-archive"></i> Archived Projects</h1>
            <a href="/projects" class="button">Back to all Projects</a>
        </div>
    </header>

    <main>
        <div class="tab-content settings-tabs" id="settingsTabContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                    <div class="lg:w-1/2"><p>Project Title</p></div>
                    <div class="lg:w-1/2"><p>Client Name</p></div>
                </div>
                <div id="client-modal-list">
                    @forelse ($archive_projects as $project)
                        <div class="lg:flex justify-between p-3">
                            <div class="lg:w-1/2"><a href="{{ $project->path() }}" class="text-black no-underline">{{ $project->title }}</a></div>
                            <div class="lg:w-1/2"><p class="text-gray-500">{{ $project->client->name }}</p></div>
                        </div>
                    @empty
                        <div class="p-3">No archives found.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
@endsection
