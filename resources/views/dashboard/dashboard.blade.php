@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <h1>Dashboard</h1>
        </div>
    </header>

    <main>
    	<div class="lg:flex">
    		<div class="lg:w-3/4 lg:pr-6">
		   		<h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-users mr-1"></i> Your Clients</h2>
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
		    	<div class="text-right mb-4">
		    		<button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500" data-toggle="modal" data-target="#clientsModal"><i class="fa fa-th-list mr-1"></i> View All Clients</button>
		    	</div>
		  		<h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-tasks mr-1"></i> Your Jobs</h2>
		   		<div  class="lg:flex lg:flex-wrap card">
			  		@forelse ($jobs as $job)
			            <div class="lg:w-full p-2">
			            	<h3><a href="{{ $job->path() }}">{{ $job->title }}</a></h3>
							<p><a href="{{ $job->client->path() }}" class="text-gray-500 text-sm font-normal">{{ $job->client->name }}</a></p>
						</div>
					@empty
			            <div class="lg:w-full p-2">
			            	<p>No jobs yet.</p>
			        	</div>
			        @endforelse
				</div>
		    	<div class="text-right mb-4">
		    		<button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500" data-toggle="modal" data-target="#jobsModal"><i class="fa fa-th-list mr-1"></i> View All Jobs</button>
		    	</div>

		    	<h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-window-maximize mr-1"></i> Your Sites</h2>
		   		<div  class="lg:flex lg:flex-wrap card">
			  		@forelse ($sites as $site)
			            <div class="lg:w-full p-2">
			            	<h3><a href="{{ $site->path() }}">{{ $site->name }}</a></h3>
							<p><a href="{{ $site->client->path() }}" class="text-gray-500 text-sm font-normal">{{ $site->client->name }}</a></p>
						</div>
					@empty
			            <div class="lg:w-full p-2">
			            	<p>No jobs yet.</p>
			        	</div>
			        @endforelse
				</div>
		    	<div class="text-right mb-4">
		    		<button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500" data-toggle="modal" data-target="#sitesModal"><i class="fa fa-th-list mr-1"></i> View All Sites</button>
		    	</div>
			</div>
			<div class="lg:w-1/4 lg:pl-6">
		   		<h2 class="text-gray-500 mb-2 headline-lead"><i class="fa fa-commenting-o mr-1"></i> Activity Feed</h2>
				<div class="card constrain-height">
					@foreach ($activities as $activity)
						<div class="border-b-2 py-6">
							<span class="text-gray-500 text-xs font-normal block">{{ \Carbon\Carbon::parse($activity->created_at)->format('n/j/Y') }}</span>
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

		@include('dashboard._jobs_modal', [
			'jobs' => App\Job::all()->whereNotIn('status', 3)->sortBy('title')
		])

		@include('dashboard._sites_modal', [
			'sites' => App\Site::all()->whereNotIn('status', 4)->sortBy('name')
		])

	</main>
@endsection
