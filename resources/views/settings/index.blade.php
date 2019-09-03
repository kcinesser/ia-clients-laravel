@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="md:flex justify-between w-full items-center">
            <h2 class="text-blue-500"><i class="fa fa-cog mr-1"></i>Settings</h2>
			<div><!-- we could potentially get rid of these after we add the Add dropdown to the header -->
				<a href="" class="button btn-sm is-link" data-toggle="modal" data-target="#newUserModal"><i class="fa fa-plus mr-2"></i>User</a>
				<a href="" class="button btn-sm is-link" data-toggle="modal" data-target="#newRegistrarModal"><i class="fa fa-plus mr-2"></i>Registrar</a>
				<a href="" class="button btn-sm is-link" data-toggle="modal" data-target="#newServiceModal"><i class="fa fa-plus mr-2"></i>Service</a>
				<a href="" class="button btn-sm is-link" data-toggle="modal" data-target="#newHostModal"><i class="fa fa-plus mr-2"></i>Host</a>
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
						<div class="lg:flex justify-between items-center px-3 py-6 relative">
							<div class="lg:w-1/4"><p class="text-sm">{{ $user->name }}</p></div>
							<div class="lg:w-1/4"><p class="text-sm">{{ $user->email }}</p></div>
							<div class="lg:w-1/4"><p class="text-sm">{{ App\Enums\UserTypes::getDescription($user->role) }}</p></div>
							<div class="lg:w-1/8 edit-buttons flex items-end">
								<a href="" class="button btn-add-sm mr-1" data-toggle="modal" data-target="#editUserModal" data-name="{{ $user->name }}" data-id="{{ $user->id }}" data-role="{{ $user->role }}" data-email="{{ $user->email }}"><i class="fa fa-pencil"></i></a>
								@if($user->clients->count())
								<button type="button" class="button btn-delete-sm" data-toggle="modal" data-target="#userDeleteModel" data-id="{{ $user->id }}">
									<i class="fa fa-trash-o"></i>
								</button>
								@else
								<form method="POST" action="user/{{ $user->id }}" class="delete-form">
									@method('DELETE')
									@csrf
									<button type="submit" class="button btn-delete-sm"><i class="fa fa-trash-o"></i></button>
								</form>
								@endif
							</div>
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
						<div class="lg:flex justify-between items-center px-3 py-6 relative">
							<div class="lg:w-1/4"><p class="text-sm">{{ $registrar->name }}</p></div>
							<div class="lg:w-1/4"><p class="text-sm">{{ App\Enums\Owners::getDescription($registrar->owner) }}</p></div>
							<div class="lg:w-1/4"><p class="text-sm">{{ $registrar->url }}</p></div>
							<div class="lg:w-1/8 edit-buttons flex items-end">
								<a href="" class="button btn-add-sm mr-1" data-toggle="modal" data-target="#editRegistrarModal" data-name="{{ $registrar->name }}" data-url="{{ $registrar->url }}" data-description="{{ $registrar->description }}" data-id="{{ $registrar->id }}"><i class="fa fa-pencil"></i></a>
								<form method="POST" action="registrars/{{ $registrar->id }}" class="delete-form">
									@method('DELETE')
									@csrf
									<button type="submit" class="button btn-delete-sm"><i class="fa fa-trash-o"></i></button>
								</form>
							</div>
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
						<div class="lg:flex justify-between items-center px-3 py-6 relative">
							<div class="lg:w-1/6"><p class="text-sm">{{ $service->name }}</p></div>
							<div class="lg:w-1/2"><p class="text-sm">{{ $service->description }}</p></div>
							<div class="lg:w-1/6">
								@if(isset($service->price))
									<p class="text-sm">${{ $service->priceFormat() }}</p>
								@endif
							</div>
							<div class="lg:w-1/8 edit-buttons flex items-end">
								<a href="" class="button btn-add-sm mr-1" data-toggle="modal" data-target="#editServiceModal" data-name="{{ $service->name }}" data-description="{{ $service->description }}" data-price="{{ $service->price }}" data-id="{{ $service->id }}"><i class="fa fa-pencil"></i></a>
								<form method="POST" action="services/{{ $service->id }}" class="delete-form">
									@method('DELETE')
									@csrf
									<button type="submit" class="button btn-delete-sm"><i class="fa fa-trash-o"></i></button>
								</form>
							</div>
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
						<div class="lg:flex justify-between items-center px-3 py-6 relative">
							<div class="lg:w-1/6"><p class="text-sm">{{ $host->name }} ({{\App\Enums\Owners::getKey($host->owner)}})</p></div>
							<div class="lg:w-1/2"><p class="text-sm">{{ $host->details }}</p></div>
							<div class="lg:w-1/8 edit-buttons flex items-end">
								<a href="" class="button btn-add-sm mr-1" data-toggle="modal" data-target="#editHostModal" data-name="{{ $host->name }}" data-details="{{ $host->details }}" data-owner="{{ $host->owner }}" data-id="{{ $host->id }}"><i class="fa fa-pencil"></i></a>
								<form method="POST" action="hosting/{{ $host->id }}" class="delete-form">
									@method('DELETE')
									@csrf
									<button type="submit" class="button btn-delete-sm"><i class="fa fa-trash-o"></i></button>
								</form>
							</div>
						</div>
					@endforeach

					@if ($errors->any())
                        <div class="mt-6">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm text-red-500">{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
				</div>
			</div>
		</div>

        @include('users._new_user_modal')
        @include('users._edit_user_modal')
    	@include('registrars._new_registrar_modal')
    	@include('registrars._edit_registrar_modal')
    	@include('services._new_service_modal')
    	@include('services._edit_service_modal')
    	@include('hosting._new_host_modal')
    	@include('hosting._edit_host_modal')
		@include('settings.partials._reassign_am_modal')

	</main>

@endsection
