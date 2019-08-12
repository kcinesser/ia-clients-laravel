@extends('layouts.app')

@section('content')

    <div class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow mb-10">

        <form method="POST" action="/hosting/{{$hosting->id}}" class="mb-10" >
            @csrf
            @method('PATCH')

            <h1 class="mb-10 text-center">Edit Host</h1>

            @include('hosting.form')



            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link mr-2">Save Changes</button>
                    <a href="/settings" class="button">Cancel</a>
                </div>
            </div>

        </form>

        @if ($errors->any())
            <div class="field mt-6">
                @foreach ($errors->all() as $error)
                    <li class="text-sm text-red-500">{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/hosting/{{$hosting->id}}" class="delete-form mt-10">
            @csrf
            @method('DELETE')
            <div class="field">
                <div class="control">
                    <button type="submit" class="button btn-secondary is-link mr-2 delete-button">Delete Host</button>
                </div>
            </div>
        </form>
    </div>

    @if($hosting->sites)
        <div class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
            <p class="headline-lead">Hosting:</p>
            <ul>
                @foreach($hosting->sites as $site)
                    <li>{{$site->name}}</li>
                @endforeach
            </ul>
        </div>
    @endif


@endsection