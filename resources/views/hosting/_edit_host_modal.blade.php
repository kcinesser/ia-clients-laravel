<div class="modal fade" id="editHostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Host</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="">
                    @csrf
                    @method('PATCH')

                    @include('hosting.form', ['owners' => App\Enums\Owners::toSelectArray()])

                    <div class="modal-footer">
                        <a href="" class="button btn-blue" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="button is-link mr-2">Save Changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
