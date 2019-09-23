@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-start w-full items-center">
            <h1 class="text-blue-500"><i class="fa fa-laptop mr-3"></i>All Sites</h1>
            <a href="" class="button btn-add ml-4" data-toggle="modal" data-target="#newSiteMenuModal"><i class="fa fa-plus"></i></a>
        </div>
    </header>

    <main>
        <div class="flex items-center justify-between">
            <div id="site-filter" class="mb-3 flex items-center search-bar justify-between">
                <div class="control flex items-center">
                    <p class="mb-0 mr-3">Filter:</p>
                    <input type="text" data-model="site" placeholder="Search sites...">
                </div>
            </div>
            <div>
                <a href="/mma" class="headline-lead text-xs text-gray-500 hover:text-orange-500 no-underline pl-3"><i class="fa fa-star mr-1"></i> MMA Sites</a>
                <a href="/sites/archives" class="headline-lead text-xs text-gray-500 hover:text-orange-500 no-underline pl-3"><i class="fa fa-archive mr-1"></i> archived sites</a>
            </div>
        </div>


        <div class="tab-content settings-tabs" id="settingsTabContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <div class="lg:flex p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                    <div class="lg:w-1/4"><p>Site <button class="sort" data-order="asc" data-sort="name" data-model="site"><i class="fa fa-sort mr-1"></i></button></p></div>
                    <div class="lg:w-1/4"><p>Client <button class="sort" data-order="asc" data-sort="clientName" data-model="site"><i class="fa fa-sort mr-1"></i></button></p></div>
                    <div class="lg:w-1/4"><p>Status <button class="sort" data-order="asc" data-sort="status" data-model="site"><i class="fa fa-sort mr-1"></i></button></p></div>
                </div>
                <div id="site-modal-list">
                    @foreach($sites as $site)
                        <div class="lg:flex justify-between p-3">
                            <div class="lg:w-1/4"><a href="{{ $site->path() }}">{{ $site->name }}</a></div>
                            <div class="lg:w-1/4"><p>{{ $site->client->name }}</p></div>
                            <div class="lg:w-1/4"><p>{{ \App\Enums\SiteStatus::getDescription($site->status) }}</p></div>
                            <div class="lg:w-1/4 text-right">
                                @if(!$site->favorite)
                                    <form method="POST" action='/favorite/site/{{ $site->id }}'>
                                        @csrf
                                        <button type="submit"><i class="fa fa-star-o text-yellow-300"></i></button>
                                    </form>
                                @else
                                    <form method="POST" action='/favorite/{{ $site->favorite->id }}'>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="fa fa-star text-yellow-300"></i></button>
                                    </form>
                                @endif  
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
