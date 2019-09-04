<div class="modal fade" id="newURLModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add URL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ $site->path() }}/urls">
                    @csrf
                    @include('urls._form', [
                        'buttonText' => 'Create URL',
                        'types' => App\Enums\URLType::toSelectArray(),
                        'environments' => App\Enums\URLEnvironment::toSelectArray()
                    ])
                </form>
            </div>
        </div>
    </div>
</div>