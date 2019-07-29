@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500">
            	<a href="{{ $client->path() }}" class="no-underline">{{ $client->name }}</a> / Project / {{ $project->title }}
            </p>
            <a href="{{ $project->path() . '/edit' }}" class="button bg-blue-500 hover:bg-blue-300">Edit Project</a>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-1/4 px-3">
 				@include ('projects.card')

                <div class="mb-8">            
                    <h2 class="text-gray-500 mb-3">Tasks</h2>

                    @foreach ($project->tasks as $task)
                        <div class="card">
                            <form method="POST" action="{{ $task->path() }}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                <div class="flex items-center">
                                    <input class="w-full {{ $task->completed ? 'text-gray-500' : '' }}" name="body" value="{{ $task->body }}">
                                    <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                </div>
                            </form>
                        </div>
                    @endforeach

                    <div class="card">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            {{ csrf_field() }}
                            <input name="body" class="w-full" placeholder="Add a task.">
                        </form>
                    </div>
                </div>

    		</div>
    		<div class="lg:w-1/2 px-3">
                <div class="mb-8">            
                    <h2 class="text-gray-800 mb-3">{{ $project->title }}</h2>
                    <p class="text-gray-500">{{ $project->description }}</p>
                </div>

                <div class="mb-8">            
                    <h2 class="text-gray-500 mb-3">Domains</h2>

                    <div>
                        @forelse ($project->domains as $domain)
                            <div class="card">
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
                            <div class="card">
                                <p>No domains yet.</p>
                            </div>
                        @endforelse
                    </div>
                    <a href="{{ $project->path() }}/domains/create" class="button">Add Domain</a>

                </div>
    			
                <div class="mb-8">            
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Licenses</h2>

                    @foreach ($project->licenses as $license)
                        <div class="card mb-3">
                            <form method="POST" action="{{ $license->path() }}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                <div class="items-center mb-3">
                                    <input type="text" name="description" class="w-full mb-3" value="{{ $license->description }}">
                                    <input type="text" name="key" class="w-full mb-3" value="{{ $license->key }}">
                                    <input type="text" name="url" class="w-full mb-3" value="{{ $license->url }}">
                                    <button type="submit" class="button">Update</button>
                                </div>
                            </form>
                            <form method="POST" action={{ $license->path() }}>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 text-sm font-normal">Delete</button>
                            </form>
                        </div>
                    @endforeach

                    <div class="card mb-3">
                        <form action="{{ $project->path() . '/software-license' }}" method="POST">
                            {{ csrf_field() }}
                            <div class="items-center">
                                <input name="description" class="w-full mb-3" placeholder="Description">
                                <input name="key" class="w-full mb-3" placeholder="Key">
                                <input name="url" class="w-full mb-3" placeholder="URL">
                                <button type="submit" class="button">Save</button>
                            </div>
                        </form>
                    </div>
                </div>


    			<div class="mb-8">
	            	<h2 class="text-gray-500 mb-3">Notes</h2>

                    <form method="POST" action="{{ $project->path() . '/notes' }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <textarea name="notes" class="card w-full mb-3 h-300">{{ $project->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
	            </div>

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-3">Comments</h2>


                    <div class="card">
                        <form action="/comment/project/{{ $project->id }}" method="POST">
                            {{ csrf_field() }}
                            <div class="flex items-center">
                                <input name="body" class="w-full" placeholder="Add a comment.">
                                <button type="submit" class="button">Save</button>
                            </div>
                        </form>
                    </div>

                    @foreach ($project->comments->sortByDesc('created_at') as $comment)
                        <div class="card">
                            <form method="POST" action="/comment/{{ $comment->id }}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                <div class="flex items-center justify-between">
                                    <input class="w-3/4 px-3" name="body" value="{{ $comment->body }}">
                                    <div class="mx-3">
                                        <p>{{ $comment->user->initials() }}</p>
                                        {{ \Carbon\Carbon::parse($comment->created_at)->format('n/j/Y')}}
                                    </div>
                                    <button type="submit" class="button">Update</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
			</div>


            <div class="lg:w-1/4 px-3">
                <div class="mb-8">
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Activity</h2>

                    @foreach ($project->activities as $activity)
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

                <div class="mb-8">            
                    <h2 class="text-gray-500 mb-3">Update History</h2>
                    
                    @foreach ($project->updates->sortByDesc('updated_at') as $update)
                        <div class="card">
                            <form method="POST" action="{{ $update->path() }}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                <div class="flex justify-between">
                                    <input class="w-3/4 text-sm font-normal" name="description" value="{{ $update->description }}">
                                    <div>
                                        <p class="text-gray-500">{{ $update->user->initials() }}</p>
                                        <p class="text-gray-500">{{ \Carbon\Carbon::parse($update->updated_at)->format('n/j/Y')}}</p>
                                    </div>
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
            </div>
    	</div>
    </main>

@endsection