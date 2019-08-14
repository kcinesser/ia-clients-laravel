<div class="modal fade" id="editDomainModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Domain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ $domain->path() }}" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16">
                    @csrf
                    @method('PATCH')
                    @include('domains._form', [
                        'account' => new App\DomainAccount,
                        'buttonText' => 'Save Domain',
                        'cancelURL' => $site->path(),
                        'registrars' => App\Registrar::all()
                    ])
                </form>
            </div>
        </div>
    </div>
</div>