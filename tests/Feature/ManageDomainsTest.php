<?php

namespace Tests\Feature;

use App\Enums\RemoteDomainsProviders;
use Tests\TestCase;
use App\HostedDomain;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageDomainsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_create_domains() {
        $attributes = factory('App\HostedDomain')->raw();
        $user = $this->factoryWithoutObservers('App\User')->create();
        $client = $this->factoryWithoutObservers('App\Client')->create(['account_manager_id' => $user->id]);

        $this->post($client->path() . '/domains', $attributes)->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_domain() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $attributes = factory('App\HostedDomain')->raw(['client_id' => $client->id]);

        $response = $this->post($client->path() . '/domains', $attributes);
        $domain = HostedDomain::where($attributes)->first();

        $response->assertRedirect($client->path());

        $this->assertDatabaseHas('hosted_domains', $attributes);
        $this->assertTrue($client->hostedDomains->contains($domain));
    }

    /** @test */
    public function a_user_can_update_a_domain() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $domain = factory('App\HostedDomain')->create(['client_id' => $client->id]);

        $this->patch($domain->path(), $attributes = [
            'name' => 'changed'
        ]);

        $this->assertDatabaseHas('hosted_domains', $attributes);
    }

    /** @test */
    public function a_user_can_view_client_domains() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $domain = factory('App\HostedDomain')->create(['client_id' => $client->id]);

        $this->get($client->path())->assertSee($domain->name);
    }

    /** @test */
    public function a_domain_belongs_to_a_client() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $attributes = factory('App\HostedDomain')->raw(['client_id' => null]);

        $this->post($client->path() . '/domains', $attributes);
        $this->assertDatabaseMissing('hosted_domains', $attributes);
    }

    /** @test */
    public function a_domain_can_be_deleted() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $attributes = factory('App\HostedDomain')->raw(['client_id' => $client->id]);
        $domain = factory('App\HostedDomain')->create($attributes);

        $this->assertDatabaseHas('hosted_domains', $attributes);
        $this->delete($domain->path());
        $this->assertDatabaseMissing('hosted_domains', $attributes);
    }

     /** @test */
     public function a_domain_name_must_be_unique() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $attributes = factory('App\HostedDomain')->raw(['client_id' => $client->id]);
        $domain = factory('App\HostedDomain')->create($attributes);

        $this->assertDatabaseHas('hosted_domains', $attributes);
        $response = $this->post($client->path() . '/domains', $attributes);
        $response->assertSessionHasErrors();
    }
}
