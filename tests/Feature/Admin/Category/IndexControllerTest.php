<?php

namespace Tests\Feature\Admin\Category;

use App\Models\User;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(['role' => USER::ROLE_ADMIN]);
    }
    public function testInvoke()
    {
        $response = $this->actingAs($this->user)->get(route('admin.category.index'));

        $response->assertStatus(200);
    }
}
