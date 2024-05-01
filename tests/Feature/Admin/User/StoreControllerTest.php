<?php

namespace Tests\Feature\Admin\User;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class StoreControllerTest extends TestCase
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
        $response = $this->actingAs($this->user)->post(route('admin.user.store'), [
            'name' => $this->user->name,
            'email' => $this->user->email,
            'password' => $this->user->password,
        ]);

        $this->assertDatabaseHas('users', [
            'name' => $this->user->name,
            'email' => $this->user->email,
            'password' => $this->user->password,
            ]);
    }
}
