<?php

namespace Tests\Feature\Admin\Category;

use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    public function testInvoke()
    {
        $response = $this->get(route('admin.category.index'));

        $response->assertStatus(200);
    }
}
