<?php

namespace Tests\Feature\Admin\Post;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use Tests\TestCase;

class DestroyControllerTest extends TestCase
{
    private Post $post;

    public function setUp(): void
    {
        parent::setUp();
        $this->post = Post::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->delete(route('admin.post.destroy', ['post' => $this->post]));

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('categories', ['title' => $this->post->id]);
        $response->assertRedirect(route('admin.post.index'));
    }
}
