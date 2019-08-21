<div class="modal fade" id="newJobModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Job for {{ $client->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ $client->path() . '/jobs' }}">
                    {{ csrf_field() }}
                    @include('jobs._form', [
                        'job' => new App\Job,
                        'buttonText' => 'Create Job',
                        'cancelURL' => $client->path(),
                        'services' => App\Service::all(),
                        'statuses' => App\Enums\JobStatus::toSelectArray(),
                        'technologies' => App\Enums\Technologies::toSelectArray(),
                        'developers' => App\User::all()->where('role', 0),
                        'sites' => $client->sites,
                    ])

                </form>
            </div>
        </div>
    </div>
</div>