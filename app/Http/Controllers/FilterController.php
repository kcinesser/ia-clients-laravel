<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;

class FilterController extends Controller
{
    public function sort () {
    	$attributes = request()->all();
    	$results;
    	$sorted;

    	switch ($attributes['model']) {
    		case 'client':
    			$results = App\Client::all()->whereNotIn('status', 3);

    			foreach ($results as $result) {
    				$result->AM = $result->accountManager->name;
    				$result->URL = $result->path();
    			}

    			break;
    		case 'site':
    			$results = App\Site::all()->whereNotIn('status', 4);

    			foreach ($results as $result) {
    				$result->clientName = $result->client->name;
    				$result->status = \App\Enums\SiteStatus::getDescription($result->status);
    				$result->URL = $result->path();
    			}

    			break;
    		case 'job':
    			$results = App\Job::all()->whereNotIn('status', 3);

    			foreach ($results as $result) {
    				$result->clientName = $result->client->name;
    				$result->status = \App\Enums\JobStatus::getDescription($result->status);
    				$result->developerName = $result->developer->name;
    				$result->URL = $result->path();
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
				$results = App\Client::all()->whereNotIn('status', 3);

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
				$results = App\Site::all()->whereNotIn('status', 4);

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

			case 'job':
				$results = App\Job::all()->whereNotIn('status', 3);

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
						$result->status = \App\Enums\JobStatus::getDescription($result->status);
						$result->developer_name = $result->developer->name;
					}
				} else {
					$filtered = "No results found.";
				}
				break;
		}

    	return response()->json($filtered);
    }
}
