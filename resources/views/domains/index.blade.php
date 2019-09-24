@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-start w-full items-center">
            <h1 class="text-blue-500"><i class="fa fa-tasks mr-3"></i>All Hosted Domains</h1>
        </div>
    </header>

    <main>
    	<table class="list-table striped">
    		<thead>
            	<tr>
            		<th>Domain Name</th>
            		<th>Client</th>
            		<th>Provider</th>
            		<th>Provider ID</th>
            		<th>Expires</th>
            		<th class="text-center">Free With MMA?</th>
            	</tr>
           	</thead>
           	<tbody>
        	@foreach($domains as $domain)
            	<tr>
            		<td><a href="http://{{ $domain->name }}" target="_blank">{{ $domain->name }}</a></td>
            		<td><a href="{{ route('clients.show', ['client' => $domain->client]) }}">{{ $domain->client->name }}</a></td>
            		<td>{{ \App\Enums\RemoteDomainsProviders::getDescription($domain->remote_provider_type) }}</td>
            		<td>{{ $domain->remote_provider_id }}</td>
            		<td>{{ $domain->exp_date ?? "" }}</td>
            		<td class="text-center">{{ $domain->free_with_mma === TRUE ? "Yes" : "No" }}</td>
            	</tr>
        	@endforeach
        	</tbody>
        </table>
    </main>
@endsection
