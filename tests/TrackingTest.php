<?php

namespace Easyship\Tests;

use Easyship\EasyshipAPI;
use Easyship\Exceptions\UnsupportedApiVersionException;

class TrackingTest extends TestCase
{
    public function test_gets_status()
    {
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $mock->expects($this->once())
            ->method('request')
            ->with('get', 'https://api.easyship.com/track/v1/status');
        $api = new EasyshipAPI($this->faker->word);
        $api->setClient($mock);
        $api->tracking()->status([]);
    }

    public function test_gets_status_v2()
    {
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $api = new EasyshipAPI($this->faker->word, [], 2);
        $api->setClient($mock);
        $this->expectException(UnsupportedApiVersionException::class);
        $api->tracking()->status([]);
    }

    public function test_gets_checkpoints_v2()
    {
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $mock->expects($this->once())
            ->method('request')
            ->with('get', 'https://api.easyship.com/track/v1/checkpoints');
        $api = new EasyshipAPI($this->faker->word);
        $api->setClient($mock);
        $api->tracking()->checkpoints([]);
    }

    public function test_gets_checkpoints()
    {
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $api = new EasyshipAPI($this->faker->word, [], 2);
        $api->setClient($mock);
        $this->expectException(UnsupportedApiVersionException::class);
        $api->tracking()->checkpoints([]);
    }
}
