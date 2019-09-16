<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Site;
use App\Service;
use App\Update;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MMAController extends Controller
{
    public function mma() {
        $mma_sites = Service::with('sites')->where('id', 1)->get()->pluck('sites')->flatten();
        $mma_sites = $mma_sites->where('status', '!=', 4)->sortBy('name');
        $mma_internal_sites = Service::with('sites')->where('id', 5)->get()->pluck('sites')->flatten();
        $mma_internal_sites = $mma_internal_sites->sortBy('name');

        foreach($mma_sites as $site) {
            $update = $site->updates->where('mma', 1)->sortByDesc('created_at')->first();
            if(isset($update)) { 
                $created_at = $update->created_at;
                $first_of_month = Carbon::now()->startOfMonth();
                $end_of_month = Carbon::now()->endOfMonth();

                if($created_at->isBetween($first_of_month, $end_of_month) ) {
                    $site->latest_update = $update;
                }
            }
        }

        foreach($mma_internal_sites as $site) {
            $update = $site->updates->where('mma', 1)->sortByDesc('created_at')->first();
            if(isset($update)) {
                $created_at = $update->created_at;
                $first_of_month = Carbon::now()->startOfMonth();
                $end_of_month = Carbon::now()->endOfMonth();

                if($created_at->isBetween($first_of_month, $end_of_month) ) {
                    $site->latest_update = $update;
                }
            }
        }

        return view('mma.index', compact('mma_sites', 'mma_internal_sites'));
    }

    public function store(Client $client, Site $site) {
        $attributes = request()->validate(['description' => 'required', 'mma' => 'numeric']);
        $attributes['user_id'] = Auth::id();

        $update = $site->updates()->create($attributes);

        $update->username = $update->user->initials();
        $update->friendly_date = \Carbon\Carbon::parse($update->created_at)->format('n/j/Y');
        $update->path = $update->mmaPath();

        return response()->json($update);
    }

    public function update (Client $client, Site $site, Update $update) {
        $attributes = request()->validate(['description' => 'required']);

        $update->update($attributes);
        $update->friendly_date = \Carbon\Carbon::parse($update->updated_at)->format('n/j/Y');

        return response()->json($update);
    }
}
