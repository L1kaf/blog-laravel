<?php

namespace Tests\Feature\Admin\Post;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use Tests\TestCase;

class UpdateControllerTest extends TestCase
{
    use RefreshDatabase;

    private Post $category;
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->post = Post::factory()->create();
        $this->updatePost = Post::factory()->create();
        $this->user = User::factory()->create(['role' => USER::ROLE_ADMIN]);
    }

    public function testInvoke()
    {
        $response = $this
            ->actingAs($this->user)
            ->patch(route('admin.post.update', ['post' => $this->post->id]), [
            'title' => $this->updatePost->title,
            'content' => $this->updatePost->content,
            'category_id' => $this->updatePost->category_id,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('posts', [
            'title' => $this->updatePost->title,
            'content' => $this->updatePost->content,
            'category_id' => $this->updatePost->category_id,
            ]);
        $response->assertRedirect(route('admin.post.show', ['post' => $this->post->id]));
    }
}
