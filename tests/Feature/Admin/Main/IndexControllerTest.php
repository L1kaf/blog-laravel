<?php

namespace Tests\Feature\Admin\Main;

use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    public function testInvoke()
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
    }
}
