@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500">Dashboard</p>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-3/4 px-3">
		   		<h2 class="text-gray-500 mb-3">Your Clients</h2>
		   		<div  class="lg:flex lg:flex-wrap -mx-3">
			   		@forelse ($clients as $client)
			            <div class="lg:w-1/3 px-3 pb-6">
			                <div class="card" style="">
			                    <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-orange-500 pl-4">
			                        <a href="{{ $client->path() }}" class="text-black no-underline">{{ $client->name }}</a>
			                    </h3>
			                </div>

			            </div>
			        @empty
			            <div class="lg:w-1/3 px-3 pb-6">
			            	<p>No clients yet.</p>
			        	</div>
			        @endforelse
		    	</div>
		  		<h2 class="text-gray-500 mb-3">Your Jobs</h2>
		   		<div  class="lg:flex lg:flex-wrap -mx-3">
			  		@forelse ($jobs as $job)
			            <div class="lg:w-1/3 px-3 pb-6">
			                <div class="card" style="">
			                    <h3 class="py-4 -ml-5 border-l-4 border-orange-500 pl-4">
			                        <a href="{{ $job->path() }}" class="text-black no-underline">{{ $job->title }}</a>
			                        <a href="{{ $job->client->path() }}" class="text-gray-500 text-sm font-normal">{{ $job->client->name }}</a>
			                    </h3>
			                </div>

			            </div>
			        @empty
			            <div class="lg:w-1/3 px-3 pb-6">
			            	<p>No jobs yet.</p>
			        	</div>
			        @endforelse
				</div>
			</div>
			<div class="lg:w-1/4 px-3">
		   		<h2 class="text-gray-500 mb-3">Activity Feed</h2>
		   		@foreach ($activities as $activity)
		   			<div class="card mb-3">
                        <p class="text-gray-800 text-sm font-normal">{{ $activity->description }}</p>
                    	<p class="text-gray-500 text-sm font-normal">{{ \Carbon\Carbon::parse($activity->created_at)->format('n/j/Y') }}</p>
                    </div>
		   		@endforeach

		   		<h2 class="text-gray-500 mb-3">Update Feed</h2>
		   		@foreach ($updates as $update)
		   			<a href="{{ $update->site->path() }}">
			   			<div class="card mb-3">
	                        <p class="text-gray-800">{{ $update->site->client->name }}</p>
	                    	<p class="text-gray-500">{{ $update->site->name }}</p>
                            <div class="flex justify-between items-center">
                                <p class="w-3/4">{{ $update->description }}</p>
                                <div>
                                    <p class="text-gray-500">{{ $update->user->initials() }}</p>
                                    <p class="text-gray-500">{{ \Carbon\Carbon::parse($update->updated_at)->format('n/j/Y')}}</p>
                                </div>
                            </div>
	                    </div>
	                </a>
		   		@endforeach
			</div>
		</div>
	</main>
@endsection