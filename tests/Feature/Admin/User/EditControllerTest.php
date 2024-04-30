<?php

namespace Tests\Feature\Admin\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class EditControllerTest extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->get(route('admin.user.edit', $this->user));
        $response->assertOk();
        $response->assertSee($this->user->title);
    }
}
