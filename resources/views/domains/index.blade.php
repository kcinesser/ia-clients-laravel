@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-start w-full items-center">
            <h1 class="text-blue-500"><i class="fa fa-tasks mr-3"></i>All Hosted Domains</h1>
        </div>
    </header>

    <main>
        <div class="tab-content settings-tabs" id="settingsTabContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                <div class="lg:flex justify-between p-3 sm:hidden hidden lg:block font-semibold text-blue-500">
                    <div class="lg:flex-1">Domain Name</div>
                    <div class="lg:flex-1">Client</div>
                    <div class="lg:flex-1">Provider</div>
                    <div class="lg:flex-1">Expires</div>
                    <div class="lg:flex-1 text-center">Free With MMA?</div>
                </div>
                <div id="hosted-domain-modal-list">
                    @foreach($domains as $domain)
                        <div class="lg:flex justify-between p-3">
                            <div class="lg:flex-1"><a href="http://{{ $domain->name }}" target="_blank">{{ $domain->name }}</a></div>
                            <div class="lg:flex-1"><a href="{{ route('clients.show', ['client' => $domain->client]) }}">{{ $domain->client->name }}</a></div>
                            <div class="lg:flex-1">{{ \App\Enums\RemoteDomainsProviders::getDescription($domain->remote_provider_type) }}</div>
                            <div class="lg:flex-1">{{ $domain->exp_date ?? "" }}</p></div>
                            <div class="lg:flex-1 text-center">{{ $domain->free_with_mma === TRUE ? "Yes" : "No" }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
