<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TaskPaginationTest extends TestCase
{
    use RefreshDatabase;

    public function test_example()
    {
        $user = User::factory()->create();
        Auth::login($user);

        Task::factory()->count(15)->create(['user_id' => $user->id]);

        $response = $this->get('/tasks');
        $response->assertStatus(200);
        $response->assertSee('pagination');
    }
}
