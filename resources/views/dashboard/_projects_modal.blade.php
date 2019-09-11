    <div class="modal fade" id="projectsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">All Projects</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="project-filter" class="mb-3 flex items-center search-bar">
                        <div class="control flex items-center">
                            <p class="mb-0 mr-3">Filter:</p>
                            <input type="text" data-model="project" placeholder="Search projects...">
                        </div>
                    </div>
                    <div class="tab-content settings-tabs" id="settingsTabContent">
                        <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                            <div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                                <div class="lg:w-1/4"><p>Project Title <button class="sort" data-order="asc" data-sort="title" data-model="project"><i class="fa fa-sort mr-1"></i></button></p></div>
                                <div class="lg:w-1/4"><p>Client <button class="sort" data-order="asc" data-sort="clientName" data-model="project"><i class="fa fa-sort mr-1"></i></button></p></div>
                                <div class="lg:w-1/4"><p>Status <button class="sort" data-order="asc" data-sort="status" data-model="project"><i class="fa fa-sort mr-1"></i></button></p></div>
                                <div class="lg:w-1/4"><p>Developer <button class="sort" data-order="asc" data-sort="developerName" data-model="project"><i class="fa fa-sort mr-1"></i></button></p></div>
                            </div>
                            <div id="project-modal-list">
                                @foreach($projects as $project)
                                <div class="lg:flex justify-between p-3">
                                    <div class="lg:w-1/4"><a href="{{ $project->path() }}">{{ $project->title }}</a></div>
                                    <div class="lg:w-1/4"><p>{{ $project->client->name }}</p></div>
                                    <div class="lg:w-1/4"><p>{{ \App\Enums\ProjectStatus::getDescription($project->status) }}</p></div>
                                    <div class="lg:w-1/4"><p>{{ !is_null($project->developer) ? $project->developer->name : "" }}</p></div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <a href="/projects/archives" class="headline-lead text-xs text-gray-500 hover:text-orange-500 no-underline"><i class="fa fa-archive mr-1"></i> View archived projects</a>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="button btn-blue" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
