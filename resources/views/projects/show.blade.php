@extends ('layouts.app')

@section('content')
    <h1>{{ $project->title }}</h1>

    <p>{{ $project->description }}</p>

    <a href="/projects" class="button is-link">Back to Projects</a>
@endsection