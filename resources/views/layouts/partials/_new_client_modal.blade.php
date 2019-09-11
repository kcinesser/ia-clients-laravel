<div class="modal fade" id="newClientMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/clients">
                    @csrf
                    @include('clients._form', [
                        'client' => new App\Client,
                        'buttonText' => 'Create Client',
                        'cancelURL' => '/clients',
                        'account_managers' => App\User::all()->where('role', 1),
                        'statuses' => App\Enums\ProjectStatus::toSelectArray()
                    ])

                </form>
            </div>
        </div>
    </div>
</div>