@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-start w-full items-center">
            <h1 class="text-blue-500"><i class="fa fa-users mr-3"></i>Client / {{ $client->name }}</h1>
            <a href="" class="button btn-add ml-4" data-toggle="modal" data-target="#editClientModal"><i class="fa fa-pencil"></i></a>
        </div>
    </header>

    <main>
    	<div class="lg:flex">
    		<div class="client-data">
 				@include ('clients.card')

                <div>
                    <h2 class="card-title"><i class="fa fa-commenting-o mr-1"></i> Activity Feed</h2>
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
            <div class="main-content">
                @if( !(count($sites) == 0) )
                    <div>
                        <div class="flex flex-wrap items-center mb-2">
                            <h2 class="card-title"><i class="fa fa-laptop mr-1"></i> Sites</h2>
                            <a href="" class="add-toggle button btn-add-sm" data-toggle="modal" data-target="#siteModal"><i class="fa fa-plus"></i></a>
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
                                    <p class="small">{{ \Illuminate\Support\Str::limit($site->description, 30) }}</p>
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
                @else
                    <div class="flex flex-wrap items-center mb-6">
                        <h2 class="card-title"><i class="fa fa-laptop mr-1"></i> Add a Site</h2>
                        <a href="" class="add-toggle button btn-add-sm" data-toggle="modal" data-target="#siteModal"><i class="fa fa-plus"></i></a>
                    </div>
                @endif


                @if(($client->hostedDomains()->exists()))
                    <div>
                    <div class="flex flex-wrap items-center mb-2">
                        <h2 class="card-title"><i class="fa fa-globe mr-1"></i> Hosted Domains</h2>
                        <a href="" class="add-toggle button btn-add-sm" data-toggle="modal" data-target="#newDomainModal"><i class="fa fa-plus"></i></a>
                    </div>

                    <div class="card">
                    @foreach ($client->hostedDomains as $domain)
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
                    @endforeach
                    </div>
                </div>
                @else
                    <div class="flex flex-wrap items-center mb-6">
                        <h2 class="card-title"><i class="fa fa-globe mr-1"></i> Add a Hosted Domain</h2>
                        <a href="" class="add-toggle button btn-add-sm" data-toggle="modal" data-target="#newDomainModal"><i class="fa fa-plus"></i></a>
                    </div>
                @endif

                @if( !(count($projects) == 0) )
                    <div>
                        <div class="flex flex-wrap items-center mb-2">
                            <h2 class="card-title"><i class="fa fa-tasks mr-1"></i> Projects</h2>
                            <a href="" class="add-toggle button btn-add-sm" data-toggle="modal" data-target="#newProjectModal"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="lg:flex lg:flex-wrap card">
                            @foreach ($projects as $project)
                                <div class="lg:w-full p-2">
                                    <h3><a href="{{ $project->path() }}">{{ $project->title }}</a></h3>
                                    <p class="small">{{ \Illuminate\Support\Str::limit($project->description, 65) }}</p>
                                </div>
                            @endforeach

                            @if($client->hasProjectArchive())
                                <a href="{{ $client->projectArchivePath() }}" class="headline-lead text-xs no-underline text-right ml-auto mt-3 block">View Archived Projects</a>
                            @endif

                        </div>
                    </div>
                @else
                    <div class="flex flex-wrap items-center mb-6">
                        <h2 class="card-title"><i class="fa fa-tasks mr-1"></i> Add a Project</h2>
                        <a href="" class="add-toggle button btn-add-sm" data-toggle="modal" data-target="#newProjectModal"><i class="fa fa-plus"></i></a>
                    </div>
                @endif


                <div>
                    <h2 class="card-title"><i class="fa fa-file-o mr-1"></i> Files</h2>

                    <div class="card constrain-height">
                        <div class="mb-6">
                            @if(!$client->uploads()->exists() && !$client->projectUploads()->exists() && !$client->siteUploads()->exists() )
                                <div class="lg:w-full px-2">
                                    <p>No files yet.</p>
                                </div>
                            @else
                                @foreach($client->uploads as $upload)
                                    <div class="mb-3 flex items-center">
                                        <div class="w-1/3">
                                            <a href="{{ $upload->url }}" target="_blank">{{ $upload->name }}</a>
                                        </div>
                                        <div class="w-1/3 flex"><p class="small mb-0 mr-3"></p></div>
                                        <div class="w-1/3 flex">
                                            <p class="small mb-0 mr-3">{{ $upload->user->initials() }}</p>
                                            <p class="small mb-0">{{ \Carbon\Carbon::parse($upload->created_at)->format('n/j/Y') }}</p>
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

                                @foreach($client->projectUploads as $upload)
                                    <div class="mb-3 flex items-center">
                                        <div class="w-1/3">                                    
                                            <a href="{{ $upload->url }}" target="_blank">{{ $upload->name }}</a>
                                        </div>

                                        <div class="w-1/3">
                                            <p class="small mb-0">{{ $upload->uploadable->title }}</p>
                                        </div>
                                        <div class="w-1/3 flex">
                                            <p class="small mb-0 mr-3">{{ $upload->user->initials() }}</p>
                                            <p class="small mb-0">{{ \Carbon\Carbon::parse($upload->created_at)->format('n/j/Y') }}</p>
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

                                @foreach($client->siteUploads as $upload)
                                    <div class="mb-3 flex items-center">
                                        <div class="w-1/3">                                                                        
                                            <a href="{{ $upload->url }}" target="_blank">{{ $upload->name }}</a>
                                        </div>
                                     
                                        <div class="w-1/3">
                                            <p class="small mb-0">{{ $upload->uploadable->name }}</p>
                                        </div>
                                        <div class="w-1/3 flex">  
                                            <p class="small mb-0 mr-3">{{ $upload->user->initials() }}</p>
                                            <p class="small mb-0">{{ \Carbon\Carbon::parse($upload->created_at)->format('n/j/Y') }}</p>
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

                        <form method="post" action="/upload/client/{{ $client->id }}" enctype="multipart/form-data">
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

                <div class="mb-12">
                    <h2 class="card-title"><i class="fa fa-pencil-square-o mr-1"></i> Notes</h2>

                    <form method="POST" action="{{ $client->path() . '/notes' }}">
                        @csrf
                        @method('PATCH')
                        <textarea name="notes" class="card w-full mb-2 min-h-300">{{ $client->notes }}</textarea>
                        <button type="submit" class="save-link">Save</button>
                    </form>
                </div>

                <div>
                    <h2 class="card-title"><i class="fa fa-comment-o mr-1"></i> Comments / Updates</h2>

                    <div class="card comment-card">
                        <form action="/comment/client/{{ $client->id }}" method="POST">
                            {{ csrf_field() }}
                            <input name="body" class="w-full" placeholder="Add a comment.">
                        </form>
                    </div>

                    @foreach ($client->comments->sortByDesc('created_at') as $comment)
                        <div class="card comment-card">
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
        @include('projects._new_project_modal')
        @include('domains._new_domain_modal')
        @include('domains._edit_domain_modal')
        
    </main>
@endsection
