<?php

namespace Tests\Feature\Admin\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class EditControllerTest extends TestCase
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
        $response = $this->actingAs($this->user)->get(route('admin.user.edit', $this->user));
        $response->assertOk();
        $response->assertSee($this->user->title);
    }
}
