<div class="modal fade" id="newServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

               <form method="POST" action="/services">
                    @csrf
                    <div class="field mb-6">
                        <label for="name" class="label text-sm mb-2 block">Name <span class="required-text">*</span></label>

                        <div class="control">
                            <input type="text" name="name" required>
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="description" class="label text-sm mb-2 block">Description <span class="required-text">*</span></label>

                        <div class="control">
                            <textarea name="description" rows="10" required></textarea>
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="price" class="label text-sm mb-2 block">Price ($)</label>

                        <div class="control">
                            <input name="price" placeholder="0.00">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="" class="button btn-blue" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="button is-link mr-2">Create Service</button>
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
