@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500 text-sm font-normal">
            	<a href="/projects" class="no-underline">My Projects</a> / {{ $project->title }}
            </p>
            <a href="/projects/create" class="button">Create New Project</a>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-1/4 px-3">
 				@include ('projects.card')
    		</div>
    		<div class="lg:w-3/4 px-3">
    			<div class="mb-8">            
	    			<h2 class="text-lg text-gray-500 font-normal mb-3">Tasks</h2>
		            <div class="card mb-3">Lorem ipsum.</div>
		            <div class="card mb-3">Lorem ipsum.</div>
		            <div class="card mb-3">Lorem ipsum.</div>
		            <div class="card mb-3">Lorem ipsum.</div>
	    			{{-- tasks --}}
    			</div>
    			<div>
	            	<h2 class="text-lg text-gray-500 font-normal mb-3">Notes</h2>
	            	<textarea class="card w-full">Lorem ipsum.</textarea>
	            	{{-- notes --}}
	            </div>
			</div>
    	</div>
    </main>



@endsection