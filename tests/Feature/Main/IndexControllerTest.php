<?php

namespace Tests\Feature\Main;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testInvoke(): void
    {
        $response = $this->get('/');

        $response->assertRedirect(route('post.index'));
    }
}
