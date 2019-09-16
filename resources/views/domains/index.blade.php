@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-start w-full items-center">
            <h1 class="text-blue-500"><i class="fa fa-globe mr-3"></i>All Hosted Domains</h1>
        </div>
    </header>

    <main>
        <div class="tab-content settings-tabs" id="settingsTabContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                    <div class="lg:w-full"><p>Domain Name</p></div>
                </div>
                <div id="client-modal-list">
                    @foreach($domains as $domain)
                        <div class="lg:flex justify-between p-3">
                            <div class="lg:w-full"><p><a href="http://{{ $domain->name }}" target="_blank">{{ $domain->name }}</a></p></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

@endsection
