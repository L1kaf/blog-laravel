<?php

namespace Tests\Feature\Admin\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class ShowControllerTest extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testInvoke()
    {
        $response = $this->get(route('admin.user.show', $this->user));
        $response->assertOk();
        $response->assertSee($this->user->title);
    }
}
