<div class="card mb-6" style="">
    <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-500 mb-3 pl-4">
        <a href="{{ $site->client->path() }}" class="text-black no-underline">{{ $site->client->name }}</a>
    </h3>
    <div class="mb-3">
        <p class="text-gray-800 text-sm font-normal">Status</p>
        <p class="text-gray-500 text-sm font-normal">{{ \App\Enums\SiteStatus::getDescription($site->status) }}</p>
    </div>
    <div class="mb-3">
        <p class="text-gray-800 text-sm font-normal">Technology/Framework</p>
        <p class="text-gray-500 text-sm font-normal">{{ \App\Enums\Technologies::getDescription($site->technology) }}</p>
    </div>

    <div class="mb-3">
        <p class="text-gray-800 text-sm font-normal">Hosting</p>
        <p class="text-gray-500 text-sm font-normal">{{$site->host->name}} ({{ \App\Enums\Owners::getKey($site->host->owner) }})</p>
    </div>

    <div class="mb-3">
        <p class="text-gray-800 text-sm font-normal">Services</p>
        @forelse ($site->services as $service)
            <p class="text-gray-500 text-sm font-normal">{{ $service->name }}</p>
        @empty
            <p class="text-gray-500 text-sm font-normal">None</p>
        @endforelse
        	<a href="#" class="text-blue-500 text-sm font-normal edit-services">Edit Services</a>
        <div class="mt-1">
            <form class="services-form hidden" action="{{$site->path()}}/services" method="post">
                @csrf
                @method('PATCH')
                @include('services.form')
                <button type="submit" class="button mt-2">Save</button>
            </form>
        </div>

    </div>
</div>
