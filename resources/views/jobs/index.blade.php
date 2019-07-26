@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <h2 class="text-gray-500 text-sm font-normal">Jobs</h2>
            <a href="/projects/create" class="button">Create New Job</a>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($jobs as $job)
            <div class="lg:w-1/3 px-3 pb-6">
                <div class="card mb-6" style="">
                    <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-500 pl-4">
                        <a href="{{ $job->path() }}" class="text-black no-underline">{{ $job->title }}</a>
                    </h3>
                    <div class="mb-3">
                        <p class="text-gray-500 text-sm font-normal">{{ $job->client->name }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div>No jobs yet.</div>
        @endforelse
    </main>

@endsection