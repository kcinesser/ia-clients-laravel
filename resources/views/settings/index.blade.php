@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <h2 class="text-gray-500 text-sm font-normal">Settings</h2>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
    	<div class="w-full">
			<ul class="list-reset flex border-b">
			  <li class="-mb-px mr-1">
			    <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-dark font-semibold" href="#">Users</a>
			  </li>
			  <li class="mr-1">
			    <a class="bg-white inline-block py-2 px-4 text-blue hover:text-blue-darker font-semibold" href="#">Registrars</a>
			  </li>
			  <li class="mr-1">
			    <a class="bg-white inline-block py-2 px-4 text-blue hover:text-blue-darker font-semibold" href="#">Tab</a>
			  </li>
			  <li class="mr-1">
			    <a class="bg-white inline-block py-2 px-4 text-grey-light font-semibold" href="#">Tab</a>
			  </li>
			</ul>


			<div class="p-4 w-full">
				@foreach($users as $user)
					<div class="flex justify-between mb-4">
						<div><p>{{ $user->name }}</p></div>
						<div><p>{{ $user->email }}</p></div>
						<div><p>{{ App\Enums\UserTypes::getDescription($user->role) }}</p></div>
					</div>
				@endforeach

				<a href="/user/create" class="button is-link mb-4">Register New User</a>
			</div>

			<div class="p-4 w-full">
				@foreach($registrars as $registrar)
					<div class="flex justify-between mb-4">
						<div>
							{{ $registrar->name }}
						</div>
						<div>
							{{ $registrar->url }}
						</div>
					</div>
				@endforeach

				<a href="{{ route('registrars.create') }}" class="button is-link mb-4">Create New Registrar</a>
			</div>

			<div class="p-4 w-full">
				@foreach($services as $service)
					<div class="flex justify-between mb-4">
						<div>
							{{ $service->name }}
						</div>
						<div>
							{{ $service->description }}
						</div>
					</div>
				@endforeach

				<a href="{{ route('services.create') }}" class="button is-link mb-4">Create New Service</a>
			</div>
		</div>
	</main>

@endsection