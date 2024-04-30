<?php

namespace Tests\Feature\Admin\Post;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use Tests\TestCase;

class StoreControllerTest extends TestCase
{
    use RefreshDatabase;

    private Post $post;

    public function setUp(): void
    {
        parent::setUp();
        $this->post = Post::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->post(route('admin.post.store'), [
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
