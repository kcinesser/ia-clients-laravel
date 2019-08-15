@extends('layouts.app')

@section('content')

    <div class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow mb-10">

        <h1 class="mb-10 text-center">{{$hosting->name}}</h1>

        <div class="mb-10">
            <p class="text-gray-800 text-xs headline-lead">Details</p>
            <p>{{$hosting->details}}</p>
        </div>

        <div class="mb-10">
            <p class="text-gray-800 text-xs headline-lead">Owner</p>
            <p>{{\App\Enums\Owners::getKey($hosting->owner)}}</p>
        </div>


        @if(count($hosting->sites) >= 1)
            <div class="mb-10">
                <p class="text-gray-800 text-xs headline-lead">Currently Hosting</p>
                <ul>
                    @foreach($hosting->sites as $site)
                        <li>{{$site->name}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="w-1/4">
            <a href="{{route('hosting.edit', $hosting->id)}}" class="button">Edit</a>
        </div>
    </div>
@endsection