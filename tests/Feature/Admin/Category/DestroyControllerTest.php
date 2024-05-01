<?php

namespace Tests\Feature\Admin\Category;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use Tests\TestCase;

class DestroyControllerTest extends TestCase
{
    private Category $category;
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = Category::factory()->create();
        $this->user = User::factory()->create(['role' => USER::ROLE_ADMIN]);
    }

    public function testInvoke()
    {
        $response = $this
            ->actingAs($this->user)
            ->delete(route('admin.category.destroy', ['category' => $this->category]));

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('categories', ['title' => $this->category->id]);
        $response->assertRedirect(route('admin.category.index'));
    }
}
