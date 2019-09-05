<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path() {
        $this->signIn();
        
        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        
        $this->assertEquals('/clients/' . $client->id, $client->path());
    }

    /** @test */
    public function it_can_add_a_site() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $host = $this->factoryWithoutObservers('App\Hosting')->create();
        $site = $client->addSite(factory('App\Site')->raw(['client_id' => $client->id, 'host_id' => $host->id]));

        $this->assertCount(1, $client->sites);
        $this->assertTrue($client->sites->contains($site));
    }

    /** @test */
    public function it_can_add_a_job() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);

        $job = $client->addJob(factory('App\Job')->raw());

        $this->assertCount(1, $client->jobs);
        $this->assertTrue($client->jobs->contains($job));
    }
}
