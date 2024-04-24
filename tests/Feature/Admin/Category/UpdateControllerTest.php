<?php

namespace Tests\Feature\Admin\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use Tests\TestCase;

class UpdateControllerTest extends TestCase
{
    use RefreshDatabase;

    private Category $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = Category::factory()->create();
        $this->updateCategory = Category::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->patch(route('admin.category.update', ['category' => $this->category->id]), [
            'title' => $this->updateCategory->title,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('categories', ['title' => $this->updateCategory->title]);
        $response->assertRedirect(route('admin.category.show', ['category' => $this->category->id]));
    }
}
