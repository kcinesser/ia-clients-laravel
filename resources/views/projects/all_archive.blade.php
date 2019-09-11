@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <h2 class="text-blue-500"><i class="fa fa-archive"></i> Archived Projects</h2>
            <a href="/" class="button">Back to dashboard</a>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap">
        @forelse ($archive_projects as $project)
            <div class="lg:w-1/3 px-3 pb-6">
                <div class="card" style="">
                    <h3 class="py-4 -ml-5 border-l-4 border-blue-500 pl-4">
                        <a href="{{ $project->path() }}" class="text-black no-underline">{{ $project->title }}</a>
                        <p class="text-gray-500">{{ $project->client->name }}</p>
                    </h3>
                </div>

            </div>
        @empty
            <div>No archives found.</div>
        @endforelse
    </main>

@endsection