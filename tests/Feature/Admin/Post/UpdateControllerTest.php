<?php

namespace Tests\Feature\Admin\Post;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use Tests\TestCase;

class UpdateControllerTest extends TestCase
{
    use RefreshDatabase;

    private Post $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->post = Post::factory()->create();
        $this->updatePost = Post::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->patch(route('admin.post.update', ['post' => $this->post->id]), [
            'title' => $this->updatePost->title,
            'content' => $this->post->content,
            'category_id' => $this->post->category_id,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('posts', [
            'title' => $this->updatePost->title,
            'content' => $this->updatePost->content,
            'category_id' => $this->updatePost->category_id,
            ]);
    }
}
