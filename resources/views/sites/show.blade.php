@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500 text-sm font-normal">
            	<a href="{{ $client->path() }}" class="no-underline">{{ $client->name }}</a> / Site / {{ $site->name }}
            </p>
            <a href="{{ $site->path() . '/edit' }}" class="button">Edit Site</a>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-1/4 px-3">
 				@include ('sites.card')
    		</div>
    		<div class="lg:w-1/2 px-3">
                <div class="mb-8">
                    <h2 class="text-gray-800 mb-3">{{ $site->name }}</h2>
                    <p class="text-gray-500">{{ $site->description }}</p>
                </div>
                <div class="mb-8">            
                    <h2 class="text-gray-500 mb-3 mr-3">Domains</h2>

                    <div>
                        @forelse ($site->domains as $domain)
                            <div class="card mb-6">
                                <div class="flex justify-between">
                                    <div>
                                        <a href="{{ $domain->path() }}">{{ $domain->name }}</a>
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
                    <a href="{{ $site->path() }}/domains/create" class="button">Add Domain</a>

                </div>

                @if($site->jobs()->exists())
                <div class="mb-8">  
                    <div class="lg:flex lg:flex-wrap items-center">          
                        <h2 class="text-gray-500 mb-3 mr-3">Jobs</h2>
                    </div>

                    <div class="lg:flex lg:flex-wrap">          
                        @forelse ($site->jobs as $job)
                            <div class="w-1/3 px-3 pb-6">
                                <div class="card h-40">
                                    <a href="{{ $job->path() }}">{{ $job->title }}</a>
                                    <p class="text-gray-500">{{ \Illuminate\Support\Str::limit($job->description, 30) }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="card mb-3">
                                <p>No jobs yet.</p>
                            </div>
                        @endforelse
                    </div>
                    <a href="{{ $client->archivePath() }}" class="">View Archived Jobs</a>
                </div>
                @endif

                <div class="mb-8">            
                
                <div class="mb-8">            
                    <h2 class="text-gray-500 mb-3 mr-3">Licenses</h2>

                    @foreach ($site->licenses as $license)
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
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </div>
                    @endforeach

                    <div class="card mb-3">
                        <form action="/software_license/site/{{ $site->id }}" method="POST">
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
	            	<h2 class="text-gray-500 mb-3 mr-3">Notes</h2>

                    <form method="POST" action="{{ $site->path() . '/notes' }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <textarea name="notes" class="card w-full mb-3 h-300">{{ $site->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
	            </div>
                <div>
                    <h2 class="text-gray-500 mb-3 mr-3">Comments</h2>

                    <div class="card mb-3">
                        <form action="/comment/site/{{ $site->id }}" method="POST">
                            @csrf
                            <div class="flex items-center">
                                <input name="body" class="w-full" placeholder="Add a comment.">
                                <button type="submit" class="button">Save</button>
                            </div>
                        </form>
                    </div>

                    @foreach ($site->comments->sortByDesc('created_at') as $comment)
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
    </main>



@endsection