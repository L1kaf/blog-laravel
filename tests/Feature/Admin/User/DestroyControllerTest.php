<?php

namespace Tests\Feature\Admin\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class DestroyControllerTest extends TestCase
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
        $response = $this->actingAs($this->user)->delete(route('admin.user.destroy', ['user' => $this->user]));

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('users', ['name' => $this->user->id]);
        $response->assertRedirect(route('admin.user.index'));
    }
}
