<?php

namespace Tests\Feature\Admin\Tag;

use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    public function testInvoke()
    {
        $response = $this->get(route('admin.tag.index'));

        $response->assertStatus(200);
    }
}