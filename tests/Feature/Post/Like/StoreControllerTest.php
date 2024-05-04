<?php

namespace Tests\Feature\Post\Like;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Post $post;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->post = Post::factory()->create();
    }

    public function testInvoke()
    {
        $this->actingAs($this->user)
            ->post(route('post.like.store', ['post' => $this->post]));

        $this->assertTrue($this->user->likedPosts->contains($this->post));
    }
}
