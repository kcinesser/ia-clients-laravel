<?php

namespace Tests\Feature;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_create_projects() {
        $attributes = factory('App\Project')->raw();
        $user = $this->factoryWithoutObservers('App\User')->create();
        $client = $this->factoryWithoutObservers('App\Client')->create(['account_manager_id' => $user->id]);

        $this->post($client->path() . '/projects', $attributes)->assertRedirect('login');
    }

    /** @test */
    public function guests_cannot_view_projects() {
        $user = $this->factoryWithoutObservers('App\User')->create();
        $client = $this->factoryWithoutObservers('App\Client')->create(['account_manager_id' => $user->id]);
        $project = $this->factoryWithoutObservers('App\Project')->create(['client_id' => $client->id]);

        $this->get($client->path() . '/projects/' . $project->id)->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_project() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $attributes = factory('App\Project')->raw(['client_id' => $client->id]);

        $response = $this->post($client->path() . '/projects', $attributes);
        $project = Project::where($attributes)->first();

        $response->assertRedirect($project->path());

        $this->assertDatabaseHas('projects', $attributes);
        $this->get($project->path())->assertSee($attributes['title']);
    }

    /** @test */
    public function a_user_can_update_a_project() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $project = factory('App\Project')->create(['client_id' => $client->id]);

        $this->patch($project->path(), $attributes = [
            'title' => 'changed'
        ]);

        $this->assertDatabaseHas('projects', $attributes);
    }

    /** @test */
    public function a_user_can_view_clients_projects() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $project = factory('App\Project')->create(['client_id' => $client->id]);

        $this->get($client->path())->assertSee($project->title);
    }

    /** @test */
    public function a_user_can_view_a_single_project() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $project = factory('App\Project')->create(['client_id' => $client->id]);

        $this->get($project->path())->assertSee($project->title);
    }

    /** @test */
    public function a_project_belongs_to_a_client() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $attributes = factory('App\Project')->raw(['client_id' => null]);

        $this->post($client->path() . '/projects', $attributes);
        $this->assertDatabaseMissing('projects', $attributes);
    }

    /** @test */
    public function a_project_can_belong_to_a_site() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $host = $this->factoryWithoutObservers('App\Hosting')->create();
        $site = factory('App\Site')->create(['client_id' => $client->id, 'host_id' => $host->id]);
        $attributes = factory('App\Project')->raw(['client_id' => $client->id, 'site_id' => $site->id]);

        $this->post($client->path() . '/projects', $attributes);
        $this->assertDatabaseHas('projects', $attributes);
        $this->get($site->path())->assertSee($attributes['title']);
    }
}
