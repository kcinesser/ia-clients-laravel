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
        $this->get('/clients/create')->assertRedirect('login');
    }
}
