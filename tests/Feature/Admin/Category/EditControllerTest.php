<?php

namespace Tests\Feature\Admin\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use Tests\TestCase;

class EditControllerTest extends TestCase
{
    private Category $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = Category::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->get(route('admin.category.edit', $this->category));
        $response->assertOk();
        $response->assertSee($this->category->title);
    }
}
