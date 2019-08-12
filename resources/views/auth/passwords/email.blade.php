@extends('layouts.app')

@section('content')

    <form class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <h1 class="mb-10 text-center">Reset Password</h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-6">
            <label for="email" class="label text-sm mb-2 block">E-Mail Address</label>

            <div class="control">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button btn-primary">Send Password Reset Link</button>
            </div>
        </div>
    </form>

@endsection
