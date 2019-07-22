@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500 text-sm font-normal">Dashboard</p>
        </div>
    </header>

    <main>
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
	            <div>No clients yet.</div>
	        @endforelse
    	</div>
  		<h2 class="text-lg text-gray-500 font-normal mb-3">Your Projects</h2>
   		<div  class="lg:flex lg:flex-wrap -mx-3">
	  		@forelse ($projects as $project)
	            <div class="lg:w-1/3 px-3 pb-6">
	                <div class="card" style="">
	                    <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-orange-500 pl-4">
	                        <a href="{{ $project->path() }}" class="text-black no-underline">{{ $project->title }}</a>
	                        <a href="{{ $project->client->path() }}" class="text-gray-500 text-sm font-normal">{{ $project->client->name }}</a>
	                    </h3>
	                </div>

	            </div>
	        @empty
	            <div>No clients yet.</div>
	        @endforelse
		</div>
	</main>
@endsection