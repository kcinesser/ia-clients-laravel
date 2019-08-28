    <div class="modal fade" id="jobsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">All Jobs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="job-filter" class="mb-3 flex items-center search-bar">
                        <div class="control flex items-center">
                            <p class="mb-0 mr-3">Filter:</p>
                            <input type="text" data-model="job" placeholder="Search jobs...">
                        </div>
                    </div>
                    <div class="tab-content settings-tabs" id="settingsTabContent">
                        <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                            <div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                                <div class="lg:w-1/4"><p>Job Title <button class="sort" data-order="asc" data-sort="title" data-model="job"><i class="fa fa-sort mr-1"></i></button></p></div>
                                <div class="lg:w-1/4"><p>Client <button class="sort" data-order="asc" data-sort="clientName" data-model="job"><i class="fa fa-sort mr-1"></i></button></p></div>
                                <div class="lg:w-1/4"><p>Status <button class="sort" data-order="asc" data-sort="status" data-model="job"><i class="fa fa-sort mr-1"></i></button></p></div>
                                <div class="lg:w-1/4"><p>Developer <button class="sort" data-order="asc" data-sort="developerName" data-model="job"><i class="fa fa-sort mr-1"></i></button></p></div>
                            </div>
                            <div id="job-modal-list">
                                @foreach($jobs as $job)
                                <div class="lg:flex justify-between p-3">
                                    <div class="lg:w-1/4"><a href="{{ $job->path() }}">{{ $job->title }}</a></div>
                                    <div class="lg:w-1/4"><p>{{ $job->client->name }}</p></div>
                                    <div class="lg:w-1/4"><p>{{ \App\Enums\JobStatus::getDescription($job->status) }}</p></div>
                                    <div class="lg:w-1/4"><p>{{ $job->developer->name }}</p></div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <a href="/jobs/archives" class="headline-lead text-xs text-gray-500 hover:text-orange-500 no-underline"><i class="fa fa-archive mr-1"></i> View archived jobs</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="button btn-blue" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
