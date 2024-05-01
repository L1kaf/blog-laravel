<?php

namespace Tests\Feature\Admin\Post;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use Tests\TestCase;

class StoreControllerTest extends TestCase
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
        $response = $this->actingAs($this->user)->post(route('admin.post.store'), [
            'title' => $this->post->title,
            'content' => $this->post->content,
            'category_id' => $this->post->category_id,
            'preview_image' => $this->post->preview_image,
            'main_image' => $this->post->main_image,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('posts', [
            'title' => $this->post->title,
            'content' => $this->post->content,
            'category_id' => $this->post->category_id,
            'preview_image' => $this->post->preview_image,
            'main_image' => $this->post->main_image,
        ]);
        $response->assertRedirect(route('admin.post.index'));
    }
}
