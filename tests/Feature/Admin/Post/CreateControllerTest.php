<?php

namespace Tests\Feature\Admin\Post;

use Tests\TestCase;

class CreateControllerTest extends TestCase
{
    public function testInvoke()
    {
        $response = $this->get(route('admin.tag.create'));

        $response->assertOk();
    }
}
