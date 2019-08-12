@extends('layouts.app')

@section('content')

    <form method="POST" action="/hosting" class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
        @csrf
        <h1 class="mb-10 text-center">Create Host</h1>

        @include('hosting.form')

        @if ($errors->any())
            <div class="field mt-6">
                @foreach ($errors->all() as $error)
                    <li class="text-sm text-red-500">{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link mr-2">Create Host</button>
                <a href="/settings" class="button">Cancel</a>
            </div>
        </div>

    </form>

@endsection