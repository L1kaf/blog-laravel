<?php

namespace Tests\Feature\Admin\Tag;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateControllerTest extends TestCase
{
    use RefreshDatabase;

    private Tag $tag;

    public function setUp(): void
    {
        parent::setUp();
        $this->tag = Tag::factory()->create();
        $this->updateTag = Tag::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->patch(route('admin.tag.update', ['tag' => $this->tag->id]), [
            'title' => $this->updateTag->title,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('tags', ['title' => $this->updateTag->title]);
        $response->assertRedirect(route('admin.tag.show', ['tag' => $this->tag->id]));
    }
}
