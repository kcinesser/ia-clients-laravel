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
            <div class="lg:w-1/2 px-3">
                <div class="mb-8">  
                    <div class="lg:flex lg:flex-wrap items-center">          
                        <h2 class="text-lg text-gray-500 font-normal mb-3 mr-3">Projects</h2>
                        <a href="{{ $client->path() . '/projects/create' }}" class="button mb-3">New Project</a>
                    </div>

                    <div class="lg:flex lg:flex-wrap">          
                        @forelse ($projects as $project)
                            <div class="w-1/4 px-3 pb-6">
                                <div class="card h-40">
                                    <a href="{{ $project->path() }}">{{ $project->title }}</a>
                                    <p class="text-gray-500 text-sm font-normal">{{ \Illuminate\Support\Str::limit($project->description, 50) }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="card mb-3">
                                <p>No projects yet.</p>
                            </div>
                        @endforelse
                    </div>
                    <a href="{{ $client->archivePath() }}" class="">View Archived Projects</a>
                </div>

                <div>
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Comments</h2>

                    <div class="card mb-3">
                        <form action="/comment/client/{{ $client->id }}" method="POST">
                            {{ csrf_field() }}
                            <input name="body" class="w-full" placeholder="Add a comment.">
                        </form>
                    </div>

                    @foreach ($client->comments->sortByDesc('created_at') as $comment)
                        <div class="card mb-3">
                            <form method="POST" action="/comment/{{ $comment->id }}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                <div class="flex justify-between">
                                    <input class="w-3/4" name="body" value="{{ $comment->body }}">
                                    <div>
                                        <p>{{ $comment->user->initials() }}</p>
                                    </div>
                                    <div>
                                        {{ \Carbon\Carbon::parse($comment->created_at)->format('n/j/Y')}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="lg:w-1/4 px-3">
                <div class="mb-8">
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Activity</h2>

                    @foreach ($client->activities as $activity)
                        <div class="card mb-3">
                            <div class="flex justify-between items-center">
                                <p class="w-3/4 text-sm font-normal pr-3">{{ $activity->description }}</p>
                                <div>
                                    <p class="text-gray-500 text-sm font-normal">{{ \Carbon\Carbon::parse($activity->updated_at)->format('n/j/Y')}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    	</div>
    </main>



@endsection