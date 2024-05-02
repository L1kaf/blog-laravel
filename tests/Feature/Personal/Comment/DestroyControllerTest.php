<?php

namespace Tests\Feature\Personal\Comment;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Comment;
use Tests\TestCase;

class DestroyControllerTest extends TestCase
{
    use RefreshDatabase;

    private Comment $comment;
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->comment = Comment::factory()->create(['user_id' => $this->user->id]);
    }

    public function testInvoke()
    {
        $response = $this
            ->actingAs($this->user)
            ->delete(route('personal.comment.destroy', ['comment' => $this->comment]));

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('comments', ['message' => $this->comment->id]);
        $response->assertRedirect(route('personal.comment.index'));
    }
}
