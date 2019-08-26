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
                    <div class="tab-content settings-tabs" id="settingsTabContent">
                        <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                            <div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                                <div class="lg:w-1/2"><p>Client Name</p></div>
                                <div class="lg:w-1/2"><p>Account Manager</p></div>
                            </div>
                            @foreach($clients as $client)
                                <div class="lg:flex justify-between p-3">
                                    <div class="lg:w-1/2"><a href="{{ $client->path() }}" class="text-orange-500 no-underline lg:text-sm">{{ $client->name }}</a></div>
                                    <div class="lg:w-1/2"><p class="text-sm text-gray-500">{{ $client->accountManager->name }}</p></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-right my-3">
                        <a href="/clients/archives" class="headline-lead text-xs text-gray-500 hover:text-orange-500 no-underline"><i class="fa fa-archive mr-1"></i> View archived clients</a>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="button btn-blue" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
