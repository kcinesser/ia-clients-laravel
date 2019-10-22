<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;
use App\Enums\ClientStatus;
use App\Enums\ProjectStatus;
use App\Enums\SiteStatus;
use App\Site;

class FilterController extends Controller
{
    public function sort () {
    	$attributes = request()->all();
    	$results;
    	$sorted;

    	switch ($attributes['model']) {
    		case 'client':
    			$results = App\Client::all()->whereNotIn('status', ClientStatus::Archived);

    			foreach ($results as $result) {
    				$result->AM = $result->accountManager->name;
    				$result->URL = $result->path();
    			}

    			break;
    		case 'site':
    			$results = App\Site::all()->whereNotIn('status', SiteStatus::Archived);

    			foreach ($results as $result) {
    				$result->clientName = $result->client->name;
    				$result->status = \App\Enums\SiteStatus::getDescription($result->status);
    				$result->URL = $result->path();
    			}

    			break;
    		case 'project':
    			$results = App\Project::all()->whereNotIn('status', ProjectStatus::Archived);

    			foreach ($results as $result) {
    			    $result->projectId = $result->id;
    				$result->clientName = $result->client->name;
    				$result->status = \App\Enums\ProjectStatus::getDescription($result->status);
    				$result->developerName = $result->developer->name;
    				$result->clientAccountManagerName = ($result->client->accountManager->name ?? '');
    				$result->endDate = $result->end_date;
    				$result->URL = $result->path();
    				$result->favorite_id = ($result->favorite->id ?? NULL);
    			}

    			break;
    	}

    	switch ($attributes['order']) {
    		case 'asc':
    			$results = $results->sortBy($attributes['attribute']);
    			break;
			case 'desc':
				$results = $results->sortByDesc($attributes['attribute']);
				break;
		}

		$sorted = array_values($results->toArray());

		return response()->json($sorted);
    }

    public function filter () {
    	$attributes = request()->all();
		$search_value = $attributes['value'];

    	switch ($attributes['model']) {
			case 'client':
				$results = App\Client::all()->whereNotIn('status', ClientStatus::Archived);

				if ($search_value === null) {
					$filtered = $results;
				} else {		
					$filtered_name = $results->filter(function ($item) use ($search_value) {
						return false !== stristr($item->name, $search_value);
					});

					$filtered_am = $results->filter(function ($item) use ($search_value) {
						return false !== stristr($item->accountManager->name, $search_value);
					});

					$filtered = $filtered_name->merge($filtered_am);
				}
				
				if ($filtered->isNotEmpty()) {
					foreach ($filtered as $result) {
						$result->AM = $result->accountManager->name;
						$result->URL = $result->path();
					}
				} else {
					$filtered = "No results found.";
				}

				break;

			case 'site':
				$results = App\Site::all()->whereNotIn('status', SiteStatus::Archived);

				if ($search_value === null) {
					$filtered = $results;
				} else {		
					$filtered_name = $results->filter(function ($item) use ($search_value) {
						return false !== stristr($item->name, $search_value);
					});

					$filtered_client = $results->filter(function ($item) use ($search_value) {
						return false !== stristr($item->client->name, $search_value);
					});

					$filtered = $filtered_name->merge($filtered_client);
				}
				
				if ($filtered->isNotEmpty()) {
					foreach ($filtered as $result) {
						$result->client_name = $result->client->name;
						$result->URL = $result->path();
						$result->status = \App\Enums\SiteStatus::getDescription($result->status);
					}
				} else {
					$filtered = "No results found.";
				}
				break;

			case 'project':
				$results = App\Project::all()->whereNotIn('status', ProjectStatus::Archived);

				if ($search_value === null) {
					$filtered = $results;
				} else {		
					$filtered_title = $results->filter(function ($item) use ($search_value) {
						return false !== stristr($item->title, $search_value);
					});

					$filtered_client = $results->filter(function ($item) use ($search_value) {
						return false !== stristr($item->client->name, $search_value);
					});

					$filtered_temp = $filtered_title->merge($filtered_client);

					$filtered_developer = $results->filter(function ($item) use ($search_value) {
						return false !== stristr($item->developer->name, $search_value);
					});

					$filtered = $filtered_temp->merge($filtered_developer);
				}
				
				if ($filtered->isNotEmpty()) {
					foreach ($filtered as $result) {
						$result->client_name = $result->client->name;
						$result->URL = $result->path();
						$result->status = \App\Enums\ProjectStatus::getDescription($result->status);
						$result->developer_name = $result->developer->name;
					}
				} else {
					$filtered = "No results found.";
				}
				break;
		}

    	return response()->json($filtered);
    }

    public function search() {
    	$results = array();
    	$attributes = request()->all();
		$search_value = $attributes['value'];

		if ($search_value === null) {
			return response()->json('Please enter search term.');
		}

		$clients = App\Client::all()->whereNotIn('status', ClientStatus::Archived);

		$filtered_clients = $clients->filter(function ($item) use ($search_value) {
			return false !== stristr($item->name, $search_value);
		})->take(4);

		if ($filtered_clients->isEmpty()) {
			$filtered_clients = "No results found.";
		} else {
			foreach ($filtered_clients as $client) {
				$client->URL = $client->path();
			}
		}

		$sites = App\Site::all()->whereNotIn('status', SiteStatus::Archived);

		$filtered_sites = $sites->filter(function ($item) use ($search_value) {
			return false !== stristr($item->name, $search_value);
		})->take(4);

		if ($filtered_sites->isEmpty()) {
			$filtered_sites = "No results found.";
		} else {
			foreach ($filtered_sites as $site) {
				$site->URL = $site->path();
				$site->client_name = $site->client->name;
			}
		}

		$projects = App\Project::all()->whereNotIn('status', ProjectStatus::Archived);

		$filtered_projects = $projects->filter(function ($item) use ($search_value) {
			return false !== stristr($item->title, $search_value);
		})->take(4);

		if ($filtered_projects->isEmpty()) {
			$filtered_projects = "No results found.";
		} else {
			foreach ($filtered_projects as $project) {
				$project->URL = $project->path();
				$project->client_name = $project->client->name;
			}
		}

		$results['clients'] = $filtered_clients;
		$results['sites'] = $filtered_sites;
		$results['projects'] = $filtered_projects;

    	return response()->json($results);
    }
}
