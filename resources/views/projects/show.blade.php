@extends ('layouts.app')

@section('content')
    <header class="mb-3 py-4">
        <div class="mb-2 flex items-center w-full ">
            <h1 class="text-blue-500"><i class="fa fa-tasks mr-3"></i>Projects / {{ $project->title }}</h1>
            <a href="" class="button btn-add ml-4" data-toggle="modal" data-target="#editProjectModal"><i class="fa fa-pencil"></i></a>
        </div>

        <p class="text-gray-500 text-sm font-normal">{{ $project->description }}</p>
    </header>

    <main class="projects-show">
    	<div class="lg:flex -mx-3 flex-row-reverse">
            <div class="lg:w-3/4 px-3">


                <div class="mb-8">
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-file-o mr-1"></i> Files</h2>

                    <div class="card constrain-height">
                        <div class="mb-6">
                            @if(!$project->uploads()->exists())
                                <div class="lg:w-full p-2">
                                    <p>No files yet.</p>
                                </div>
                            @else
                                @foreach($project->uploads as $upload)
                                    <div class="mb-3 flex justify-between items-center">
                                        <div class="w-1/3">
                                            <a href="{{ $upload->url }}" target="_blank">{{ $upload->name }}</a>
                                        </div>
                                        <div class="w-1/3 flex">
                                            <p class="text-gray-500 text-sm font-normal mb-0 mr-3">{{ $upload->user->initials() }}</p>
                                            <p class="text-gray-500 text-sm font-normal mb-0">{{ \Carbon\Carbon::parse($upload->created_at)->format('n/j/Y') }}</p>
                                        </div>
                                        <div class="w-1/8">
                                            <form method="post" class="delete-form" action="/upload/{{ $upload->id}}" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="text-red-500 fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <form method="post" action="/upload/project/{{ $project->id }}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" id="file" name="file" class="mb-3 inputfile" required multiple>
                            <label for="file" class="inputfilelabel"><i class="fa fa-plus"></i> Select File</label>
                            <button type="submit" class="button btn-primary"><i class="fa fa-upload"></i> Upload</button>
                        </form>
                        @if ($errors->any())
                            <div class="mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-sm text-red-500">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-list-ol mr-1"></i> Tasks</h2>
                    <div class="card">

                        @foreach ($project->tasks as $task)
                            <form method="POST" action="{{ $task->path() }}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                <div class="flex items-center mb-3">
                                    <input class="w-full {{ $task->completed ? 'text-gray-500 line-through' : '' }}" name="body" value="{{ $task->body }}">
                                    <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                </div>
                            </form>
                        @endforeach
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input name="body" class="w-full" placeholder="Add a task">
                        </form>


                        @if ($errors->any())
                            <div class="field mt-6">
                                @foreach ($errors->all() as $error)
                                    <li class="text-sm text-red-500">{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-pencil-square-o mr-1"></i> Notes</h2>
                    <form method="POST" action="{{ $project->path() . '/notes' }}">
                        @csrf
                        @method('PATCH')
                        <textarea name="notes" class="card w-full mb-3 h-300">{{ $project->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
                </div>

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-comment-o mr-1"></i> Comments / Updates</h2>

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
                                <div class="flex justify-between items-center text-sm">
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
                @include ('projects.card')

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-commenting-o mr-1"></i> Activity Feed</h2>
                    <div class="card constrain-height">
                        @foreach ($project->activities as $activity)
                            <div class="border-b-2 py-6">
                                <span class="text-xs font-normal">{{ $activity->description }}</span>
                                <span class="text-gray-500 text-xs font-normal">{{ \Carbon\Carbon::parse($activity->created_at)->format('n/j/Y') }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

    		</div>
    	</div>

        @include('projects._edit_project_modal')

    </main>

@endsection
