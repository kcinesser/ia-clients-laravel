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
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Primary Developer</p>
        <p class="text-gray-500 text-sm font-normal">{{ $job->developer->name }}</p>
    </div>
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
            <form method="POST" action="{{ $job->path() . '/archive' }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500"><i class="fa fa-archive mr-1"></i> Archive Project</button>
            </form>
        @endif
    </div>
</div>
