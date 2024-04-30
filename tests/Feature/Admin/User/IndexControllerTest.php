<?php

namespace Tests\Feature\Admin\User;

use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    public function testInvoke()
    {
        $response = $this->get(route('admin.user.index'));

        $response->assertStatus(200);
    }
}
