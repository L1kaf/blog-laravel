<?php

namespace Tests\Feature\Admin\Tag;

use App\Models\Tag;
use App\Models\Category;
use Tests\TestCase;

class EditControllerTest extends TestCase
{
    private Tag $tag;

    public function setUp(): void
    {
        parent::setUp();
        $this->tag = Tag::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->get(route('admin.tag.edit', $this->tag));
        $response->assertOk();
        $response->assertSee($this->tag->title);
    }
}
