<?php

namespace Tests\Feature\Admin\Tag;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(['role' => USER::ROLE_ADMIN]);
    }
    public function testInvoke()
    {
        $response = $this->actingAs($this->user)->get(route('admin.tag.create'));

        $response->assertOk();
    }
}
