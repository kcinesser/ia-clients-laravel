<?php

namespace Tests\Feature;

use App\Site;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageSitesTest extends TestCase
{

    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_create_sites() {
        $attributes = factory('App\Site')->raw();
        $user = $this->factoryWithoutObservers('App\User')->create();
        $client = $this->factoryWithoutObservers('App\Client')->create(['account_manager_id' => $user->id]);

        $this->post($client->path() . '/sites', $attributes)->assertRedirect('login');
        $this->get($client->path() . '/sites/create')->assertRedirect('login');
    }

    /** @test */
    public function guests_cannot_view_single_sites() {
        $user = $this->factoryWithoutObservers('App\User')->create();
        $client = $this->factoryWithoutObservers('App\Client')->create(['account_manager_id' => $user->id]);
        $host = $this->factoryWithoutObservers('App\Hosting')->create();
        $site = $this->factoryWithoutObservers('App\Site')->create(['client_id' => $client->id, 'host_id' => $host->id]);

        $this->get($client->path() . '/sites/' . $site->id)->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_site() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $host = $this->factoryWithoutObservers('App\Hosting')->create();

        $attributes = factory('App\Site')->raw(['client_id' => $client->id, 'host_id' => $host->id]);

        $response = $this->post($client->path() . '/sites', $attributes);
        $site = Site::where($attributes)->first();

        $response->assertRedirect($site->path());

        $this->assertDatabaseHas('sites', $attributes);
        $this->get($site->path())->assertSee($attributes['name']);
    }

    /** @test */
    public function a_user_can_update_a_site() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $host = $this->factoryWithoutObservers('App\Hosting')->create();
        $site = factory('App\Site')->create(['client_id' => $client->id, 'host_id' => $host->id]);

        $this->patch($site->path(), $attributes = [
            'name' => 'changed'
        ]);

        $this->assertDatabaseHas('sites', $attributes);
    }

    /** @test */
    public function a_user_can_view_a_clients_sites() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $host = $this->factoryWithoutObservers('App\Hosting')->create();
        $site = factory('App\Site')->create(['client_id' => $client->id, 'host_id' => $host->id]);

        $this->get($client->path())->assertSee($site->name);
    }

    /** @test */
    public function a_user_can_view_a_single_site() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $host = $this->factoryWithoutObservers('App\Hosting')->create();
        $site = factory('App\Site')->create(['client_id' => $client->id, 'host_id' => $host->id]);

        $this->get($site->path())->assertStatus(200);
        $this->get($site->path())->assertSee($site->name);
    }

    /** @test */
    public function a_site_belongs_to_a_client() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $host = $this->factoryWithoutObservers('App\Hosting')->create();
        $attributes = factory('App\Site')->raw(['client_id' => null, 'host_id' => $host->id]);

        $this->post($client->path() . '/sites', $attributes);
        $this->assertDatabaseMissing('sites', $attributes);
    }
}
