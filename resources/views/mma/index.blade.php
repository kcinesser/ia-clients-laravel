@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="w-full">
            <h2 class="text-blue-500"><i class="fa fa-cog mr-1"></i>MMA Updates List</h2>
            <p class="text-gray-500 text-sm font-normal">For: {{ Carbon\Carbon::now()->format('F, Y') }}</p>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap">
    	<div class="w-full">
            <h2 class="text-gray-500 mb-1 headline-lead">Client External Sites</h2>
			<div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
				<div class="lg:w-1/5"><p>Site Name</p></div>
				<div class="lg:w-1/5"><p>Client</p></div>
				<div class="lg:w-1/5"><p>Account Manager</p></div>
				<div class="lg:w-1/5"><p>Has Update Instructions?</p></div>
				<div class="lg:w-1/4"><p></p></div>
			</div>
			@foreach($mma_sites as $site)
				<div class="lg:flex justify-between items-center relative {{ date('m',strtotime($site->mma_update)) == date('m') ? 'text-gray-500 line-through' : ''}}">
					<div class="lg:w-1/5"><a href="{{ $site->path() }}" class="text-sm">{{ $site->name }}</a></div>
					<div class="lg:w-1/5"><p class="text-sm">{{ $site->client->name }}</p></div>
					<div class="lg:w-1/5"><p class="text-sm">{{ $site->client->accountManager->name}}</p></div>
					<div class="lg:w-1/5">
						@if(isset($site->update_instructions))
							<p class="text-sm text-center text-green-500"><i class="fa fa-check"></i></p>
						@endif
					</div>
					<div class="lg:w-1/4 card">
                       <form action="{{ $site->path() . '/mma-update' }}" method="POST" class="flex justify-between">
                            @csrf
                            <input name="description" class="w-full text-xs" placeholder="Create new update." required autocomplete="off">
                        </form>
                    </div>
				</div>
			@endforeach

            <h2 class="text-gray-500 mb-1 headline-lead">Firespring Internal Sites</h2>
    			<div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
				<div class="lg:w-1/5"><p>Site Name</p></div>
				<div class="lg:w-1/5"><p>Client</p></div>
				<div class="lg:w-1/5"><p>Account Manager</p></div>
				<div class="lg:w-1/5"><p>Has Update Instructions?</p></div>
				<div class="lg:w-1/4"><p></p></div>
			</div>
			@foreach($mma_internal_sites as $site)
				<div class="lg:flex justify-between items-center relative {{ date('m',strtotime($site->mma_update)) == date('m') ? 'text-gray-500 line-through' : ''}}">
					<div class="lg:w-1/5"><a href="{{ $site->path() }}" class="text-sm">{{ $site->name }}</a></div>
					<div class="lg:w-1/5"><p class="text-sm">{{ $site->client->name }}</p></div>
					<div class="lg:w-1/5"><p class="text-sm">{{ $site->client->accountManager->name}}</p></div>
					<div class="lg:w-1/5">
						@if(isset($site->update_instructions))
							<p class="text-sm text-center text-green-500"><i class="fa fa-check"></i></p>
						@endif		
					</div>
					<div class="lg:w-1/4 card">
						<form action="{{ $site->path() . '/mma-update' }}" method="POST" class="flex justify-between">
                            @csrf
                            <input name="description" class="w-full text-xs" placeholder="Create new update." required autocomplete="off">
                        </form>
                    </div>
				</div>
			@endforeach
		</div>

	</main>

@endsection
