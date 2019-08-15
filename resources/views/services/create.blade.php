@extends('layouts.app')

@section('content')

<form method="POST" action="/services" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
    {{ csrf_field() }}
    <h1 class="mb-10 text-center">Create A Service</h1>

	<div class="field mb-6">
	    <label for="name" class="label text-sm mb-2 block">Name</label>

	    <div class="control">
	        <input type="text" name="name" required>
	    </div>
	</div>

	<div class="field mb-6">
	    <label for="description" class="label text-sm mb-2 block">Description</label>

	    <div class="control">
	        <textarea name="description" rows="10" required></textarea>
	    </div>
	</div>

	<div class="field mb-6">
	    <label for="price" class="label text-sm mb-2 block">Price ($)</label>

	    <div class="control">
	        <input name="price" placeholder="0.00" required>
	    </div>
	</div>

	<div class="field">
	    <div class="control">
	        <button type="submit" class="button is-link mr-2">Create Service</button>
	        <a href="/registrars" class="button btn-secondary">Cancel</a>
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
