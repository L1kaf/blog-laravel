<?php

namespace Tests\Feature\Admin\Tag;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateControllerTest extends TestCase
{
    use RefreshDatabase;

    private Tag $tag;
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->tag = Tag::factory()->create();
        $this->updateTag = Tag::factory()->create();
        $this->user = User::factory()->create(['role' => USER::ROLE_ADMIN]);
    }

    public function testInvoke()
    {
        $response = $this->actingAs($this->user)->patch(route('admin.tag.update', ['tag' => $this->tag->id]), [
            'title' => $this->updateTag->title,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('tags', ['title' => $this->updateTag->title]);
        $response->assertRedirect(route('admin.tag.show', ['tag' => $this->tag->id]));
    }
}
