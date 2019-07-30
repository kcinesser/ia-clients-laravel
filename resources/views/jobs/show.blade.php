@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500">
            	<a href="{{ $client->path() }}" class="no-underline">{{ $client->name }}</a> / Job / {{ $job->title }}
            </p>
            <a href="{{ $job->path() . '/edit' }}" class="button bg-blue-500 hover:bg-blue-300">Edit Job</a>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-1/4 px-3">
 				@include ('jobs.card')

                <div class="mb-8">            
                    <h2 class="text-gray-500 mb-3">Tasks</h2>

                    @foreach ($job->tasks as $task)
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
                        <form action="{{ $job->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input name="body" class="w-full" placeholder="Add a task.">
                        </form>
                    </div>
                </div>

    		</div>
    		<div class="lg:w-1/2 px-3">
                <div class="mb-8">
                    <div class="flex items-center">            
                        <h2 class="text-gray-800 mb-3">{{ $job->title }}</h2>
                        @if($job->site()->exists())
                        <p class="text-gray-500">Site: <a class="text-blue-500" href="{{ $job->site->path() }}">{{ $job->site->name }}</a></p>
                        @endif
                    </div>
                    <p class="text-gray-500 text-sm font-normal">{{ $job->description }}</p>
                </div>
    			
                <div class="mb-8">            
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Licenses</h2>

                    @foreach ($job->licenses as $license)
                        <div class="card mb-3">
                            <form method="POST" action="/software_license/{{ $license->id }}">
                                @method('PATCH')
                                @csrf

                                <div class="items-center mb-3">
                                    <input type="text" name="description" class="w-full mb-3" value="{{ $license->description }}">
                                    <input type="text" name="key" class="w-full mb-3" value="{{ $license->key }}">
                                    <input type="text" name="url" class="w-full mb-3" value="{{ $license->url }}">
                                    <button type="submit" class="button">Update</button>
                                </div>
                            </form>
                            <form method="POST" action="/software_license/{{ $license->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 text-sm font-normal">Delete</button>
                            </form>
                        </div>
                    @endforeach

                    <div class="card mb-3">
                        <form action="/software_license/job/{{ $job->id }}" method="POST">
                            @csrf
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

                    <form method="POST" action="{{ $job->path() . '/notes' }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <textarea name="notes" class="card w-full mb-3 h-300">{{ $job->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
	            </div>

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-3">Comments</h2>

                    <div class="card">
                        <form action="/comment/job/{{ $job->id }}" method="POST">
                            @csrf
                            <div class="flex items-center">
                                <input name="body" class="w-full" placeholder="Add a comment.">
                                <button type="submit" class="button">Save</button>
                            </div>
                        </form>
                    </div>

                    @foreach ($job->comments->sortByDesc('created_at') as $comment)
                        <div class="card">
                            <form method="POST" action="/comment/{{ $comment->id }}">
                                @method('PATCH')
                                @csrf

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

                    @foreach ($job->activities as $activity)
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