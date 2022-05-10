<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function testTask()
    {
        $tasks = Task::factory()->count(10)->create();

        $response = $this->getJson('tasks');

        $response->assertStatus(200);
        $response->assertJsonCount($tasks->count());
    }
}
