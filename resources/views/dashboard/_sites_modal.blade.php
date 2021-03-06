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
                    <div id="site-filter" class="mb-3 flex items-center search-bar justify-between">
                        <div class="control flex items-center">
                            <p class="mb-0 mr-3">Filter:</p>
                            <input type="text" data-model="site" placeholder="Search sites...">
                        </div>
                        <a href="/mma" class="button btn-primary">View MMA Sites</a>
                    </div>
                    <div class="tab-content settings-tabs" id="settingsTabContent">
                        <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                            <div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                                <div class="lg:w-1/3"><p>Site <button class="sort" data-order="asc" data-sort="name" data-model="site"><i class="fa fa-sort mr-1"></i></button></p></div>
                                <div class="lg:w-1/3"><p>Client <button class="sort" data-order="asc" data-sort="clientName" data-model="site"><i class="fa fa-sort mr-1"></i></button></p></div>
                                <div class="lg:w-1/3"><p>Status <button class="sort" data-order="asc" data-sort="status" data-model="site"><i class="fa fa-sort mr-1"></i></button></p></div>
                            </div>
                            <div id="site-modal-list">
                                @foreach($sites as $site)
                                    <div class="lg:flex justify-between p-3">
                                        <div class="lg:w-1/3"><a href="{{ $site->path() }}">{{ $site->name }}</a></div>
                                        <div class="lg:w-1/3"><p>{{ $site->client->name }}</p></div>
                                        <div class="lg:w-1/3"><p>{{ \App\Enums\SiteStatus::getDescription($site->status) }}</p></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <a href="/sites/archives" class="headline-lead text-xs text-gray-500 hover:text-orange-500 no-underline"><i class="fa fa-archive mr-1"></i> View archived sites</a>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="button btn-blue" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
