<?php

namespace Tests\Feature\Admin\Tag;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreControllerTest extends TestCase
{
    use RefreshDatabase;

    private Tag $tag;

    public function setUp(): void
    {
        parent::setUp();
        $this->tag = Tag::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->post(route('admin.tag.store'), [
            'title' => $this->tag->title,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('tags', ['title' => $this->tag->title]);
        $response->assertRedirect(route('admin.tag.index'));
    }
}
