<div class="modal fade" id="userDeleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" class="delete-form">
                    @method('DELETE')
                    @csrf
                    <select name="reassign_am" required>
                        @foreach( $users->where('role',1) as $user )
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="button btn-delete-sm">Reassign and Delete</button>
                </form>
            </div>
            <div class="modal-footer">
                <a href="" class="button btn-blue" data-dismiss="modal">Close</a>
                <a href="" class="button">Save</a>
            </div>
        </div>
    </div>
</div>