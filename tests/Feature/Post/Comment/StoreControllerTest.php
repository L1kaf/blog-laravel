<?php

namespace Tests\Feature\Post\Comment;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Comment;
use Tests\TestCase;

class StoreControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Comment $comment;
    private Post $post;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->comment = Comment::factory()->create(['user_id' => $this->user->id]);
        $this->post = Post::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this
            ->actingAs($this->user)
            ->post(route('post.comment.store', $this->post->id), [
                'message' => $this->comment->message,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('comments', ['message' => $this->comment->message]);
        $response->assertRedirect(route('post.show', $this->post->id));
    }
}
