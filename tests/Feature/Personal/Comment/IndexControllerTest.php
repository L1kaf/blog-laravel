<?php

namespace Tests\Feature\Personal\Comment;

use App\Models\User;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testInvoke(): void
    {
        $response = $this->actingAs($this->user)->get(route('personal.comment.index'));

        $response->assertStatus(200);
    }
}
