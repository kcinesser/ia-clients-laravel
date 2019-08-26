    <div class="modal fade" id="clientsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">All Clients</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="client-filter" class="mb-3 flex items-center search-bar">
                        <div class="control flex items-center">
                            <p class="mb-0 mr-3">Filter:</p>
                            <input type="text" data-model="client" placeholder="Search clients...">
                        </div>
                    </div>
                    <div class="tab-content settings-tabs" id="settingsTabContent">
                        <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                            <div class="lg:flex justify-between p-3 lg:block font-semibold text-blue-500">
                                <div class="lg:w-1/4"><p>Client Name <button class="sort" data-order="asc" data-sort="name" data-model="client"><i class="fa fa-sort mr-1"></i></button></p></div>
                                <div class="lg:w-1/4"><p>Account Manager <button class="sort" data-order="asc" data-sort="AM" data-model="client"><i class="fa fa-sort mr-1"></i></button></p></div>
                            </div>
                            <div id="client-modal-list">
                                @foreach($clients as $client)
                                    <div class="lg:flex justify-between p-3">
                                        <div class="lg:w-1/4"><a href="{{ $client->path() }}">{{ $client->name }}</a></div>
                                        <div class="lg:w-1/4"><p>{{ $client->accountManager->name }}</p></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <a href="/clients/archives" class="headline-lead text-xs text-gray-500 hover:text-orange-500 no-underline"><i class="fa fa-archive mr-1"></i> View archived clients</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="button btn-blue" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
             