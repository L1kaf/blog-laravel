<?php

namespace Tests\Feature\Admin\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use Tests\TestCase;

class StoreControllerTest extends TestCase
{
    use RefreshDatabase;

    private Category $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = Category::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->post(route('admin.category.store'), [
            'title' => $this->category->title,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('categories', ['title' => $this->category->title]);
        $response->assertRedirect(route('admin.category.index'));
    }
}
