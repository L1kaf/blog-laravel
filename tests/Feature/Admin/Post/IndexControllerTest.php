<?php

namespace Tests\Feature\Admin\Post;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(['role' => USER::ROLE_ADMIN]);
    }
    public function testInvoke()
    {
        $response = $this->actingAs($this->user)->get(route('admin.post.index'));

        $response->assertStatus(200);
    }
}
