<?php

namespace Tests\Feature\Admin\Category;

use Tests\TestCase;

class CreateControllerTest extends TestCase
{
    public function testInvoke()
    {
        $response = $this->get(route('admin.category.create'));

        $response->assertOk();
    }
}
