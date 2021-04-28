<?php

namespace Easyship\Tests;

use Easyship\EasyshipAPI;

class RatesTest extends TestCase
{
    public function test_gets_rates()
    {
        $payload = ['test' => $this->faker->word];
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $mock->expects($this->once())
            ->method('request')
            ->with('post', 'https://api.easyship.com/rate/v1/rates');
        $api = new EasyshipAPI($this->faker->word);
        $api->setClient($mock);
        $api->rates()->get($payload);
    }

    public function test_gets_rates_v2()
    {
        $payload = ['test' => $this->faker->word];
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $mock->expects($this->once())
            ->method('request')
            ->with('post', 'https://api.easyship.com/v2/rates');
        $api = new EasyshipAPI($this->faker->word, [], 2);
        $api->setClient($mock);
        $api->rates()->get($payload);
    }
}
