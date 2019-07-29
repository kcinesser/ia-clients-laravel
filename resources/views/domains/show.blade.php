@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <p class="text-gray-500 text-sm font-normal">
            	<a href="{{ $domain->site->path() }}" class="no-underline">{{ $domain->site->name }}</a> / {{ $domain->name }}
            </p>
            <a href="{{ $domain->path() . '/edit' }}" class="button">Edit Domain</a>
        </div>
    </header>

    <main>
    	<div class="lg:flex -mx-3">
            <div class="lg:w-1/2 px-3 mx-auto">
                <div class="mb-8">            
                    <h2 class="text-lg text-gray-500 font-normal mb-3">Domain Information</h2>

                    <div class="card">
                        <p class="mb-3">{{ $domain->name }}</p>
                        <p class="mb-3">Registrar: <a href="{{ $domain->registrar->url }}" target="_blank">{{ $domain->registrar->name }}</a></p>
                        <p class="mb-3">Expires: {{ $domain->exp_date }}</p>
                    </div>
                </div>
            </div>
    	</div>
    </main>



@endsection