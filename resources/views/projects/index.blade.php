@extends('layouts.app')

@section('content')
    <h1>Birdbox</h1>

    <ul>
        @forelse ($projects as $project)
            <a href="{{ $project->path() }}">
                <li>{{ $project->title }}</li>
            </a>
        @empty
            <li>No projects found.</li>
        @endforelse
    </ul>

    <a href="/projects/create">Create New Project</a>
@endsection