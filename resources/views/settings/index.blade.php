@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="md:flex justify-between w-full items-center">
            <h2 class="text-blue-500"><i class="fa fa-cog mr-1"></i>Settings</h2>
			<div><!-- we could potentially get rid of these after we add the Add dropdown to the header -->
				<a href="/user/create" class="button btn-sm is-link"><i class="fa fa-plus mr-2"></i>User</a>
				<a href="{{ route('registrars.create') }}" class="button btn-sm is-link"><i class="fa fa-plus mr-2"></i>Registrar</a>
				<a href="{{ route('services.create') }}" class="button btn-sm is-link"><i class="fa fa-plus mr-2"></i>Service</a>
				<a href="{{ route('hosting.create') }}" class="button btn-sm is-link"><i class="fa fa-plus mr-2"></i>Host</a>
			</div>
        </div>
    </header>

    <!-- test comment -->

    <main class="lg:flex lg:flex-wrap">
    	<div class="w-full">

			<ul class="nav nav-tabs" id="settingsTabs" role="tablist">
				<li class="nav-item active">
					<a class="nav-link show no-underline" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="home" aria-selected="true">Users</a>
				</li>
				<li class="nav-item">
					<a class="nav-link no-underline" id="registrars-tab" data-toggle="tab" href="#registrars" role="tab" aria-controls="profile" aria-selected="false">Registrars</a>
				</li>
				<li class="nav-item">
					<a class="nav-link no-underline" id="services-tab" data-toggle="tab" href="#services" role="tab" aria-controls="contact" aria-selected="false">Services</a>
				</li>
				<li class="nav-item">
					<a class="nav-link no-underline" id="hosting-tab" data-toggle="tab" href="#hosting" role="tab" aria-controls="contact" aria-selected="false">Hosts</a>
				</li>
			</ul>
			<div class="tab-content settings-tabs" id="settingsTabContent">
				<div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
					<div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
						<div class="lg:w-1/4"><p>Name</p></div>
						<div class="lg:w-1/4"><p>Email</p></div>
						<div class="lg:w-1/4"><p>Role</p></div>
						<div class="lg:w-1/8"><i class="fa fa-search mr-1"></i></div>
					</div>
					@foreach($users as $user)
						<div class="lg:flex justify-between p-3">
							<div class="lg:w-1/4"><p>{{ $user->name }}</p></div>
							<div class="lg:w-1/4"><p>{{ $user->email }}</p></div>
							<div class="lg:w-1/4"><p>{{ App\Enums\UserTypes::getDescription($user->role) }}</p></div>
							<div class="lg:w-1/8"><a href="{{ route('user.edit', $user->id) }}" class="button btn-add-sm"><i class="fa fa-pencil"></i></a></div>
						</div>
					@endforeach
				</div>

				<div class="tab-pane fade" id="registrars" role="tabpanel" aria-labelledby="registrars-tab">
					<div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
						<div class="lg:w-1/4"><p>Name</p></div>
						<div class="lg:w-1/4"><p>Owner</p></div>
						<div class="lg:w-1/4"><p>URL</p></div>
						<div class="lg:w-1/8"><i class="fa fa-search mr-1"></i></div>
					</div>
					@foreach($registrars as $registrar)
						<div class="lg:flex justify-between p-3">
							<div class="lg:w-1/4">{{ $registrar->name }}</div>
							<div class="lg:w-1/4">{{ App\Enums\Owners::getDescription($registrar->owner) }}</div>
							<div class="lg:w-1/4">{{ $registrar->url }}</div>
							<div class="lg:w-1/8"><a href="{{ route('registrars.edit', $registrar->id) }}" class="button btn-add-sm"><i class="fa fa-pencil"></i></a></div>
						</div>
					@endforeach
				</div>

				<div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
					<div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
						<div class="lg:w-1/6"><p>Service Name</p></div>
						<div class="lg:w-1/2"><p>Description</p></div>
						<div class="lg:w-1/6"><p>Price</p></div>
						<div class="lg:w-1/8"><i class="fa fa-search mr-1"></i></div>
					</div>
					@foreach($services as $service)
						<div class="lg:flex justify-between p-3">
							<div class="lg:w-1/6">{{ $service->name }}</div>
							<div class="lg:w-1/2">{{ $service->description }}</div>
							<div class="lg:w-1/6">
								@if(isset($service->price))
									${{ $service->priceFormat() }}
								@endif
							</div>
							<div class="lg:w-1/8"><a href="{{ route('services.edit', $service->id) }}" class="button btn-add-sm"><i class="fa fa-pencil"></i></a></div>
						</div>
					@endforeach
				</div>
				<div class="tab-pane fade" id="hosting" role="tabpanel" aria-labelledby="hosting-tab">
					<div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
						<div class="lg:w-1/6"><p>Host Name</p></div>
						<div class="lg:w-1/2"><p>Details</p></div>
						<div class="lg:w-1/8"><i class="fa fa-search mr-1"></i></div>
					</div>
					@foreach($hosting as $host)
						<div class="lg:flex justify-between p-3">
							<div class="lg:w-1/6">{{ $host->name }} ({{\App\Enums\Owners::getKey($host->owner)}})</div>
							<div class="lg:w-1/2">{{ $host->details }}</div>
							<div class="lg:w-1/8"><a href="{{ route('hosting.edit', $host->id) }}" class="button btn-add-sm"><i class="fa fa-pencil"></i></a></div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</main>

@endsection
