<?php

namespace Tests\Feature\Admin\Category;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use Tests\TestCase;

class UpdateControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Category $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = Category::factory()->create();
        $this->updateCategory = Category::factory()->create();
        $this->user = User::factory()->create(['role' => USER::ROLE_ADMIN]);
    }

    public function testInvoke()
    {
        $response = $this
            ->actingAs($this->user)
            ->patch(route('admin.category.update', ['category' => $this->category->id]), [
            'title' => $this->updateCategory->title,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('categories', ['title' => $this->updateCategory->title]);
        $response->assertRedirect(route('admin.category.show', ['category' => $this->category->id]));
    }
}
