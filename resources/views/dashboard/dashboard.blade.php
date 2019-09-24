@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-6 py-4">
        <div class="flex justify-between w-full items-center">
            <h1 class="text-blue-500"><i class="fa fa-th-large mr-2"></i>Dashboard</h1>
        </div>
    </header>

    <main>
    	<div class="lg:flex">
			<div class="lg:w-3/4 lg:pr-6">
				<div class="flex justify-between mb-1">
					<h2 class="inline-block text-gray-500 headline-lead"><i class="fa fa-calendar-o mr-1"></i> Active Project Due Dates</h2>
				</div>
				<div  class="lg:flex lg:flex-wrap card">
					@foreach($dashboard_items['upcoming_projects'] as $project)
						<div class="lg:w-2/5 p-2">
							<h3><a href="{{ $project->path() }}">{{ $project->title }}</a></h3>
							<p><a href="{{ $project->client->path() }}" class="text-gray-500 text-sm font-normal">{{ $project->client->name }}</a></p>
						</div>
						<div class="lg:w-3/5 flex lg:p-2 md:p-2 sm:p-0">
							<div class="lg:w-1/3 p-2">
								<p class="text-gray-500 text-sm font-normal">
									@if($project->status == App\Enums\ProjectStatus::Incoming || $project->status == App\Enums\ProjectStatus::Hold || $project->status == App\Enums\ProjectStatus::Kickoff)
										<span class="badge badge-warn">{{ App\Enums\ProjectStatus::getDescription($project->status) }}</span>
									@elseif ($project->status == App\Enums\ProjectStatus::Complete)
										<span class="badge badge-live">{{ App\Enums\ProjectStatus::getDescription($project->status) }}</span>
									@else
										<span class="badge badge-dev">{{ App\Enums\ProjectStatus::getDescription($project->status) }}</span>
									@endif
								</p>
							</div>
							<div class="lg:w-1/3 p-2">
								<p class="text-gray-500 text-sm font-normal">{{ $project->developer->initials() }}</p>
							</div>
							<div class="lg:w-1/3 p-2">
								@if(isset($project->go_live_date))
									<p class="text-gray-500 text-sm font-normal">Due: {{ \Carbon\Carbon::parse($project->go_live_date)->format('n/j/Y') }}
										@if (\Carbon\Carbon::parse($project->go_live_date)->isToday())
											<i class="fa fa-exclamation text-red-500 ml-2 cursor-pointer" data-toggle="modal" data-target="legendModal"></i>
										@elseif($project->status == App\Enums\ProjectStatus::Complete)
											<i class="fa fa-check text-green-500 ml-2 cursor-pointer" data-toggle="modal" data-target="#legendModal"></i>
										@elseif(\Carbon\Carbon::parse($project->go_live_date)->isPast())
											<i class="fa fa-exclamation-triangle text-red-500 ml-2 cursor-pointer" data-toggle="modal" data-target="#legendModal"></i>
										@elseif(\Carbon\Carbon::parse($project->go_live_date) < \Carbon\Carbon::now()->addWeek())
											<i class="fa fa-exclamation text-yellow-500 ml-2 cursor-pointer" data-toggle="modal" data-target="#legendModal"></i>
										@endif
									</p>
								@endif
							</div>
						</div>
					@endforeach
				</div>

    			<div class="flex justify-between mb-1">
    		   		<h2 class="inline-block text-gray-500 headline-lead"><i class="fa fa-users mr-1"></i> <span class="hidden md:inline lg:inline">Your </span>Favorite Clients</h2>
    		   		<div class="inline-block text-right">
    		    		<button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500" data-toggle="modal" data-target="#clientsModal"><i class="fa fa-th-list mr-1"></i> <span class="hidden sm:inline">View </span>All Clients</button>
    		    	</div>
    		    </div>
		   		<div  class="card">
					   @forelse ($dashboard_items['clients'] as $client)
					   	<div class="flex">
							<div class="w-3/4 p-2">
								<h3><a href="{{ $client->path() }}">{{ $client->name }}</a></h3>
							</div>
							<div class="lg:w-1/4 w-1/2 p-2 text-right">
								<form method="POST" action='/favorite/{{ $client->favorite->id }}'>
									@csrf
									@method('DELETE')
									<button type="submit" class="button btn-favorite ml-4"><i class="fa fa-star "></i></button>
								</form>
							</div>
						</div>
			        @empty
			            <div class="lg:w-full p-2">
			            	<p>No clients yet.</p>
			        	</div>
			        @endforelse
				</div>
		    	
		    	<div class="flex justify-between mb-1">
    		  		<h2 class="inline-block text-gray-500 headline-lead"><i class="fa fa-tasks mr-1"></i> <span class="hidden md:inline lg:inline">Your </span> Favorite Projects</h2>
    		  		<div class="inline-block text-right">
    		    		<button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500" data-toggle="modal" data-target="#projectsModal"><i class="fa fa-th-list mr-1"></i> <span class="hidden sm:inline">View </span>All Projects</button>
    		    	</div>
		    	</div>
		   		<div  class="card">
					  @forelse ($dashboard_items['projects'] as $project)
						  <div class="flex">
							<div class="lg:w-3/4 w-1/2 p-2">
								<h3><a href="{{ $project->path() }}">{{ $project->title }}</a></h3>
								<p><a href="{{ $project->client->path() }}" class="text-gray-500 text-sm font-normal">{{ $project->client->name }}</a></p>
							</div>
							<div class="lg:w-1/4 w-1/2 p-2 text-right">
								<form method="POST" action='/favorite/{{ $project->favorite->id }}'>
									@csrf
									@method('DELETE')
									<button type="submit" class="button btn-favorite ml-4"><i class="fa fa-star "></i></button>
								</form>
							</div>
						</div>
					@empty
			            <div class="lg:w-full p-2">
			            	<p>No projects yet.</p>
			        	</div>
			        @endforelse
				</div>
				
				<div class="flex justify-between mb-1">
    		    	<h2 class="inline-block text-gray-500 headline-lead"><i class="fa fa-window-maximize mr-1"></i> <span class="hidden md:inline lg:inline">Your  </span>Favorite Sites</h2>
    		    	<div class="inline-block text-right">
    		    		<button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500" data-toggle="modal" data-target="#sitesModal"><i class="fa fa-th-list mr-1"></i> <span class="hidden sm:inline">View </span>All Sites</button>
    		    	</div>
		    	</div>
		   		<div  class="card">
					@forelse ($dashboard_items['sites'] as $site)
						<div class="flex">
							<div class="w-3/4 w-1/2 p-2">
								<h3><a href="{{ $site->path() }}">{{ $site->name }}</a>
									<span class="badge {{$site->status == App\Enums\SiteStatus::InDevelopment ? 'badge-dev' : 'badge-' . strtolower(\App\Enums\SiteStatus::getDescription($site->status))}}">{{$site->status == App\Enums\SiteStatus::InDevelopment ? 'In Dev' : \App\Enums\SiteStatus::getDescription($site->status)}}</span>

									@if ($site->services->contains(1))
										<span class="badge badge-mma">MMA</span>
									@elseif ($site->services->contains(5))
										<span class="badge badge-mma">MMA - Internal</span>
									@endif
								</h3>
								<p><a href="{{ $site->client->path() }}" class="text-gray-500 text-sm font-normal">{{ $site->client->name }}</a></p>
							</div>
							<div class="w-1/4 p-2 text-right">
								<form method="POST" action='/favorite/{{ $site->favorite->id }}'>
									@csrf
									@method('DELETE')
									<button type="submit" class="button btn-favorite ml-4"><i class="fa fa-star "></i></button>
								</form>
							</div>
						</div>
					@empty
			            <div class="lg:w-full p-2">
			            	<p>No sites yet.</p>
			        	</div>
			        @endforelse
				</div>
			</div>
			<div class="lg:w-1/4 lg:pl-6">
		   		<h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-commenting-o mr-1"></i> Activity Feed</h2>
				<div class="card constrain-height">
					@foreach ($dashboard_items['activities'] as $activity)

						<div class="border-b-2 py-6">
							<span class="text-gray-500 text-xs font-normal block tracking-wider">{{ \Carbon\Carbon::parse($activity->created_at)->format('n/j/Y') }}</span>
							<span class="text-xs font-normal">{{ $activity->description }}</span>
						</div>
					@endforeach
				</div>

		   		<h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-cogs mr-1"></i> Update Feed</h2>
				<div class="card constrain-height">
					@foreach ($dashboard_items['updates'] as $update)
						<div class="border-b-2 py-6">
							<a href="{{ $update->site->path() }}"><span class="text-orange-500 text-sm">{{ $update->site->client->name }}</span></a>
							<span class="text-gray-500 text-sm"> / {{ $update->site->name }}</span><br>
							<p class="mb-0 text-sm">{{ $update->description }}</p>
							<div class="flex justify-end">
								<span class="text-gray-500 text-xs mr-1">{{ $update->user->initials() }} - </span>
								<span class="text-gray-500 text-xs"> {{ \Carbon\Carbon::parse($update->updated_at)->format('n/j/Y')}}</span>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>


		@include('dashboard._clients_modal', [
			'clients' => App\Client::all()->whereNotIn('status', App\Enums\ClientStatus::Archived)->sortBy('name')
		])

		@include('dashboard._projects_modal', [
			'projects' => App\Project::all()->whereNotIn('status', App\Enums\ProjectStatus::Archived)->sortBy('title')
		])

		@include('dashboard._sites_modal', [
			'sites' => App\Site::all()->whereNotIn('status', App\Enums\SiteStatus::Archived)->sortBy('name')
		])

		<div class="modal fade" id="legendModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Project Status Legend</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="flex">
							<div class="w-1/2">
								<p class="text-gray-500 text-sm font-normall"><i class="fa fa-check text-green-500"></i> = We good</p>
								<p class="text-gray-500 text-sm font-normall"><i class="fa fa-exclamation text-yellow-500"></i> = Chill out, we got time</p>
								<p class="text-gray-500 text-sm font-normall"><i class="fa fa-exclamation text-red-500"></i> = Nobody panic</p>
								<p class="text-gray-500 text-sm font-normall"><i class="fa fa-exclamation-triangle text-red-500"></i> = Everybody panic</p>
							</div>
							<div class="w-1/2">
								<img class="mx-auto" src="/media/misc/panda.jpeg">
							</div>
						</div>
						<div class="modal-footer">
							<a href="" class="button btn-blue" data-dismiss="modal">Close</a>
						</div>
					</div>
				</div>
			</div>
		</div>


	</main>
@endsection
