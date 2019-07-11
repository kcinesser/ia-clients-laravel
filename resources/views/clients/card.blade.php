<div class="card" style="height:200px;">
    <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-500 mb-3 pl-4">
        <a href="{{ $client->path() }}" class="text-black no-underline">{{ $client->name }}</a>
    </h3>
    <p class="text-gray-500 text-sm font-normal">{{ $client->created_at }}</p>
</div>
