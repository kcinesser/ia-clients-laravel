@extends('layouts.app')

@section('content')

<form class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <h1 class="mb-10 text-center">Login</h1>

    <div class="field mb-6{{ ($errors->has('email') || session('google-auth-failed')) ? ' has-error' : '' }}">
    	@if (session('google-auth-failed'))
            <div class="alert alert-danger mb-6">
                {{ session('google-auth-failed') }}
            </div>
        @endif
            
        <label for="email" class="label text-sm mb-2 block">E-Mail Address</label>

        <div class="control">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

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
            <input id="password" type="password" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="field mb-6">
        <div class="control">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>
    </div>

    <div class="field mb-6">
        <div class="control text-center">
            <button type="submit" class="button is-link mr-2">
                Login
            </button>

            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-gray-500 no-underline" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </div>
    </div>
    
    <hr class="with-text mb-6" data-content="or">
    
    <div class="field mb-6">
    	<div class="control text-center">
    		<a href="{{ route('login.provider', 'google') }}" class="button">{{ __('Login with Google') }}</a>
    	</div>
    </div>
</form>

@endsection
