<?php

namespace Tests\Feature\Admin\Category;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use Tests\TestCase;

class ShowControllerTest extends TestCase
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
        $response = $this->actingAs($this->user)->get(route('admin.category.show', $this->category));
        $response->assertOk();
        $response->assertSee($this->category->title);
    }
}
