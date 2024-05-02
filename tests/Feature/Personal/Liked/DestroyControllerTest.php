<?php

namespace Tests\Feature\Personal\Liked;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->post = Post::factory()->create();
    }

    public function testInvoke(): void
    {
        $this->user->likedPosts()->attach($this->post);
        $response = $this->actingAs($this->user)->delete(route('personal.liked.destroy', $this->post));
        $response->assertRedirect(route('personal.liked.index'));
        $this->assertCount(0, $this->user->fresh()->likedPosts);

        $this->assertDatabaseMissing('post_user_likes', [
            'user_id' => $this->user->id,
            'post_id' => $this->post->id,
        ]);
    }
}
