<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $project = factory('App\Project')->create(['client_id' => $client->id]);

        $this->assertEquals($client->path() . '/projects/' . $project->id, $project->path());
    }

    /** @test */
    public function it_can_add_a_task() {
        $this->signIn();

        $client = factory('App\Client')->create(['account_manager_id' => auth()->id()]);
        $project = factory('App\Project')->create(['client_id' => $client->id]);

        $task = $project->addTask(['body' => 'Test task.']);

        $this->assertCount(1, $project->tasks);
        $this->assertTrue($project->tasks->contains($task));
    }
}
