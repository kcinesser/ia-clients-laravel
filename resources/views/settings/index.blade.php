@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-center">
            <h2 class="text-blue-500"><i class="fa fa-cog mr-1"></i>Settings</h2>
			<div><!-- we could potentially get rid of these after we add the Add dropdown to the header -->
				<a href="/user/create" class="button btn-sm is-link"><i class="fa fa-plus mr-2"></i>User</a>
				<a href="{{ route('registrars.create') }}" class="button btn-sm is-link"><i class="fa fa-plus mr-2"></i>Registrar</a>
				<a href="{{ route('services.create') }}" class="button btn-sm is-link"><i class="fa fa-plus mr-2"></i>Service</a>
			</div>
        </div>
    </header>

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
			</ul>
			<div class="tab-content settings-tabs" id="settingsTabContent">
				<div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
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
					@foreach($services as $service)
						<div class="lg:flex justify-between p-3">
							<div class="lg:w-1/4">{{ $service->name }}</div>
							<div class="lg:w-1/4">{{ $service->description }}</div>
							<div class="lg:w-1/4">
								@if(isset($service->price))
									${{ $service->priceFormat() }}
								@endif
							</div>
							<div class="lg:w-1/8"><a href="{{ route('services.edit', $service->id) }}" class="button btn-add-sm"><i class="fa fa-pencil"></i></a></div>
						</div>
					@endforeach
				</div>
			</div>

		</div>
	</main>

@endsection
