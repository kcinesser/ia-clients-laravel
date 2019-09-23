@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-start w-full items-center">
            <h1 class="text-blue-500"><i class="fa fa-tasks mr-3"></i>All Projects</h1>
            <a href="" class="button btn-add ml-4" data-toggle="modal" data-target="#newProjectMenuModal"><i class="fa fa-plus"></i></a>
        </div>
    </header>

    <main>
        <div class="flex items-center justify-between">
            <div id="project-filter" class="mb-3 flex items-center search-bar">
                <div class="control flex items-center">
                    <p class="mb-0 mr-3">Filter:</p>
                    <input type="text" data-model="project" placeholder="Search projects...">
                </div>
            </div>
            <a href="/projects/archives" class="headline-lead text-xs text-gray-500 hover:text-orange-500 no-underline pl-3"><i class="fa fa-archive mr-1"></i> archived projects</a>
        </div>


        <div class="tab-content settings-tabs" id="settingsTabContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <div class="lg:flex p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                    <div class="lg:w-1/5"><p>Project Title <button class="sort" data-order="asc" data-sort="title" data-model="project"><i class="fa fa-sort mr-1"></i></button></p></div>
                    <div class="lg:w-1/5"><p>Client <button class="sort" data-order="asc" data-sort="clientName" data-model="project"><i class="fa fa-sort mr-1"></i></button></p></div>
                    <div class="lg:w-1/5"><p>Status <button class="sort" data-order="asc" data-sort="status" data-model="project"><i class="fa fa-sort mr-1"></i></button></p></div>
                    <div class="lg:w-1/5"><p>Developer <button class="sort" data-order="asc" data-sort="developerName" data-model="project"><i class="fa fa-sort mr-1"></i></button></p></div>
                </div>
                <div id="project-modal-list">
                    @foreach($projects as $project)
                        <div class="lg:flex justify-between p-3">
                            <div class="lg:w-1/5"><a href="{{ $project->path() }}">{{ $project->title }}</a></div>
                            <div class="lg:w-1/5"><p>{{ $project->client->name }}</p></div>
                            <div class="lg:w-1/5"><p>{{ \App\Enums\ProjectStatus::getDescription($project->status) }}</p></div>
                            <div class="lg:w-1/5"><p>{{ !is_null($project->developer) ? $project->developer->name : "" }}</p></div>
                            <div class="lg:w-1/5 text-right">
                                @if(!$project->favorite)
                                    <form method="POST" action='/favorite/project/{{ $project->id }}'>
                                        @csrf
                                        <button type="submit"><i class="fa fa-star-o text-yellow-300"></i></button>
                                    </form>
                                @else
                                    <form method="POST" action='/favorite/{{ $project->favorite->id }}'>
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
