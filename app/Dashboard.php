<?php

namespace App;
use Auth;
use App\Enums\UserTypes;
use App\Enums\ProjectStatus;
use App\Enums\ClientStatus;
use App\Enums\SiteStatus;

class Dashboard
{
    public function getDashboard() {
        $user = Auth::user();

    	$clients = $this->getClients($user);
    	$projects = $this->getProjects($user);
        $sites = $this->getSites($user);
        $upcoming_projects = $this->getDueProjects();
        
    	$updates = Update::all()->sortByDesc('created_at');
        $activities = Activity::latest()->take(10)->get();
        
        $dashboard = collect([
            'clients'=> $clients,
            'projects' => $projects,
            'sites' => $sites,
            'updates' => $updates,
            'activities' => $activities,
            'upcoming_projects' => $upcoming_projects
        ]);

        return $dashboard;
    }

    private function getDueProjects() {
        $due_projects = Project::all()->whereNotIn('status', ProjectStatus::Archived)->sortBy('end_date');

        return $due_projects;
    }

    private function getClients($user) {
        $favorite_clients = $user->favorites->where('favoriteable_type', 'App\Client');
        $clients = array();

        foreach($favorite_clients as $client) {
            if ($client->favoriteable->status != ClientStatus::Archived) {
                array_push($clients, $client->favoriteable);
            }
        }

        return $clients;
    }

    private function getProjects($user) {
        $favorite_projects = $user->favorites->where('favoriteable_type', 'App\Project');
        $projects = array();

        foreach($favorite_projects as $project) {
            if ($project->favoriteable->status != ProjectStatus::Archived) {
                array_push($projects, $project->favoriteable);
            }
        }

        return $projects;
    }

    private function getSites($user) {
        $favorite_sites = $user->favorites->where('favoriteable_type', 'App\Site');
        $sites = array();

        foreach($favorite_sites as $site) {
            if ($site->favoriteable->status != SiteStatus::Archived) {
                array_push($sites, $site->favoriteable);
            }
        }

        return $sites;
    }
}
