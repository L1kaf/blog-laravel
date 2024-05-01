<?php

namespace Tests\Feature\Admin\Post;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use Tests\TestCase;

class DestroyControllerTest extends TestCase
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
        $response = $this->actingAs($this->user)->delete(route('admin.post.destroy', ['post' => $this->post]));

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('categories', ['title' => $this->post->id]);
        $response->assertRedirect(route('admin.post.index'));
    }
}
