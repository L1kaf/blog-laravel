<?php

namespace Tests\Feature\Admin\User;

use Tests\TestCase;

class CreateControllerTest extends TestCase
{
    public function testInvoke()
    {
        $response = $this->get(route('admin.user.create'));

        $response->assertOk();
    }
}
