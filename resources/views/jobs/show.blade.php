@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-start w-full items-center">
            <h1><a href="{{ $client->path() }}" class="no-underline">{{ $client->name }}</a> / Job / {{ $job->title }}</h1>
            <a href="{{ $job->path() . '/edit' }}" class="button btn-add ml-4"><i class="fa fa-pencil"></i></a>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-1/4 px-3">
 				@include ('jobs.card')

                <div class="mb-8">            
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-list-ol mr-1"></i> Tasks</h2>
                    <div class="card">

                    @foreach ($job->tasks as $task)
                        <form method="POST" action="{{ $task->path() }}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="flex items-center mb-3">
                                <input class="w-full {{ $task->completed ? 'text-gray-500' : '' }}" name="body" value="{{ $task->body }}">
                                <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            </div>
                        </form>
                    @endforeach
                        <form action="{{ $job->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input name="body" class="w-full" placeholder="Add a task">
                        </form>
                    </div>
                </div>

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-commenting-o mr-1"></i> Activity Feed</h2>
                    <div class="card constrain-height">
                        @foreach ($job->activities as $activity)
                            <div class="border-b-2 py-6">
                                <span class="text-xs font-normal">{{ $activity->description }}</span>
                                <span class="text-gray-500 text-xs font-normal">{{ \Carbon\Carbon::parse($activity->created_at)->format('n/j/Y') }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

    		</div>
    		<div class="lg:w-3/4 px-3">
                <div class="mb-8">
                    <div class="lg:flex lg:flex-wrap items-center mb-2">
                        <h2 class="text-blue-500 mb-1">{{ $job->title }}</h2>
                        @if($job->site()->exists())
                            <p class="text-gray-500">Site: <a class="text-blue-500" href="{{ $job->site->path() }}">{{ $job->site->name }}</a></p>
                        @endif
                    </div>
                    <p class="text-gray-500 text-sm font-normal">{{ $job->description }}</p>
                </div>

    			
                <div class="mb-8">            
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-key mr-1"></i>Licenses</h2>

                    <div class="card">
                        @foreach ($job->licenses as $license)
                            <div class="license mb-4">
                                <form method="POST" action="/software_license/{{ $license->id }}">
                                    @method('PATCH')
                                    @csrf
                                    <div class="table w-full">
                                        <div class="table-row">
                                            <div class="table-cell text-sm text-left"><input name="description" placeholder="{{ $license->description }}"></div>
                                            <div class="table-cell text-sm"><input name="key" placeholder="{{ $license->key }}"></div>
                                            <div class="table-cell text-sm"><input name="url" placeholder="{{ $license->url }}"></div>
                                            <div class="table-cell"><button type="submit" class="text-orange-500 text-sm font-normal">Update</button></div>
                                        </div>
                                    </div>
                                </form>

                                <form method="POST" action="/software_license/{{ $license->id }}" class="delete-license">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 text-sm font-normal"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        @endforeach

                        <h3 class="headline-lead text-xs my-2 ">Add New License</h3>
                        <form action="/software_license/job/{{ $job->id }}" method="POST">
                            @csrf
                            <div class="table w-full">
                                <div class="table-row">
                                    <div class="table-cell text-sm"><input name="description" placeholder="Description"></div>
                                    <div class="table-cell text-sm"><input name="key" placeholder="Key"></div>
                                    <div class="table-cell text-sm"><input name="url" placeholder="URL"></div>
                                    <div class="table-cell"><button type="submit" class="text-orange-500 text-sm font-normal">Save</button></div>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-pencil-square-o mr-1"></i> Notes</h2>

                    <form method="POST" action="{{ $job->path() . '/notes' }}">
                        @csrf
                        @method('PATCH')
                        <textarea name="notes" class="card w-full mb-3 h-300">{{ $job->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
                </div>

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-comment-o mr-1"></i> Comments / Updates</h2>

                    <div class="card mb-3">
                        <form action="/comment/client/{{ $job->id }}" method="POST">
                            {{ csrf_field() }}
                            <input name="body" class="w-full" placeholder="Add a comment.">
                        </form>
                    </div>

                    @foreach ($job->comments->sortByDesc('created_at') as $comment)
                        <div class="card mb-3">
                            <form method="POST" action="/comment/{{ $comment->id }}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                <div class="flex justify-between items-center text-sm">
                                    <input class="w-3/4" name="body" value="{{ $comment->body }}">
                                    <div>
                                        <p>{{ $comment->user->initials() }}</p>
                                    </div>
                                    <div>
                                        {{ \Carbon\Carbon::parse($comment->created_at)->format('n/j/Y')}}
                                    </div>
                                    <button type="submit" class="button btn-add"><i class="fa fa-pencil"></i></button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>

			</div>
    	</div>
    </main>

@endsection
