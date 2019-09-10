<?php

namespace Tests\Feature;

use App\Job;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageJobsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_create_jobs() {
        $attributes = factory('App\Job')->raw();
        $user = $this->factoryWithoutObservers('App\User')->create();
        $client = $this->factoryWithoutObservers('App\Client')->create(['account_manager_id' => $user->id]);

        $this->post($client->path() . '/jobs', $attributes)->assertRedirect('login');
    }

    /** @test */
    public function guests_cannot_view_jobs() {
        $user = $this->factoryWithoutObservers('App\User')->create();
        $client = $this->factoryWithoutObservers('App\Client')->create(['account_manager_id' => $user->id]);
        $job = $this->factoryWithoutObservers('App\Job')->create(['client_id' => $client->id]);

        $this->get($client->path() . '/jobs/' . $job->id)->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_job() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $attributes = factory('App\Job')->raw(['client_id' => $client->id]);

        $response = $this->post($client->path() . '/jobs', $attributes);
        $job = Job::where($attributes)->first();

        $response->assertRedirect($job->path());

        $this->assertDatabaseHas('jobs', $attributes);
        $this->get($job->path())->assertSee($attributes['title']);
    }

    /** @test */
    public function a_user_can_update_a_job() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $job = factory('App\Job')->create(['client_id' => $client->id]);

        $this->patch($job->path(), $attributes = [
            'title' => 'changed'
        ]);

        $this->assertDatabaseHas('jobs', $attributes);
    }

    /** @test */
    public function a_user_can_view_clients_jobs() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $job = factory('App\Job')->create(['client_id' => $client->id]);

        $this->get($client->path())->assertSee($job->title);
    }

    /** @test */
    public function a_user_can_view_a_single_job() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $job = factory('App\Job')->create(['client_id' => $client->id]);

        $this->get($job->path())->assertSee($job->title);
    }

    /** @test */
    public function a_job_belongs_to_a_client() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $attributes = factory('App\Job')->raw(['client_id' => null]);

        $this->post($client->path() . '/jobs', $attributes);
        $this->assertDatabaseMissing('jobs', $attributes);
    }

    /** @test */
    public function a_job_can_belong_to_a_site() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $host = $this->factoryWithoutObservers('App\Hosting')->create();
        $site = factory('App\Site')->create(['client_id' => $client->id, 'host_id' => $host->id]);
        $attributes = factory('App\Job')->raw(['client_id' => $client->id, 'site_id' => $site->id]);

        $this->post($client->path() . '/jobs', $attributes);
        $this->assertDatabaseHas('jobs', $attributes);
        $this->get($site->path())->assertSee($attributes['title']);
    }
}
