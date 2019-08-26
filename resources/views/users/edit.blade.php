@extends('layouts.app')

@section('content')

    <form class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow" method="POST" action="{{ route('user.update', $user->id) }}">
        @csrf
        @method('PATCH')

        <h1 class="mb-10 text-center">Edit {{ $user->name }}</h1>

        <div class="field mb-6{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="label text-sm mb-2 block">Name</label>

            <div class="control">
                <input id="name" type="text" name="name" value="{{ $user->name }}" required autofocus>

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
                <select id="role" id="grid-state" name="role" value="{{ old('role') }}" required>
                    @foreach ($roles as $value => $role)
                        <option value="{{$value}}" {{ $user->role == $value ? "selected" : "" }}>{{ $role }}</option>
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
                <input id="email" type="email" name="email" value="{{ $user->email }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="button is-link mr-2">
                    Update
                </button>

                <a href="/settings" class="button btn-secondary">
                    Cancel
                </a>
            </div>
        </div>
    </form>
    
@endsection
