@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">

        <div class="flex justify-start w-full items-center">
            <h1><a href="/clients" class="no-underline">Client</a> / {{ $client->name }}</h1>
            <a href="" class="button btn-add ml-4" data-toggle="modal" data-target="#editClientModal"><i class="fa fa-pencil"></i></a>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-1/4 px-3">
 				@include ('clients.card')

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-commenting-o mr-1"></i> Activity Feed</h2>
                    <div class="card constrain-height">
                        @foreach ($client->activities as $activity)
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
                    <div class="flex flex-wrap items-center mb-2">
                        <h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-laptop mr-1"></i> Sites</h2>
                        <a href="" class="button btn-add-sm mb-1 -mt-1 ml-2" data-toggle="modal" data-target="#siteModal"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="lg:flex lg:flex-wrap card">
                        @forelse ($sites as $site)
                            <div class="lg:w-full p-2">
                                <h3><a href="{{ $site->path() }}">{{ $site->name }}</a></h3>
                                <p class="text-gray-500 text-sm font-normal">{{ \Illuminate\Support\Str::limit($site->description, 30) }}</p>
                            </div>
                        @empty
                            <div class="lg:w-full p-2">
                                <p>No sites yet.</p>
                            </div>
                        @endforelse

                        @if($client->hasSiteArchive())
                            <a href="{{ $client->siteArchivePath() }}" class="headline-lead text-xs no-underline text-right ml-auto mt-3 block">View Archived Sites</a>
                        @endif

                    </div>
                </div>

                <div class="mb-8">
                    <div class="flex flex-wrap items-center mb-2">
                        <h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-tasks mr-1"></i> Jobs</h2>
                        <a href="" class="button btn-add-sm mb-1 -mt-1 ml-2" data-toggle="modal" data-target="#newJobModal"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="lg:flex lg:flex-wrap card">
                        @forelse ($jobs as $job)
                            <div class="lg:w-full p-2">
                                <h3><a href="{{ $job->path() }}">{{ $job->title }}</a></h3>
                                <p class="text-gray-500 text-sm font-normal">{{ \Illuminate\Support\Str::limit($job->description, 65) }}</p>
                            </div>
                        @empty
                            <div class="lg:w-full p-2">
                                <p>No jobs yet.</p>
                            </div>
                        @endforelse

                        @if($client->hasJobArchive())
                            <a href="{{ $client->jobArchivePath() }}" class="headline-lead text-xs no-underline text-right ml-auto mt-3 block">View Archived Jobs</a>
                        @endif

                    </div>
                </div>

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-pencil-square-o mr-1"></i> Notes</h2>

                    <form method="POST" action="{{ $client->path() . '/notes' }}">
                        @csrf
                        @method('PATCH')
                        <textarea name="notes" class="card w-full mb-3 h-300">{{ $client->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
                </div>

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-comment-o mr-1"></i> Comments / Updates</h2>

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
    	</div>

        @include('sites._new_site_modal')
        @include('clients._edit_client_modal')
        @include('jobs._new_job_modal')
        
    </main>
@endsection
