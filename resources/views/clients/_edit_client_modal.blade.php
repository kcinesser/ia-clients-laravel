<div class="modal fade" id="editClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{ $client->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ $client->path() }}">
                    @csrf
                    @method('PATCH')
                    @include('clients._form', [
                        'buttonText' => 'Update Client',
                        'account_managers' => App\User::all()->where('role', 1)->sortBy('name'),
                        'statuses' => App\Enums\ClientStatus::toSelectArray()
                    ])
                </form>
            </div>
        </div>
    </div>
</div>