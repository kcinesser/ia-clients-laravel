<div class="modal fade" id="siteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Site</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ $client->path() . '/sites' }}" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16">
                    @csrf
                    @include('sites._create_form', [
                        'site' => new App\Site,
                        'buttonText' => 'Create Site',
                        'technologies' => App\Enums\Technologies::toSelectArray(),
                        'services' => App\Service::all(),
                        'statuses' => App\Enums\SiteStatus::toSelectArray(),
                        'registrars' => App\Registrar::all()
                    ])

                </form>
            </div>
        </div>
    </div>
</div>