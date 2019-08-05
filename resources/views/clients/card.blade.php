<div class="card">
    <h3 class="mb-3">
        <i class="fa fa-users mr-3"></i><a href="{{ $client->path() }}" class="no-underline">{{ $client->name }}</a>
    </h3>
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Account Manager</p>
        <p class="text-gray-500 text-sm font-normal">{{ $client->accountManager->name }}</p>
    </div>
    <div class="mb-4">
    	<p class="text-gray-800 text-xs headline-lead">Primary Contact Information</p>
        <p class="text-gray-500 text-sm font-normal"><i class="fa fa-user mr-3"></i>{{ $client->contact_name }}</p>
    	<p class="text-gray-500 text-sm font-normal"><i class="fa fa-envelope mr-3"></i>{{ $client->contact_email }}</p>
    	<p class="text-gray-500 text-sm font-normal"><i class="fa fa-phone mr-3"></i>{{ $client->contact_phone }}</p>
	</div>
	<div class="mb-4">
    	<p class="text-gray-800 text-xs headline-lead">Client Since</p>
    	<p class="text-gray-500 text-sm font-normal"> {{ \Carbon\Carbon::parse($client->created_at)->format('n-j-Y')}}</p>
	</div>
</div>
