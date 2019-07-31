@extends ('layouts.app')

@section('content')

    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
        	<h2 class="text-gray-500 mb-3">All Activities</h2>
        </div>
    </header>

 	<main>
    	<div class="lg:flex -mx-3">
    		<div class="lg:w-full px-3">
    			@forelse($activities as $activity)
					 <div class="w-full px-3 pb-6">
                        <div class="card flex justify-between">
                            <p class="text-gray-800 text-sm font-normal w-1/2">{{ $activity->description }}</p>
                            <div class="w-1/2 flex">
                                <p class="text-gray-500 text-sm font-normal w-1/3">{{ $activity->user->initials() }}</p>
                                <p class="text-gray-500 text-sm font-normal w-1/3">{{ \Carbon\Carbon::parse($activity->created_at)->format('n/j/Y') }}</p>
                            </div>
                        </div>
                    </div>
    			@empty
    				<p>No activities recored yet.</p>

    			@endforelse
			</div>	
    	</div>
    </main>

@endsection