@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500 text-sm font-normal">
            	<a href="{{ $client->path() }}" class="no-underline">{{ $client->name }}</a> / Project / {{ $project->title }}
            </p>
            <a href="{{ $project->path() . '/edit' }}" class="button">Edit Project</a>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-1/4 px-3">
 				@include ('projects.card')

                <div class="mb-8">            
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Tasks</h2>

                    @foreach ($project->tasks as $task)
                        <div class="card mb-3">
                            <form method="POST" action="{{ $task->path() }}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                <div class="flex">
                                    <input class="w-full {{ $task->completed ? 'text-gray-500' : '' }}" name="body" value="{{ $task->body }}">
                                    <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                </div>
                            </form>
                        </div>
                    @endforeach

                    <div class="card mb-3">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            {{ csrf_field() }}
                            <input name="body" class="w-full" placeholder="Add a task.">
                        </form>
                    </div>
                </div>

    		</div>
    		<div class="lg:w-3/4 px-3">
                <div class="mb-8">            
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Domains</h2>

                    <div>
                        @forelse ($project->domains as $domain)
                            <div class="card mb-6">
                                <div class="flex justify-between">
                                    <div>
                                        <a href="{{ $domain->path() }}">{{ $domain->name }}</a>
                                    </div>
                                    <div>
                                        <a href="{{ $domain->domain_account->url }}">{{ $domain->domain_account->url }}</a>
                                    </div>
                                    <div>
                                        Exp: {{ $domain->exp_date }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card mb-3">
                                <p>No domains yet.</p>
                            </div>
                        @endforelse
                    </div>
                    <a href="{{ $project->path() }}/domains/create" class="button">Add Domain</a>

                </div>

                <div class="mb-8">
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Update History</h2>
                    
                    @foreach ($project->updates->sortByDesc('updated_at') as $update)
                        <div class="card mb-3">
                            <form method="POST" action="{{ $update->path() }}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                <div class="flex justify-between">
                                    <input class="w-3/4" name="description" value="{{ $update->description }}">
                                    <p>{{ $update->user->name }}</p>
                                    <p>{{ \Carbon\Carbon::parse($update->updated_at)->format('n/j/Y')}}</p>
                                </div>
                            </form>
                        </div>
                    @endforeach

                    <div class="card">
                        <form action="{{ $project->path() . '/updates' }}" method="POST" class="flex justify-between">
                            {{ csrf_field() }}
                            <input name="description" class="w-full" placeholder="Create new update.">
                        </form>
                    </div>
                </div>

                <div class="mb-8">
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Comments</h2>


                    <div class="card mb-3">
                        <form action="/comment/project/{{ $project->id }}" method="POST">
                            {{ csrf_field() }}
                            <input name="body" class="w-full" placeholder="Add a comment.">
                        </form>
                    </div>

                    @foreach ($project->comments->sortByDesc('created_at') as $comment)
                        <div class="card mb-3">
                            <form method="POST" action="/comment/{{ $comment->id }}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                <div class="flex justify-between">
                                    <input class="w-3/4" name="body" value="{{ $comment->body }}">
                                    <div>
                                        <p>{{ $comment->user->name }}</p>
                                    </div>
                                    <div>
                                        {{ \Carbon\Carbon::parse($comment->created_at)->format('n/j/Y')}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
    			
    			<div class="mb-8">
	            	<h2 class="text-lg text-gray-500 font-normal mb-3">Notes</h2>

                    <form method="POST" action="{{ $project->path() }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <textarea name="notes" class="card w-full mb-3 h-300">{{ $project->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
	            </div>
			</div>
    	</div>
    </main>



@endsection