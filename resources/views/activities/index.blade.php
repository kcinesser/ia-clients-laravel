@extends ('layouts.app')

@section('content')

    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500 text-sm font-normal">
            	<a href="/clients" class="no-underline">All Activities</a>
            </p>
        </div>
    </header>

 	<main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-full px-3">
    			@forelse($activities as $activity)
					 <div class="w-full px-3 pb-6">
                        <div class="card flex justify-between">
                            <p class="text-gray-800 text-sm font-normal">{{ $activity->description }}</p>
		                    <p class="text-gray-500 text-sm font-normal">{{ $activity->user->initials() }}
	                        <p class="text-gray-500 text-sm font-normal">{{ \Carbon\Carbon::parse($activity->created_at)->format('n/j/Y') }}
                        </div>
                    </div>
    			@empty
    				<p>No activities recored yet.</p>

    			@endforelse
			</div>	
    	</div>
    </main>

@endsection