<div class="modal fade" id="editSiteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{ $site->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ $site->path() }}" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16">
                    @csrf
                    @method('PATCH')

                    @include('sites.edit_form', [
                        'buttonText' => 'Update Site',
                        'cancelURL' => $client->path(),
                        'technologies' => App\Enums\Technologies::toSelectArray(),
                        'services' => App\Service::all(),
                        'statuses' => App\Enums\SiteStatus::toSelectArray(),
                    ])

                </form>
            </div>
        </div>
    </div>
</div>