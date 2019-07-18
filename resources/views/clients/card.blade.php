<div class="card" style="">
    <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-500 mb-3 pl-4">
        <a href="{{ $client->path() }}" class="text-black no-underline">{{ $client->name }}</a>
    </h3>
    <div class="mb-3">
        <p class="text-gray-800 text-sm font-normal">Account Manager</p>
        <p class="text-gray-500 text-sm font-normal">{{ $client->accountManager->name }}</p>
    </div>
    <div class="mb-3">
    	<p class="text-gray-800 text-sm font-normal">Primary Contact Information</p>
    	<p class="text-gray-500 text-sm font-normal">{{ $client->contact_email }}</p>
    	<p class="text-gray-500 text-sm font-normal">{{ $client->contact_phone }}</p>
	</div>
	<div class="mb-3">
    	<p class="text-gray-800 text-sm font-normal">Client Since</p>
    	<p class="text-gray-500 text-sm font-normal"> {{ \Carbon\Carbon::parse($client->created_at)->format('n/j/Y')}}</p>
	</div>
</div>
