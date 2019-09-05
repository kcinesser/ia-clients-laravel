<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SiteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $host = $this->factoryWithoutObservers('App\Hosting')->create();
        $site = factory('App\Site')->create(['client_id' => $client->id, 'host_id' => $host->id]);

        $this->assertEquals($client->path() . '/sites/' . $site->id, $site->path());
    }
}
