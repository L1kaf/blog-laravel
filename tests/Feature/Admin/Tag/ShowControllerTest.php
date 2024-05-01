<?php

namespace Tests\Feature\Admin\Tag;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowControllerTest extends TestCase
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
        $response = $this->actingAs($this->user)->get(route('admin.tag.show', $this->tag));
        $response->assertOk();
        $response->assertSee($this->tag->title);
    }
}
