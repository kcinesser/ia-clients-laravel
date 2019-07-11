@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500 text-sm font-normal">
            	<a href="{{ $client->path() }}" class="no-underline">{{ $client->name }} Projects</a> / {{ $project->title }}
            </p>
            <a href="{{ $project->path() . '/edit' }}" class="button">Edit Project</a>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-1/4 px-3">
 				@include ('projects.card')
    		</div>
    		<div class="lg:w-3/4 px-3">
                <div class="mb-8">            
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Domains</h2>

                    <div class="mb-6">
                        @forelse ($project->domains as $domain)
                            <div class="card mb-6">
                                <div class="flex justify-between">
                                    <div>
                                        {{ $domain->name }}
                                    </div>
                                    <div>
                                        Exp: {{ $domain->exp_date }}
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
    			<div>
	            	<h2 class="text-lg text-gray-500 font-normal mb-3">Notes</h2>

                    <form method="POST" action="{{ $project->path() }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <textarea name="notes" class="card w-full mb-3 h-300">{{ $project->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
	            	{{-- notes --}}
	            </div>
			</div>
    	</div>
    </main>



@endsection