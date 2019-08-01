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
        $client = factory('App\Client')->create();
        
        $this->assertEquals('/clients/' . $client->id, $client->path());
    }

    /** @test */
    public function it_can_add_a_site() {
        $this->signIn();
        $client = factory('App\Client')->create();
        $site = $client->addSite(factory('App\Site')->raw());

        $this->assertCount(1, $client->sites);
        $this->assertTrue($client->sites->contains($site));
    }

    /** @test */
    public function it_can_add_a_job() {
        $this->signIn();
        $client = factory('App\Client')->create();
        $job = $client->addJob(factory('App\Job')->raw());

        $this->assertCount(1, $client->jobs);
        $this->assertTrue($client->jobs->contains($job));
    }
}
