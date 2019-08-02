@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500 font-normal font-sans">
            	<a href="/clients" class="no-underline">Clients</a> / {{ $client->name }}
            </p>
            <button type="button" class="button btn-blue mb-3" data-toggle="modal" data-target="#editClientModal">
                Edit Client
            </button>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-1/4 px-3">
 				@include ('clients.card')
    		</div>
            <div class="lg:w-1/2 px-3">
                <div class="mb-8">  
                    <div class="lg:flex lg:flex-wrap items-center">          
                        <h2 class="text-gray-500 mb-3 mr-3">Sites</h2>
                        <button type="button" class="button btn-primary mb-3" data-toggle="modal" data-target="#siteModal">
                            New Site
                        </button>
                    </div>

                    <div class="lg:flex lg:flex-wrap">          
                        @forelse ($sites as $site)
                            <div class="w-1/3 px-3 pb-6">
                                <div class="card h-40">
                                    <a href="{{ $site->path() }}">{{ $site->name }}</a>
                                    <p class="text-gray-500">{{ \Illuminate\Support\Str::limit($site->description, 30) }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="card mb-3">
                                <p>No sites yet.</p>
                            </div>
                        @endforelse
                    </div>
                    <a href="{{ $client->archivePath() }}" class="">View Archived Sites</a>
                </div>

                <div class="mb-8">  
                    <div class="lg:flex lg:flex-wrap items-center">          
                        <h2 class="text-gray-500 mb-3 mr-3">Jobs</h2>
                        <button type="button" class="button btn-primary mb-3" data-toggle="modal" data-target="#jobModal">
                            New Job
                        </button>
                    </div>

                    <div class="lg:flex lg:flex-wrap">          
                        @forelse ($jobs as $job)
                            <div class="w-1/3 px-3 pb-6">
                                <div class="card h-40">
                                    <a href="{{ $job->path() }}">{{ $job->title }}</a>
                                    <p class="text-gray-500 text-sm font-normal">{{ \Illuminate\Support\Str::limit($job->description, 35) }}</p>
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

                <div class="mb-8">            
                    <h2 class="text-gray-500 mb-3 mr-3">Notes</h2>

                    <form method="POST" action="{{ $client->path() . '/notes' }}">
                        @csrf
                        @method('PATCH')
                        <textarea name="notes" class="card w-full mb-3 h-300">{{ $client->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
                </div>

                <div>
                    <h2 class="text-gray-500 mb-3 mr-3">Comments</h2>

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
            <div class="lg:w-1/4 px-3">
                <div class="mb-8">
                    <h2 class="text-gray-500 mb-3 mr-3">Activity</h2>

                    @foreach ($client->activities as $activity)
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

        <div class="modal fade" id="siteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Site</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ $client->path() . '/sites' }}" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16">
                            @csrf
                            @include('sites.create_form', [
                                'site' => new App\Site,
                                'buttonText' => 'Create Site',
                                'technologies' => App\Enums\Technologies::toSelectArray(),
                                'services' => App\Service::all(),
                                'statuses' => App\Enums\SiteStatus::toSelectArray(),
                                'registrars' => App\Registrar::all()
                            ])

                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="button">Save</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $client->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ $client->path() }}" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16">
                            @csrf
                            @method('PATCH')
                            @include('clients.form', [
                                'buttonText' => 'Update Client',
                                'account_managers' => App\User::all()->where('role', 1)
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="jobModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Job for {{ $client->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ $client->path() . '/jobs' }}" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16">
                            {{ csrf_field() }}
                            @include('jobs.form', [
                                'job' => new App\Job,
                                'buttonText' => 'Create Job',
                                'cancelURL' => $client->path(),
                                'services' => App\Service::all(),
                                'statuses' => App\Enums\JobStatus::toSelectArray(),
                                'technologies' => App\Enums\Technologies::toSelectArray(),
                                'developers' => App\User::all()->where('role', 0),
                                'sites' => $client->sites,
                            ])

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>



@endsection