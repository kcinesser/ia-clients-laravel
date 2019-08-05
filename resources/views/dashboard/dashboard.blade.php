@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <h1>Dashboard</h1>
        </div>
    </header>

    <main>
    	<div class="lg:flex">
    		<div class="lg:w-3/4 pr-6">
		   		<h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-users mr-1"></i> Your Clients</h2>
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
		  		<h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-tasks mr-1"></i> Your Jobs</h2>
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
			</div>
			<div class="lg:w-1/4 pl-6">
		   		<h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-commenting-o mr-1"></i> Activity Feed</h2>
				<div class="card constrain-height">
					@foreach ($activities as $activity)
						<div class="border-b-2 py-6">
							<span class="text-gray-500 text-xs font-normal block">{{ \Carbon\Carbon::parse($activity->created_at)->format('n/j/Y') }}</span>
							<span class="text-xs font-normal">{{ $activity->description }}</span>
						</div>
					@endforeach
				</div>

		   		<h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-cogs mr-1"></i> Update Feed</h2>
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
	</main>
@endsection
