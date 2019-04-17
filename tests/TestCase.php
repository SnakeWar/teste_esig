<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Products;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function testApplication()
    {
        $response = $this->call('GET', '/products');

        $this->assertEquals(200, $response->status());
    }
}
