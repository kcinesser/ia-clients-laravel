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
                    <div class="tab-content settings-tabs" id="settingsTabContent">
                        <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                            <div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                                <div class="lg:w-1/4"><p>Job Title</p></div>
                                <div class="lg:w-1/4"><p>Client</p></div>
                                <div class="lg:w-1/4"><p>Status</p></div>
                                <div class="lg:w-1/4"><p>Developer</p></div></div>
                            @foreach($jobs as $job)
                                <div class="lg:flex justify-between p-3">
                                    <div class="lg:w-1/4"><a href="{{ $job->path() }}" class="text-orange-500 no-underline lg:text-sm">{{ $job->title }}</a></div>
                                    <div class="lg:w-1/4"><p class="text-sm text-gray-500">{{ $job->client->name }}</p></div>
                                    <div class="lg:w-1/4"><p class="text-sm text-gray-500">{{ \App\Enums\JobStatus::getDescription($job->status) }}</p></div>
                                    <div class="lg:w-1/4"><p class="text-sm text-gray-500">{{ $job->developer->name }}</p></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="button btn-blue" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
