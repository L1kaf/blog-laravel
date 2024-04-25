<?php

namespace Tests\Feature\Admin\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use Tests\TestCase;

class DestroyControllerTest extends TestCase
{
    private Category $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = Category::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->delete(route('admin.category.destroy', ['category' => $this->category]));

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('categories', ['title' => $this->category->id]);
        $response->assertRedirect(route('admin.category.index'));
    }
}
