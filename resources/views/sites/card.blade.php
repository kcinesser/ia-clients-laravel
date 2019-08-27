<div class="card mb-6">
    <h3 class="mb-3">
        <i class="fa fa-users mr-3"></i><a href="{{ $site->client->path() }}" class="text-black no-underline">{{ $site->client->name }}</a>
    </h3>
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Status</p>
        <p class="text-gray-500 text-sm font-normal">{{ \App\Enums\SiteStatus::getDescription($site->status) }}</p>
    </div>
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Technology/Framework</p>
        <p class="text-gray-500 text-sm font-normal">{{ \App\Enums\Technologies::getDescription($site->technology) }}</p>
    </div>
    
    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Hosting</p>
        <p class="text-gray-500 text-sm font-normal">{{$site->host->name}} ({{ \App\Enums\Owners::getKey($site->host->owner) }})</p>
    </div>

    <div class="mb-4">
        <p class="text-gray-800 text-xs headline-lead">Services</p>

        @forelse ($site->services as $service)
            <p class="text-gray-500 text-sm font-normal">{{ $service->name }}</p>
        @empty
            <p class="text-gray-500 text-sm font-normal">None</p>
        @endforelse
            <a href="#" class="headline-lead text-xs edit-services"><i class="fa fa-cog mr-1"></i> Edit Services</a>
        <div class="mt-1">
            <form class="services-form hidden" action="{{$site->path()}}/services" method="post">
                @csrf
                @method('PATCH')
                @include('services.form')
                <button type="submit" class="button mt-2">Save</button>
            </form>
        </div>
    </div>

    <div class="text-right">
        @if ($site->status != 4)
            <form class="archive-site-form" method="POST" action="{{ $site->path() . '/archive' }}">
                @method('PATCH')
                @csrf
                <button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500"><i class="fa fa-archive mr-1"></i> Archive Site</button>
            </form>
        @else
            <form method="POST" action="{{ $site->path() }}">
                @method('PATCH')
                @csrf
                <input type="hidden" name="status" value="1">
                <button type="submit" class="headline-lead text-xs text-gray-500 hover:text-orange-500"><i class="fa fa-archive mr-1"></i> Restore Site</button>
            </form>
            <form class="delete-form" method="POST" action="{{ $site->path() }}">
                @method('DELETE')
                @csrf
                <input type="hidden" name="status" value="1">
                <button type="submit" class="headline-lead text-xs text-red-500 hover:text-orange-500"><i class="fa fa-trash mr-1"></i> DELETE PERMANENTLY</button>
            </form>
        @endif
    </div>
</div>
