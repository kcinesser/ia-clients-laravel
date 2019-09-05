<?php

namespace Tests\Feature;


use Tests\TestCase;
use App\Client;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageClientsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_create_clients() {
        $attributes = factory('App\Client')->raw();

        $this->post('/clients', $attributes)->assertRedirect('login');
    }

    /** @test */
    public function guests_cannot_view_clients() {
        $this->get('/clients')->assertRedirect('login');
    }

    /** @test */
    public function guests_cannot_view_single_clients() {
        $user = $this->factoryWithoutObservers('App\User')->create();
        $client = $this->factoryWithoutObservers('App\Client')->create();

        $this->get('/clients/' . $client->id)->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_client() {
        $this->signIn();

        $user = $this->factoryWithoutObservers('App\User')->create();
        $attributes = factory('App\Client')->raw(['account_manager_id' => $user->id]);

        $response = $this->post('/clients', $attributes);
        $client = Client::where($attributes)->first();
        $response->assertRedirect($client->path());

        $this->assertDatabaseHas('clients', $attributes);
        $this->get($client->path())->assertSee($attributes['name']);
    }

    /** @test */
    public function a_user_can_update_a_client() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);

        $this->patch($client->path(), $attributes = [
            'name' => 'changed'
        ]);

        $this->assertDatabaseHas('clients', $attributes);
    }

    /** @test */
    public function a_user_can_view_clients() {
        $this->signIn();

        $this->get('/clients')->assertStatus(200);
    }

    /** @test */
    public function a_user_can_view_a_single_client() {
        $this->signIn();

        $client = $this->factoryWithoutObservers('App\Client')->create(['account_manager_id' => auth()->id()]);

        $this->get($client->path())->assertStatus(200);
    }

    /** @test */
    public function a_client_belongs_to_an_account_manager() {
        $this->signIn();

        $attributes = factory('App\Client')->raw(['account_manager_id' => null]);

        $this->post('/clients', $attributes)->assertSessionHasErrors('account_manager_id');
    }

    /** @test */
    public function a_client_can_be_archived() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $host = $this->factoryWithoutObservers('App\Hosting')->create();
        $site = factory('App\Site')->create(['client_id' => $client->id, 'host_id' => $host->id]);
        $job = factory('App\Job')->create(['client_id' => $client->id]);

        $response = $this->patch($client->path() . '/archive');

        $response->assertRedirect('/');
        
        $this->assertDatabaseHas('clients', [
            'name' => $client->name,
            'status' => 3
        ]);

        $this->assertDatabaseHas('jobs', [
            'title' => $job->title,
            'status' => 3
        ]);

        $this->assertDatabaseHas('sites', [
            'name' => $site->name,
            'status' => 4
        ]);
    }
}
