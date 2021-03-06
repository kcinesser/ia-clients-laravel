<div class="modal fade" id="newDomainModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Domain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ $client->path() }}/domains">
                    @csrf
                    @include('domains._form', [
                        'domain' => new App\HostedDomain,
                        'buttonText' => 'Create Domain',
                    ])
                </form>
            </div>
        </div>
    </div>
</div>