<?php

namespace Tests\Feature\Admin\Tag;

use App\Models\Tag;
use Tests\TestCase;

class DestroyControllerTest extends TestCase
{
    private Tag $tag;

    public function setUp(): void
    {
        parent::setUp();
        $this->tag = Tag::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->delete(route('admin.tag.destroy', ['tag' => $this->tag]));

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('tags', ['title' => $this->tag->id]);
        $response->assertRedirect(route('admin.tag.index'));
    }
}
