<div class="card mb-6" style="">
    <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-500 mb-3 pl-4">
        <a href="{{ $client->path() }}" class="text-black no-underline">{{ $client->name }}</a>
    </h3>
    <div class="mb-3">
        <p class="text-gray-800 text-sm font-normal">Status</p>
        <p class="text-gray-500 text-sm font-normal">{{ \App\Enums\JobStatus::getDescription($job->status) }}</p>
    </div>
    <div class="mb-3">
        <p class="text-gray-800 text-sm font-normal">Account Manager</p>
        <p class="text-gray-500 text-sm font-normal">{{ $client->accountManager->name }}</p>
    </div>
    <div class="mb-3">
        <p class="text-gray-800 text-sm font-normal">Primary Developer</p>
        <p class="text-gray-500 text-sm font-normal">{{ $job->developer->name }}</p>
    </div>
    <div class="mb-3">
        <p class="text-gray-800 text-sm font-normal">Technology/Framework</p>
        <p class="text-gray-500 text-sm font-normal">{{ \App\Enums\Technologies::getDescription($job->technology) }}</p>
    </div>
    <div class="mb-3">
        <p class="text-gray-800 text-sm font-normal">Job Start Date</p>
        <p class="text-gray-500 text-sm font-normal"> {{ isset($job->start_date) ? \Carbon\Carbon::parse($job->start_date)->format('n/j/Y') : $job->created_at }}</p>
    </div>
    <div class="mb-3">
        <p class="text-gray-800 text-sm font-normal">Job End Date</p>
        <p class="text-gray-500 text-sm font-normal"> {{ isset($job->end_date) ? \Carbon\Carbon::parse($job->end_date)->format('n/j/Y') : "None" }}</p>
    </div>
    <div class="mb-3">
        <p class="text-gray-800 text-sm font-normal">Go Live Date</p>
        <p class="text-gray-500 text-sm font-normal"> {{ isset($job->go_live_date) ? \Carbon\Carbon::parse($job->go_live_date)->format('n/j/Y') : "None" }}</p>
    </div>
    <div class="mb-3">
        @if ($job->status != 3)
            <form method="POST" action="{{ $job->path() . '/archive' }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}   
                <button type="submit" class="text-red-500 text-sm font-normal underline">Archive Project</button>     
            </form>
        @endif
    </div>
</div>
