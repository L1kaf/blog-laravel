<?php

namespace Tests\Feature\Admin\Tag;

use App\Models\Tag;
use Tests\TestCase;

class ShowControllerTest extends TestCase
{
    private Tag $tag;

    public function setUp(): void
    {
        parent::setUp();
        $this->tag = Tag::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->get(route('admin.tag.show', $this->tag));
        $response->assertOk();
        $response->assertSee($this->tag->title);
    }
}
