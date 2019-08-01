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
        $client = factory('App\Client')->create();
        $site = factory('App\Site')->create(['client_id' => $client->id]);        

        $this->assertEquals($client->path() . '/sites/1', $site->path());
    }

    /** @test */
    public function it_can_add_a_domain() {
        $this->signIn();
        $client = factory('App\Client')->create();
        $site = factory('App\Site')->create(['client_id' => $client->id]);   

        $domain = $site->addDomain([
        	'name' => 'test.com',
        	'registrar_id' => 1
        ]);

        $this->assertCount(1, $site->domains);
        $this->assertTrue($site->domains->contains($domain));
    }
}
