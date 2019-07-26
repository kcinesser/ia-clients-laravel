<div class="card mb-6" style="">
    <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-500 mb-3 pl-4">
        <a href="{{ $client->path() }}" class="text-black no-underline">{{ $client->name }}</a>
    </h3>
    <div class="mb-3">
        <p class="text-gray-800 text-sm font-normal">Status</p>
        <p class="text-gray-500 text-sm font-normal">{{ \App\Enums\JobStatus::getDescription($site->status) }}</p>
    </div>
</div>
