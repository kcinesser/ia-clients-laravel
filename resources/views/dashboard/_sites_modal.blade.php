    <div class="modal fade" id="sitesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">All Sites</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content settings-tabs" id="settingsTabContent">
                        <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                            <div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                                <div class="lg:w-1/3"><p>Site</p></div>
                                <div class="lg:w-1/3"><p>Client</p></div>
                                <div class="lg:w-1/3"><p>Status</p></div>
                            </div>
                            @foreach($sites as $site)
                                <div class="lg:flex justify-between p-3">
                                    <div class="lg:w-1/3"><a href="{{ $site->path() }}" class="text-orange-500 no-underline lg:text-sm">{{ $site->name }}</a></div>
                                    <div class="lg:w-1/3"><p class="text-sm text-gray-500">{{ $site->client->name }}</p></div>
                                    <div class="lg:w-1/3"><p class="text-sm text-gray-500">{{ \App\Enums\SiteStatus::getDescription($site->status) }}</p></div>
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
