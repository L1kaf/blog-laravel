<?php

namespace Tests\Feature\Admin\Tag;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreControllerTest extends TestCase
{
    use RefreshDatabase;

    private Tag $tag;
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->tag = Tag::factory()->create();
        $this->user = User::factory()->create(['role' => USER::ROLE_ADMIN]);
    }

    public function testInvoke()
    {
        $response = $this->actingAs($this->user)->post(route('admin.tag.store'), [
            'title' => $this->tag->title,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('tags', ['title' => $this->tag->title]);
        $response->assertRedirect(route('admin.tag.index'));
    }
}
