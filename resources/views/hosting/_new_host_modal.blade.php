<div class="modal fade" id="newHostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Host</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{route('hosting.store')}}" class="">
                    @csrf
                    @include('hosting.form', ['owners' => App\Enums\Owners::toSelectArray()])

                    @if ($errors->any())
                        <div class="field mt-6">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm text-red-500">{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif

                    <div class="modal-footer">
                        <a href="/settings" class="button btn-blue">Cancel</a>
                        <button type="submit" class="button is-link">Create Host</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
