@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4"></header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-1/4 px-3">
 				@include ('sites.card')

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-cogs mr-1"></i> Update History</h2>
                    <div class="card">
                    @foreach ($site->updates->sortByDesc('updated_at') as $update)
                        <form method="POST" action="{{ $update->path() }}">
                            @method('PATCH')
                            @csrf

                            <div class="flex justify-between items-center mb-3">
                                <p class="mb-0 text-xs mb-0">{{ $update->description }}</p>
                                <div>
                                    <span class="text-gray-500 text-xs mr-1">{{ $update->user->initials() }} - </span>
                                    <span class="text-gray-500 text-xs"> {{ \Carbon\Carbon::parse($update->updated_at)->format('n/j/Y')}}</span>
                                </div>
                            </div>
                        </form>
                    @endforeach

                    <form action="{{ $site->path() . '/updates' }}" method="POST" class="flex justify-between">
                        @csrf
                        <input name="description" class="w-full text-xs" placeholder="Create new update." required autocomplete="off">
                    </form>
                    </div>
                </div>
    		</div>
    		<div class="lg:w-3/4 px-3">
                <div class="mb-8">
                    <div class="flex items-center w-full mb-2">
                        <h2 class="text-blue-500"><i class="fa fa-laptop mr-1"></i> {{ $site->name }}</h2>
                        <a href="{{ $site->path() . '/edit' }}" class="button btn-add ml-4"><i class="fa fa-pencil"></i></a>
                    </div>
                    <p class="text-gray-500 text-sm font-normal">{{ $site->description }}</p>
                </div>

                <div class="mb-8">
                    <div class="lg:flex lg:flex-wrap items-center mb-2">
                        <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-globe mr-1"></i> Domains</h2>
                        <a href="{{ $client->path() . '/domains/create' }}" class="button btn-add-sm mb-1 -mt-1 ml-2"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="card mb-6">
                    @forelse ($site->domains as $domain)
                        <div class="flex justify-between">
                            <div>
                                <a class="text-sm" href="{{ $domain->path() }}">{{ $domain->name }}</a>
                            </div>
                            <div class="text-sm">
                                Exp: {{ \Carbon\Carbon::parse($domain->exp_date)->format('n-j-Y') }}
                            </div>
                        </div>
                    @empty
                        <p>No domains yet.</p>
                    @endforelse
                    </div>
                </div>

                @if($site->jobs()->exists())
                <div class="mb-8">  
                    <div class="lg:flex lg:flex-wrap items-center">
                        <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-check-square-o mr-1"></i> Jobs</h2>
                        <a href="{{ $client->path() . '/jobs/create' }}" class="button btn-add-sm mb-1 -mt-1 ml-2"><i class="fa fa-plus"></i></a>
                    </div>

                    <div class="lg:flex lg:flex-wrap card">
                        @forelse ($site->jobs as $job)
                            <div class="lg:w-full p-2">
                                <h3><a href="{{ $job->path() }}">{{ $job->title }}</a></h3>
                                <p class="text-gray-500 text-sm font-normal">{{ \Illuminate\Support\Str::limit($job->description, 30) }}</p>
                            </div>
                        @empty
                            <div class="lg:w-full p-2">
                                <p>No jobs yet.</p>
                            </div>
                        @endforelse
                            <a href="{{ $client->archivePath() }}" class="headline-lead text-xs no-underline text-right ml-auto">View Archived Jobs</a>
                    </div>
                </div>
                @endif

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-key mr-1"></i>Licenses</h2>

                    <div class="card">
                        @foreach ($site->licenses as $license)
                            <div class="license mb-4">
                                <form method="POST" action="/software_license/{{ $license->id }}">
                                    @method('PATCH')
                                    @csrf
                                    <div class="table w-full">
                                        <div class="table-row">
                                            <div class="table-cell text-sm text-left"><input name="description" placeholder="{{ $license->description }}" required></div>
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
                        <form action="/software_license/site/{{ $site->id }}" method="POST">
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
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-refresh mr-1"></i> Update Instructions</h2>

                    <form method="POST" action="{{ $site->path() . '/notes' }}">
                        @csrf
                        @method('PATCH')
                        <textarea name="update_instructions" class="card w-full mb-3 h-300">{{ $site->update_instructions }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
                </div>

    			<div class="mb-8">
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-pencil-square-o mr-1"></i> Notes</h2>

                    <form method="POST" action="{{ $site->path() . '/notes' }}">
                        @csrf
                        @method('PATCH')
                        <textarea name="notes" class="card w-full mb-3 h-300">{{ $site->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
	            </div>

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-comment-o mr-1"></i> Comments</h2>

                    <div class="card mb-3">
                        <form action="/comment/site/{{ $site->id }}" method="POST">
                            {{ csrf_field() }}
                            <input name="body" class="w-full" placeholder="Add a comment.">
                        </form>
                    </div>

                    @foreach ($site->comments->sortByDesc('created_at') as $comment)
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
