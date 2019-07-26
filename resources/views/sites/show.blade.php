@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500 text-sm font-normal">
            	<a href="{{ $client->path() }}" class="no-underline">{{ $client->name }}</a> / Job / {{ $site->title }}
            </p>
            <a href="{{ $site->path() . '/edit' }}" class="button">Edit Site</a>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-1/4 px-3">
 				@include ('sites.card')

              

    		</div>
    		<div class="lg:w-1/2 px-3">
                <div class="mb-8">            
                    <h2 class="text-3xl text-gray-800 font-normal mb-3">{{ $site->title }}</h2>
                    <p class="text-gray-500 text-sm font-normal">{{ $site->description }}</p>
                </div>

                <div class="mb-8">            
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Domains</h2>


    			<div class="mb-8">
	            	<h2 class="text-lg text-gray-500 font-normal mb-3">Notes</h2>

                    <form method="POST" action="{{ $site->path() . '/notes' }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <textarea name="notes" class="card w-full mb-3 h-300">{{ $site->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>
	            </div>


    	</div>
    </main>



@endsection