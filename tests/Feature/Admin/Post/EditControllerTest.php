<?php

namespace Tests\Feature\Admin\Post;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use Tests\TestCase;

class EditControllerTest extends TestCase
{
    private Post $post;

    public function setUp(): void
    {
        parent::setUp();
        $this->post = Post::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->get(route('admin.post.edit', $this->post));
        $response->assertOk();
        $response->assertSee($this->post->id);
    }
}
