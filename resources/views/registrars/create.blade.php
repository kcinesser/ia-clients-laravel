@extends('layouts.app')

@section('content')

<form method="POST" action="/registrars" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
    {{ csrf_field() }}
    <h1 class="mb-10 text-center">Create A Registrar</h1>

	<div class="field mb-6">
	    <label for="name" class="label text-sm mb-2 block">Name</label>

	    <div class="control">
	        <input type="text" class="input bg-transparent border border-grey-500 rounded p-2 text-xs w-full" name="name" required>
	    </div>
	</div>

	<div class="field mb-6">
	    <label for="url" class="label text-sm mb-2 block">URL</label>

	    <div class="control">
	        <input type="text" name="url" class="bg-transparent border border-grey-500 rounded p-2 text-xs w-full" required>
	    </div>
	</div>

	<div class="field mb-6">
	    <label for="owner" class="label text-sm mb-2 block">Account Owner</label>


	    <div class="control">
	    	<select id="owner" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name="owner" value="{{ old('owner') }}" required autofocus>
                @foreach ($owners as $value => $owner)
                    <option value="{{$value}}" >{{ $owner }}</option>
                @endforeach
            </select>

            @if ($errors->has('owner'))
                <span class="help-block">
                    <strong>{{ $errors->first('owner') }}</strong>
                </span>
            @endif
	    </div>
	</div>


	<div class="field mb-6">
	    <label for="description" class="label text-sm mb-2 block">Description</label>

	    <div class="control">
	        <textarea name="description" rows="10" class="bg-transparent border border-grey-500 rounded p-2 text-xs w-full" required></textarea>
	    </div>
	</div>

	<div class="field">
	    <div class="control">
	        <button type="submit" class="button is-link mr-2">Create Registrar</button>
	        <a href="/registrars" class="button">Cancel</a>
	    </div>
	</div>



	@if ($errors->any())
	    <div class="field mt-6">
	        @foreach ($errors->all() as $error)
	            <li class="text-sm text-red-500">{{ $error }}</li>
	        @endforeach
	    </div>
	@endif

</form>

@endsection