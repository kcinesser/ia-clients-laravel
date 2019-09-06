@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">

        <div class="flex justify-start w-full items-center">
            <h1 class="text-blue-500"><i class="fa fa-users mr-3"></i>Client / {{ $client->name }}</h1>
            <a href="" class="button btn-add ml-4" data-toggle="modal" data-target="#editClientModal"><i class="fa fa-pencil"></i></a>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-1/4 px-3">
 				@include ('clients.card')

                
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
                                <h3><a href="{{ $site->path() }}">{{ $site->name }}</a>
                                    <span class="badge {{$site->status == App\Enums\SiteStatus::InDevelopment ? 'badge-dev' : 'badge-live'}}">{{$site->status == App\Enums\SiteStatus::InDevelopment ? 'In Dev' : 'Live'}}</span>

                                    @if ($site->services->contains(1))
                                        <span class="badge badge-mma">MMA</span>
                                    @elseif ($site->services->contains(5))
                                        <span class="badge badge-mma">MMA - Internal</span>
                                    @endif
                                </h3>
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
                        <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-globe mr-1"></i> Hosted Domains</h2>
                        <a href="" class="button btn-add-sm mb-1 -mt-1 ml-2" data-toggle="modal" data-target="#newDomainModal"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="card mb-6">
                    @forelse ($client->hosted_domains as $domain)
                        <div class="flex justify-between">
                            <div class="w-1/3">
                                <p class="text-sm">{{ $domain->name }}</p>
                            </div>
                            <div class="w-1/5 text-sm">
                                @if($domain->exp_date)
                                    Exp: {{ \Carbon\Carbon::parse($domain->exp_date)->format('n-j-Y') }}
                                @endif
                            </div>
                            <div class="w-1/5 text-sm">
                                @if($domain->site)
                                    {{ $domain->site->name }}
                                @endif
                            </div>
                            <div class="w-1/8 flex">
                                <a  class="mr-3" href="" data-toggle="modal" data-target="#editDomainModal"  data-name="{{ $domain->name }}" data-exp="{{ $domain->exp_date }}" data-path="{{ $domain->path() }}" data-siteid="{{ isset($domain->site) ? $domain->site->id : "" }}"><i class="fa fa-pencil"></i></a>
                                <form method="POST" action="{{ $domain->path() }}" class="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="text-red-500 text-sm font-normal"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p>No domains yet.</p>
                    @endforelse
                    </div>
                </div>

                <div class="mb-8">
                    <div class="flex flex-wrap items-center mb-2">
                        <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-tasks mr-1"></i> Jobs</h2>
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
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-file-o mr-1"></i> Files</h2>

                    <div class="card constrain-height">
                            @foreach($client->uploads as $upload)
                                <div class="mb-3 flex justify-between items-center">
                                    <a href="{{ $upload->url }}" target="_blank">{{ $upload->name }}</a>

                                    <form method="post" action="/upload/{{ $upload->id}}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="text-red-500 fa fa-trash"></i></button>
                                    </form>
                                </div>
                            @endforeach

                            @foreach($client->job_uploads as $upload)
                                <div class="mb-3 flex justify-between items-center">
                                    <a href="{{ $upload->url }}" target="_blank">{{ $upload->name }}</a>
                                    <a href="{{ $upload->uploadable->path() }}">{{ $upload->uploadable->title }}</a>

                                    <form method="post" action="/upload/{{ $upload->id}}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="text-red-500 fa fa-trash"></i></button>
                                    </form>
                                </div>
                            @endforeach

                            @foreach($client->site_uploads as $upload)
                                <div class="mb-3 flex justify-between items-center">
                                    <a href="{{ $upload->url }}" target="_blank">{{ $upload->name }}</a>
                                    <a href="{{ $upload->uploadable->path() }}">{{ $upload->uploadable->name }}</a>

                                    <form method="post" action="/upload/{{ $upload->id}}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="text-red-500 fa fa-trash"></i></button>
                                    </form>
                                </div>
                            @endforeach

                        <form method="post" action="/upload/client/{{ $client->id }}" enctype="multipart/form-data">
                            @csrf
                            <label for="file" class="label text-sm mb-2 block">Upload File</label>
                            <input type="file" name="file" class="mb-3">

                            <button type="submit" class="button btn-primary">Submit</button>
                        </form>
                    </div>

                </div>

                <div class="mb-8">
                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-commenting-o mr-1"></i> Activity Feed</h2>
                    <div class="card constrain-height">
                        @foreach ($client->activities as $activity)
                            <div class="border-b-2 py-6">
                                <span class="text-xs font-normal">{{ $activity->description }}</span>
                                <span class="text-gray-500 text-xs font-normal">{{ \Carbon\Carbon::parse($activity->created_at)->format('n/j/Y') }}</span>
                            </div>
                        @endforeach
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
        @include('domains._new_domain_modal')
        @include('domains._edit_domain_modal')
        
    </main>
@endsection
