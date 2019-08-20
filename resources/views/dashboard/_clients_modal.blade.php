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
                                <div class="lg:w-1/4"><p>Client Name</p></div>
                                <div class="lg:w-1/4"><p>Account Manager</p></div>
                                <div class="lg:w-1/8"><i class="fa fa-search mr-1"></i></div>
                            </div>
                            @foreach($clients as $client)
                                <div class="lg:flex justify-between p-3">
                                    <div class="lg:w-1/4"><a href="{{ $client->path() }}">{{ $client->name }}</a></div>
                                    <div class="lg:w-1/4"><p>{{ $client->accountManager->name }}</p></div>
                                    <div class="lg:w-1/8"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="button btn-blue" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
             