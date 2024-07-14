<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class TaskModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_example()
    {
        Task::factory()->create(['tittle' => 'Project Lakupandai']);
        Task::factory()->create(['tittle' => 'Project Imigrasi']);

        $tasks = Task::where('tittle', 'Project Lakupandai')->get();

        $this->assertCount(1, $tasks);
        $this->assertEquals('Task One', $tasks->first()->tittle);
    }
}
