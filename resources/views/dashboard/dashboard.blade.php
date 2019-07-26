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
		   		<h2 class="text-lg text-gray-500 font-normal mb-3">Your Clients</h2>
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
		  		<h2 class="text-lg text-gray-500 font-normal mb-3">Your Projects</h2>
		   		<div  class="lg:flex lg:flex-wrap -mx-3">
			  		@forelse ($projects as $project)
			            <div class="lg:w-1/3 px-3 pb-6">
			                <div class="card" style="">
			                    <h3 class="py-4 -ml-5 border-l-4 border-orange-500 pl-4">
			                        <a href="{{ $project->path() }}" class="text-black no-underline">{{ $project->title }}</a>
			                        <a href="{{ $project->client->path() }}" class="text-gray-500 text-sm font-normal">{{ $project->client->name }}</a>
			                    </h3>
			                </div>

			            </div>
			        @empty
			            <div class="lg:w-1/3 px-3 pb-6">
			            	<p>No projects yet.</p>
			        	</div>
			        @endforelse
				</div>
			</div>
			<div class="lg:w-1/4 px-3">
		   		<h2 class="text-gray-500 mb-3">Activity Feed</h2>
		   		@foreach ($updates as $update)
		   			<a href="{{ $update->project->path() }}">
			   			<div class="card mb-3">
	                        <p class="text-gray-800">{{ $update->project->client->name }}</p>
	                    	<p class="text-gray-500">{{ $update->project->title }}</p>
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