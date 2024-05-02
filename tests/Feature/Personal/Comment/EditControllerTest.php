<?php

namespace Tests\Feature\Personal\Comment;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditControllerTest extends TestCase
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
        $response = $this->actingAs($this->user)->get(route('personal.comment.edit', $this->comment));
        $response->assertOk();
        $response->assertSee($this->comment->title);
    }
}
