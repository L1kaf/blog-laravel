<?php

namespace Tests\Feature\Admin\Post;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use Tests\TestCase;

class ShowControllerTest extends TestCase
{
    use RefreshDatabase;

    private Post $post;
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->post = Post::factory()->create();
        $this->user = User::factory()->create(['role' => USER::ROLE_ADMIN]);
    }

    public function testInvoke()
    {
        $response = $this->actingAs($this->user)->get(route('admin.post.show', $this->post));
        $response->assertOk();
        $response->assertSee($this->post->id);
    }
}
