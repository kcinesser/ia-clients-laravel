   <div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{ $project->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ $project->path() }}">
                    @csrf
                    @method('PATCH')

                    @include('projects._form', [
                        'buttonText' => 'Update Project',
                        'cancelURL' => $project->path(),
                        'services' => App\Service::all(),
                        'technologies' => App\Enums\Technologies::toSelectArray(),
                        'developers' => App\User::all()->where('role', 0),
                        'sites' => $client->sites,
                        'statuses' => App\Enums\ProjectStatus::toSelectArray()
                    ])

                </form>
            </div>
        </div>
    </div>
</div>
