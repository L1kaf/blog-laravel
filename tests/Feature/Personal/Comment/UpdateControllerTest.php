<?php

namespace Tests\Feature\Personal\Comment;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Comment;
use Tests\TestCase;

class UpdateControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Comment $comment;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->comment = Comment::factory()->create(['user_id' => $this->user->id]);
        $this->updateComment = Comment::factory()->create(['user_id' => $this->user->id]);
    }

    public function testInvoke()
    {
        $response = $this
            ->actingAs($this->user)
            ->patch(route('personal.comment.update', ['comment' => $this->comment->id]), [
            'message' => $this->updateComment->message,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('comments', ['message' => $this->updateComment->message]);
        $response->assertRedirect(route('personal.comment.index'));
    }
}
