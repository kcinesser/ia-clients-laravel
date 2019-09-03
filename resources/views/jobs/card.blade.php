<div class="card mb-6">
    <h3 class="mb-3">
        <i class="fa fa-users mr-3"></i><a href="{{ $client->path() }}" class="text-black no-underline">{{ $client->name }}</a>
    </h3>
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Status</p>
        <p class="text-gray-500 text-sm font-normal">{{ \App\Enums\JobStatus::getDescription($job->status) }}</p>
    </div>
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Account Manager</p>
        <p class="text-gray-500 text-sm font-normal">{{ $client->accountManager->name }}</p>
    </div>
    @if ($client->contact_name || $client->contact_email || $client->contact_phone)
        <div class="mb-4">
            <p class="text-gray-800 text-xs headline-lead">Primary Contact Information</p>
            @if($client->contact_name)<p class="text-gray-500 text-sm font-normal"><i class="fa fa-user mr-3"></i>{{ $client->contact_name }}</p>@endif
            @if($client->contact_email)<p class="text-gray-500 text-sm font-normal"><i class="fa fa-envelope mr-3"></i>{{ $client->contact_email }}</p>@endif
            @if($client->contact_phone)<p class="text-gray-500 text-sm font-normal"><i class="fa fa-phone mr-3"></i>{{ $client->contact_phone }}</p>@endif
        </div>
    @endif
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Client Since</p>
        <p class="text-gray-500 text-sm font-normal"> {{ \Carbon\Carbon::parse($client->created_at)->format('n-j-Y')}}</p>
    </div>
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Primary Developer</p>
        <p class="text-gray-500 text-sm font-normal">{{ !empty($job->developer->name) ? $job->developer->name : 'None' }}</p>
    </div>
    @if($job->site()->exists())
        <div class="mb-4">
            <p class="text-gray-800 text-xs headline-lead">Site</p>
            <p class="text-gray-500 text-sm font-normal"><a class="text-blue-500 no-underline" href="{{ $job->site->path() }}">{{ $job->site->name }}</a></p>
        </div>
    @endif
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Technology/Framework</p>
        <p class="text-gray-500 text-sm font-normal">{{ \App\Enums\Technologies::getDescription($job->technology) }}</p>
    </div>
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Job Start Date</p>
        <p class="text-gray-500 text-sm font-normal"> {{ isset($job->start_date) ? \Carbon\Carbon::parse($job->start_date)->format('n/j/Y') : $job->created_at }}</p>
    </div>
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Job End Date</p>
        <p class="text-gray-500 text-sm font-normal"> {{ isset($job->end_date) ? \Carbon\Carbon::parse($job->end_date)->format('n/j/Y') : "None" }}</p>
    </div>
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Go Live Date</p>
        <p class="text-gray-500 text-sm font-normal"> {{ isset($job->go_live_date) ? \Carbon\Carbon::parse($job->go_live_date)->format('n/j/Y') : "None" }}</p>
    </div>


    <div class="text-right">
        @if ($job->status != 3)
            <form class="archive-job-form" method="POST" action="{{ $job->path() . '/archive' }}">
                @method('PATCH')
                @csrf
                <button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500"><i class="fa fa-archive mr-1"></i> Archive Job</button>
            </form>
        @else
            <form method="POST" action="{{ $job->path() }}">
                @method('PATCH')
                @csrf
                <input type="hidden" name="status" value="1">
                <button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500"><i class="fa fa-archive mr-1"></i> Restore Job</button>
            </form>
            <form class="delete-form" method="POST" action="{{ $job->path() }}">
                @method('DELETE')
                @csrf
                <input type="hidden" name="status" value="1">
                <button type="submit" class="headline-lead text-xs text-red-500 hover:text-orange-500"><i class="fa fa-trash mr-1"></i> DELETE PERMANENTLY</button>
            </form>
        @endif
    </div>
</div>
