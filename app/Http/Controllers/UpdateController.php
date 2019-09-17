<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Site;
use App\Update;
use Carbon;
use Auth;

class UpdateController extends Controller
{
	public function store(Client $client, Site $site) {
    	$attributes = $this->validate_data();
    	$attributes['user_id'] = Auth::id();

    	$site->updates()->create($attributes);

    	return redirect($site->path());
	}

    public function mma(Client $client, Site $site) {
        $attributes = $this->validate_data();
        $attributes['user_id'] = Auth::id();

        $site->updates()->create($attributes);

        $site->update([
            'mma_update' => Carbon\Carbon::now()
        ]);

        return redirect('/mma');
    }

	public function update(Client $client, Site $site, Update $update) {
        $update->update($this->validate_data());
    	return redirect($site->path());
	}

    /**
     * Validates form data
     */
	private function validate_data(){
	    return request()->validate(['description' => 'required', 'mma' => 'integer|sometimes']);
    }
}