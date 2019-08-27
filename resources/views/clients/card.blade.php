<div class="card">
    <h3 class="mb-3">
        <i class="fa fa-users mr-3"></i><a href="{{ $client->path() }}" class="no-underline">{{ $client->name }}</a>
    </h3>
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Status</p>
        <p class="text-gray-500 text-sm font-normal">{{ \App\Enums\JobStatus::getDescription($client->status) }}</p>
    </div>
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
    <div class="text-right">
        @if ($client->status != 3)
            <form class="archive-client-form" method="POST" action="{{ $client->path() . '/archive' }}">
                @method('PATCH')
                @csrf
                <button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500"><i class="fa fa-archive mr-1"></i> Archive Client</button>
            </form>
        @else
            <form method="POST" action="{{ $client->path() }}">
                @method('PATCH')
                @csrf
                <input type="hidden" name="status" value="1">
                <button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500"><i class="fa fa-archive mr-1"></i> Restore Job</button>
            </form>
            <form class="delete-form" method="POST" action="{{ $client->path() }}">
                @method('DELETE')
                @csrf
                <input type="hidden" name="status" value="1">
                <button type="submit" class="headline-lead text-xs text-red-500 hover:text-orange-500"><i class="fa fa-trash mr-1"></i> DELETE PERMANENTLY</button>
            </form>
        @endif
    </div>
</div>
