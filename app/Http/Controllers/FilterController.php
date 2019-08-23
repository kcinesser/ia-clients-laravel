<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    			$filtered = $results->filter(function ($item) use ($search_value) {
    					return false !== stristr($item->name, $search_value);
    			});

    			foreach ($filtered as $result) {
    				$result->AM = $result->accountManager->name;
    				$result->URL = $result->path();
    			}

    			if (!isset($search_value)) {
    				$filered = App\Client::all()->whereNotIn('status', 3);
    			}

    			break;
    	}

    	return response()->json($filtered);
    }
}
