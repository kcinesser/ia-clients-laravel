@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500 text-sm font-normal">
            	<a href="/clients" class="no-underline">Clients</a> / {{ $client->name }}
            </p>
            <a href="{{ $client->path() . '/edit' }}" class="button">Edit Client</a>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-1/4 px-3">
 				@include ('clients.card')
    		</div>
            <div class="lg:w-3/4 px-3">
                <div class="mb-8">            
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Projects</h2>

                    @forelse ($client->projects as $project)
                        <div class="card mb-3">
                            <a href="{{ $project->path() }}">{{ $project->title }}</a>
                        </div>
                    @empty
                        <div class="card mb-3">
                            <p>No projects yet.</p>
                        </div>
                    @endforelse
                </div>
                <a href="{{ $client->path() . '/projects/create' }}" class="button">New Project</a>
            </div>
    	</div>
    </main>



@endsection