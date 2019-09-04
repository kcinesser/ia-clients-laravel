@extends ('layouts.app')

@section('content')

    <header class="mb-3 py-4">
        <div class="flex items-center w-full mb-2">
            <h1 class="text-blue-500"><i class="fa fa-laptop mr-3"></i>Sites / {{ $site->name }}</h1>
            <a href="" class="button btn-add ml-4" data-toggle="modal" data-target="#editSiteModal"><i class="fa fa-pencil"></i></a>
        </div>
        <p class="text-gray-500 text-sm font-normal">{{ $site->description }}</p>
    </header>

    <main class="sites-show">
    	<div class="lg:flex -mx-3 flex-row-reverse">
    		<div class="lg:w-3/4 px-3">
                <div class="mb-8">
                    <div class="flex flex-wrap items-center mb-2">
                        <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-globe mr-1"></i> Domains</h2>
                        <a href="" class="button btn-add-sm mb-1 -mt-1 ml-2" data-toggle="modal" data-target="#newDomainModal"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="card mb-6">
                    @forelse ($site->domains as $domain)
                        <div class="lg:flex justify-between relative mb-2">
                            <div class="lg:w-1/3">
                                <a class="text-sm" href="{{ $domain->name }}" target="_blank">{{ $domain->name }}</a>
                            </div>
                            <div class="lg:w-1/4 text-sm">
                                @if($domain->exp_date)
                                    Exp: {{ \Carbon\Carbon::parse($domain->exp_date)->format('n-j-Y') }}
                                @endif
                            </div>
                            <div class="lg:w-1/4 text-sm">
                                {{ $domain->registrar->name }}
                            </div>
                            <div class="w-1/8 flex items-center edit-domain">
                                <a class="button btn-add-sm mr-2" href="" data-toggle="modal" data-target="#editDomainModal"  data-name="{{ $domain->name }}" data-registrar="{{ $domain->registrar->id }}" data-exp="{{ $domain->exp_date }}" data-path="{{ $domain->path() }}"><i class="fa fa-pencil text-white"></i></a>
                                <form method="POST" action="{{ $site->path() }}/domains/{{ $domain->id }}" class="delete-form">
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

                @if($site->jobs()->exists())
                <div class="mb-8">  
                    <div class="flex flex-wrap items-center mb-2">
                        <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-check-square-o mr-1"></i> Jobs</h2>
                        <a href="" class="button btn-add-sm mb-1 -mt-1 ml-2" data-toggle="modal" data-target="#newJobModal"><i class="fa fa-plus"></i></a>
                    </div>

                    <div class="lg:flex lg:flex-wrap card">
                        @forelse ($jobs as $job)
                            <div class="lg:w-full p-2">
                                <h3><a href="{{ $job->path() }}">{{ $job->title }}</a></h3>
                                <p class="text-gray-500 text-sm font-normal">{{ \Illuminate\Support\Str::limit($job->description, 80) }}</p>
                            </div>
                        @empty
                            <div class="lg:w-full p-2">
                                <p>No jobs yet.</p>
                            </div>
                        @endforelse
                        @if($site->hasJobArchive())
                            <a href="{{ $client->jobArchivePath() }}" class="headline-lead text-xs no-underline text-right ml-auto">View Archived Jobs</a>
                        @endif
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
                                            <div class="table-cell text-sm text-left w-3/12"><input name="description" value="{{ $license->description }}" class="w-10/12" required></div>
                                            <div class="table-cell text-sm w-4/12"><input name="key" value="{{ $license->key }}" class="w-10/12"></div>
                                            <div class="table-cell text-sm w-2/12"><input class="date-field" autocomplete="off" name="exp_date" value="{{ $license->exp_date }}" class="w-10/12"></div>
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
                                    <div class="table-cell w-1/12"><button type="submit" class="text-orange-500 text-sm font-bold w-10/12">Save</button></div>
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
        </div>

        @include('sites._edit_site_modal')
        @include('domains._new_domain_modal')
        @include('domains._edit_domain_modal')
        @include('jobs._new_job_modal')
    </main>
@endsection
