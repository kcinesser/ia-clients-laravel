@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <h2 class="text-gray-500">Jobs</h2>
            <a href="/jobs/create" class="button bg-plum-500 hover:bg-plum-300">Create New Job</a>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($jobs as $job)
            <div class="lg:w-1/3 px-3 pb-6">
                <div class="card">
                    <h3 class="py-4 -ml-5 border-l-4 border-blue-500 pl-4">
                        <a href="{{ $job->path() }}" class="text-black no-underline">{{ $job->title }}</a>
                        <p class="text-gray-500">{{ $job->client->name }}</p>
                    </h3>
                </div>
            </div>
        @empty
            <div>No jobs yet.</div>
        @endforelse
    </main>

@endsection