<div class="modal fade" id="newRegistrarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Registrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="/registrars">
                    @csrf
                    <div class="field mb-6">
                        <label for="name" class="label text-sm mb-2 block">Name</label>

                        <div class="control">
                            <input type="text" name="name" required>
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="url" class="label text-sm mb-2 block">URL</label>

                        <div class="control">
                            <input type="text" name="url" required>
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="description" class="label text-sm mb-2 block">Description</label>

                        <div class="control">
                            <textarea name="description" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="/registrars" class="button btn-blue">Cancel</a>
                        <button type="submit" class="button is-link">Create Registrar</button>
                    </div>



                    @if ($errors->any())
                        <div class="field mt-6">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm text-red-500">{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>
