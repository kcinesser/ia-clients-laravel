@extends ('layouts.app')

@section('content')

    <header class="mb-3 py-4">
        <div class="flex justify-start w-full items-center">
            <h1 class="text-blue-500"><i class="fa fa-laptop mr-3"></i>Sites / {{ $site->name }}</h1>
            <a href="" class="button btn-add ml-4" data-toggle="modal" data-target="#editSiteModal"><i class="fa fa-pencil"></i></a>
        </div>
        <p class="small">{{ $site->description }}</p>
    </header>

    <main class="sites-show">
    	<div class="lg:flex flex-row-reverse">
    		<div class="main-content">

                @if($site->urls()->exists())
                    <div>
                        <div class="flex flex-wrap items-center mb-2">
                            <h2 class="card-title"><i class="fa fa-home"></i> URLs</h2>
                            <a href="" class="button btn-add-sm mb-1 -mt-1 ml-2" data-toggle="modal" data-target="#newURLModal"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card">
                        @foreach ($site->urls as $url)
                            <div class="flex justify-between">
                                <div class="w-1/4">
                                    <p class="small mb-0">{{ \App\Enums\URLEnvironment::getDescription($url->environment) }} {{ \App\Enums\URLType::getDescription($url->type) }}</p>
                                </div>
                                <div class="w-1/2">
                                    <a class="text-sm" href="{{ $url->url }}" target="_blank">{{ $url->url }}</a>
                                </div>
                                <div class="w-1/8 flex">
                                    <a class="mr-3" href="" data-toggle="modal" data-target="#editURLModal"  data-url="{{ $url->url }}" data-type="{{ $url->type }}" data-environment="{{ $url->environment }}" data-path="{{ $url->path() }}"><i class="fa fa-pencil"></i></a>
                                    <form method="POST" action="{{ $url->path() }}" class="delete-form">
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
                        <h2 class="card-title"><i class="fa fa-home"></i> Add a URL</h2>
                        <a href="" class="button btn-add-sm mb-1 -mt-1 ml-2" data-toggle="modal" data-target="#newURLModal"><i class="fa fa-plus"></i></a>
                    </div>
                @endif


                @if($site->hosted_domains()->exists())
                    <div>
                        <div class="flex flex-wrap items-center mb-2">
                            <h2 class="card-title"><i class="fa fa-globe mr-1"></i> Hosted Domains</h2>
                            <a href="" class="button btn-add-sm mb-1 -mt-1 ml-2" data-toggle="modal" data-target="#newDomainSiteModal"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card">
                        @foreach ($site->hosted_domains as $domain)
                            <div class="flex justify-between">
                                <div class="w-1/3">
                                    <p class="text-sm">{{ $domain->name }}</p>
                                </div>
                                <div class="lg:w-1/3 text-sm">
                                    @if($domain->exp_date)
                                        Exp: {{ \Carbon\Carbon::parse($domain->exp_date)->format('n-j-Y') }}
                                    @endif
                                </div>
                                <div class="w-1/8 flex">
                                    <a  class="mr-3" href="" data-toggle="modal" data-target="#editDomainModal"  data-name="{{ $domain->name }}" data-exp="{{ $domain->exp_date }}" data-path="{{ $domain->path() }}" data-siteid="{{ $domain->site->id }}"><i class="fa fa-pencil"></i></a>
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
                            <a href="" class="button btn-add-sm mb-1 -mt-1 ml-2" data-toggle="modal" data-target="#newDomainSiteModal"><i class="fa fa-plus"></i></a>
                        </div>
                    @endif

                @if($site->projects()->exists())
                <div>
                    <div class="flex flex-wrap items-center mb-2">
                        <h2 class="card-title"><i class="fa fa-check-square-o mr-1"></i> Projects</h2>
                        <a href="" class="button btn-add-sm mb-1 -mt-1 ml-2" data-toggle="modal" data-target="#newProjectModal"><i class="fa fa-plus"></i></a>
                    </div>

                    <div class="lg:flex lg:flex-wrap card">
                        @forelse ($projects as $project)
                            <div class="lg:w-full p-2">
                                <h3><a href="{{ $project->path() }}">{{ $project->title }}</a></h3>
                                <p class="small">{{ \Illuminate\Support\Str::limit($project->description, 80) }}</p>
                            </div>
                        @empty
                            <div class="lg:w-full p-2">
                                <p>No projects yet.</p>
                            </div>
                        @endforelse
                        @if($site->hasProjectArchive())
                            <a href="{{ $client->projectArchivePath() }}" class="headline-lead text-xs no-underline text-right ml-auto">View Archived Projects</a>
                        @endif
                    </div>
                </div>
                @endif

                <div>
                    <h2 class="card-title"><i class="fa fa-file-o mr-1"></i> Files</h2>

                    <div class="card constrain-height">
                        <div class="mb-6">
                            @if(!$site->uploads()->exists() && !$site->project_uploads()->exists())
                                <div class="lg:w-full p-2">
                                    <p>No files yet.</p>
                                </div>
                            @else
                                @foreach($site->uploads as $upload)
                                    <div class="mb-3 flex justify-between items-center">
                                        <div class="w-1/3">
                                            <a href="{{ $upload->url }}" target="_blank">{{ $upload->name }}</a>
                                        </div>
                                        <div class="w-1/3"><p class="small mb-0"></p></div>
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

                                @foreach($site->project_uploads as $upload)
                                    <div class="mb-3 flex justify-between items-center">
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
                            @endif
                        </div>

                        <form method="post" action="/upload/site/{{ $site->id }}" enctype="multipart/form-data">
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

                <div>
                    <h2 class="card-title"><i class="fa fa-key mr-1"></i>Licenses</h2>

                    <div class="card">
                        @foreach ($site->licenses as $license)
                            <div class="license mb-4">
                                <form method="POST" action="/software_license/{{ $license->id }}">
                                    @method('PATCH')
                                    @csrf
                                    <div class="table w-full">
                                        <div class="table-row">
                                            <div class="table-cell text-sm text-left w-3/12"><input name="description" value="{{ $license->description }}" class="w-10/12" required></div>
                                            <div class="table-cell text-sm w-4/12"><input name="key" value="{{ $license->key }}" class="w-10/12"></div>
                                            <div class="table-cell text-sm w-2/12"><input class="date-field w-10/12" autocomplete="off" name="exp_date" value="{{ $license->exp_date }}"></div>
                                            <div class="table-cell text-sm w-2/12"><input name="url" value="{{ $license->url }}" class="w-10/12"></div>
                                            <div class="table-cell edit-license w-1/12"><button type="submit" class="button btn-add-sm mr-2 w-10/12"><i class="fa fa-pencil"></i></button></div>
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
                                    <div class="table-cell text-sm w-3/12"><input name="description" placeholder="Description" class="w-10/12"></div>
                                    <div class="table-cell text-sm w-4/12"><input name="key" placeholder="Key" class="w-10/12"></div>
                                    <div class="table-cell text-sm w-2/12"><input class="date-field w-10/12" autocomplete="off" name="exp_date" placeholder="Expiration Date"></div>
                                    <div class="table-cell text-sm w-2/12"><input name="url" placeholder="URL" class="w-10/12"></div>
                                    <div class="table-cell w-1/12"><button type="submit" class="save-link w-10/12">Save</button></div>
                                </div>
                            </div>
                        </form>

                            @if ($errors->license_errors->all())
                                <div class="field mt-6">
                                    @foreach ($errors->license_errors->all() as $error)
                                        <li class="text-sm text-red-500">{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif
                    </div>
                </div>

                <div class="mb-12">
                    <h2 class="card-title"><i class="fa fa-refresh mr-1"></i> Update Instructions</h2>

                    <form method="POST" action="{{ $site->path() . '/notes' }}">
                        @csrf
                        @method('PATCH')
                        <textarea name="update_instructions" class="card w-full mb-2 min-h-300">{{ $site->update_instructions }}</textarea>
                        <button type="submit" class="save-link">Save</button>
                    </form>
                </div>

    			<div class="mb-12">
                    <h2 class="card-title"><i class="fa fa-pencil-square-o mr-1"></i> Notes</h2>

                    <form method="POST" action="{{ $site->path() . '/notes' }}">
                        @csrf
                        @method('PATCH')
                        <textarea name="notes" class="card w-full mb-2 min-h-300">{{ $site->notes }}</textarea>
                        <button type="submit" class="save-link">Save</button>
                    </form>
	            </div>

                <div>
                    <h2 class="card-title"><i class="fa fa-comment-o mr-1"></i> Comments</h2>

                    <div class="card comment-card">
                        <form action="/comment/site/{{ $site->id }}" method="POST">
                            {{ csrf_field() }}
                            <input name="body" class="w-full" placeholder="Add a comment.">
                        </form>
                    </div>

                    @foreach ($site->comments->sortByDesc('created_at') as $comment)
                        <div class="card comment-card">
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
            <div class="client-data">
                @include ('sites.card')

                <div>
                    <h2 class="card-title"><i class="fa fa-cogs mr-1"></i> Update History</h2>
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
        </div>

        @include('sites._edit_site_modal')
        @include('domains._new_domain_site_modal')
        @include('domains._edit_domain_modal')
        @include('projects._new_project_modal')
        @include('urls._new_url_modal')
        @include('urls._edit_url_modal')
    </main>
@endsection
