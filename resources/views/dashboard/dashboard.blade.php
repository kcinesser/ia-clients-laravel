@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-6 py-4">
        <div class="flex justify-between w-full items-center">
            <h1>Dashboard</h1>
        </div>
    </header>

    <main>
    	<div class="lg:flex">
    		<div class="lg:w-3/4 lg:pr-6">
    			<div class="flex justify-between mb-1">
    		   		<h2 class="inline-block text-gray-500 headline-lead"><i class="fa fa-users mr-1"></i> Your Clients</h2>
    		   		<div class="inline-block text-right">
    		    		<button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500" data-toggle="modal" data-target="#clientsModal"><i class="fa fa-th-list mr-1"></i> <span class="hidden sm:inline">View </span>All Clients</button>
    		    	</div>
    		    </div>
		   		<div  class="lg:flex lg:flex-wrap card">
			   		@forelse ($clients as $client)
						<div class="lg:w-full p-2">
							<h3><a href="{{ $client->path() }}">{{ $client->name }}</a></h3>
						</div>
			        @empty
			            <div class="lg:w-full p-2">
			            	<p>No clients yet.</p>
			        	</div>
			        @endforelse
		    	</div>
		    	
		    	<div class="flex justify-between mb-1">
    		  		<h2 class="inline-block text-gray-500 headline-lead"><i class="fa fa-tasks mr-1"></i> Your Projects</h2>
    		  		<div class="inline-block text-right">
    		    		<button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500" data-toggle="modal" data-target="#projectsModal"><i class="fa fa-th-list mr-1"></i> <span class="hidden sm:inline">View </span>All Projects</button>
    		    	</div>
		    	</div>
		   		<div  class="lg:flex lg:flex-wrap card">
			  		@forelse ($projects as $project)
			            <div class="lg:w-full p-2">
			            	<h3><a href="{{ $project->path() }}">{{ $project->title }}</a></h3>
							<p><a href="{{ $project->client->path() }}" class="text-gray-500 text-sm font-normal">{{ $project->client->name }}</a></p>
						</div>
					@empty
			            <div class="lg:w-full p-2">
			            	<p>No projects yet.</p>
			        	</div>
			        @endforelse
				</div>
				
				<div class="flex justify-between mb-1">
    		    	<h2 class="inline-block text-gray-500 headline-lead"><i class="fa fa-window-maximize mr-1"></i> Your Sites</h2>
    		    	<div class="inline-block text-right">
    		    		<button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500" data-toggle="modal" data-target="#sitesModal"><i class="fa fa-th-list mr-1"></i> <span class="hidden sm:inline">View </span>All Sites</button>
    		    	</div>
		    	</div>
		   		<div  class="lg:flex lg:flex-wrap card">
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
							<p><a href="{{ $site->client->path() }}" class="text-gray-500 text-sm font-normal">{{ $site->client->name }}</a></p>
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
				<div class="card">
					@foreach ($activities as $activity)
						<div class="border-b-2 py-6">
							<span class="text-gray-500 text-xs font-normal block tracking-wider">{{ \Carbon\Carbon::parse($activity->created_at)->format('n/j/Y') }}</span>
							<span class="text-xs font-normal">{{ $activity->description }}</span>
						</div>
					@endforeach
				</div>

		   		<h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-cogs mr-1"></i> Update Feed</h2>
				<div class="card constrain-height">
					@foreach ($updates as $update)
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
			'clients' => App\Client::all()->whereNotIn('status', 3)->sortBy('name')
		])

		@include('dashboard._projects_modal', [
			'projects' => App\Project::all()->whereNotIn('status', 3)->sortBy('title')
		])

		@include('dashboard._sites_modal', [
			'sites' => App\Site::all()->whereNotIn('status', 4)->sortBy('name')
		])

	</main>
@endsection
