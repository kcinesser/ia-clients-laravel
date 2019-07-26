@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500 text-sm font-normal">
            	<a href="{{ $client->path() }}" class="no-underline">{{ $client->name }}</a> / Site / {{ $site->name }}
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
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Domains</h2>

                    <div>
                        @forelse ($site->domains as $domain)
                            <div class="card mb-6">
                                <div class="flex justify-between">
                                    <div>
                                        <a href="{{ $domain->path() }}">{{ $domain->name }}</a>
                                    </div>
                                    <div>
                                        <a href="{{ $domain->domain_account->url }}">{{ $domain->domain_account->url }}</a>
                                    </div>
                                    <div>
                                        Exp: {{ $domain->exp_date }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card mb-3">
                                <p>No domains yet.</p>
                            </div>
                        @endforelse
                    </div>
                    <a href="{{ $site->path() }}/domains/create" class="button">Add Domain</a>

                </div>


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