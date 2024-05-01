<?php

namespace Tests\Feature\Admin\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class UpdateControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(['role' => USER::ROLE_ADMIN]);
        $this->updateUser = User::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->actingAs($this->user)->patch(route('admin.user.update', ['user' => $this->user->id]), [
            'name' => $this->updateUser->name,
            'email' => $this->updateUser->email,
            'password' => $this->updateUser->password,
        ]);


        $this->assertDatabaseHas('users', [
            'name' => $this->updateUser->name,
            'email' => $this->updateUser->email,
            'password' => $this->updateUser->password,
        ]);
    }
}
