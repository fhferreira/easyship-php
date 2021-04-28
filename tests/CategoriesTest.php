<?php

namespace Easyship\Tests;

use Easyship\EasyshipAPI;
use Easyship\Exceptions\UnsupportedApiVersionException;

class CategoriesTest extends TestCase
{
    public function test_lists_categories()
    {
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $mock->expects($this->once())
            ->method('request')
            ->with('get', 'https://api.easyship.com/reference/v1/categories');
        $api = new EasyshipAPI($this->faker->word);
        $api->setClient($mock);
        $api->categories()->list();
    }

    public function test_lists_categories_v2()
    {
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $api = new EasyshipAPI($this->faker->word, [], 2);
        $api->setClient($mock);
        $this->expectException(UnsupportedApiVersionException::class);
        $api->categories()->list();
    }
}
