<?php

namespace Tests\Feature\Admin\Main;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexControllerTest extends TestCase
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
        $response = $this->actingAs($this->user)->get('/admin');

        $response->assertStatus(200);
    }
}
