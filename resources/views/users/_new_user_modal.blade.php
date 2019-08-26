<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="/user">
                    @csrf
                    <div class="field mb-6{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="label text-sm mb-2 block">Name</label>

                        <div class="control">
                            <input type="text" name="name" value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="field mb-6{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="role" class="label text-sm mb-2 block">Role</label>

                        <div class="control">
                            <select id="grid-state" name="role" value="{{ old('role') }}" required>
                                @foreach ($roles as $value => $role)
                                    <option value="{{$value}}" >{{ $role }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="field mb-6{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="label text-sm mb-2 block">E-Mail Address</label>

                        <div class="control">
                            <input type="email" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="field mb-6{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="label text-sm mb-2 block">Password</label>

                        <div class="control">
                            <input type="password" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="field mb-6">
                        <label for="password-confirm" class="label text-sm mb-2 block">Confirm Password</label>

                        <div class="control">
                            <input type="password" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="" class="button btn-blue" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="button is-link">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
