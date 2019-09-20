<div class="card">
    <h3 class="mb-3">
        <i class="fa fa-users mr-3"></i><a href="{{ $client->path() }}" class="no-underline">{{ $client->name }}</a>
    </h3>
    <div class="mb-6">
        <p class="text-gray-800 text-xs headline-lead">Status</p>
        <p class="small">{{ \App\Enums\ClientStatus::getDescription($client->status) }}</p>
    </div>
    <div class="mb-6">
        <p class="text-gray-800 text-xs headline-lead">Account Manager</p>
        <p class="small">{{ $client->accountManager->name }}</p>
    </div>
    @if ($client->contact_name || $client->contact_email || $client->contact_phone)
        <div class="mb-6">
            <p class="text-gray-800 text-xs headline-lead">Primary Contact Information</p>
            @if($client->contact_name)<p class="small"><i class="fa fa-user mr-3"></i>{{ $client->contact_name }}</p>@endif
            @if($client->contact_email)<p class="small"><i class="fa fa-envelope mr-3"></i>{{ $client->contact_email }}</p>@endif
            @if($client->contact_phone)<p class="small"><i class="fa fa-phone mr-3"></i>{{ $client->contact_phone }}</p>@endif
        </div>
    @endif
	<div class="mb-6">
    	<p class="text-gray-800 text-xs headline-lead">Client Since</p>
    	<p class="small"> {{ \Carbon\Carbon::parse($client->created_at)->format('n-j-Y')}}</p>
	</div>
    <div class="mb-6">
        <p class="text-gray-800 text-xs headline-lead">Client Archives</p>
        <p class="small"><a href="{{ $client->siteArchivePath() }}">{{ count($archived_sites) }} Archived {{Illuminate\Support\Str::plural('Site', count($archived_sites))}} <i class="fa fa-share ml-1"></i></a></p>
        <p class="small"><a href="{{ $client->projectArchivePath() }}">{{ count($archived_projects) }} Archived {{Illuminate\Support\Str::plural('Project', count($archived_projects))}} <i class="fa fa-share ml-1"></i></a></p>
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
                <button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500"><i class="fa fa-archive mr-1"></i> Restore Client</button>
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
