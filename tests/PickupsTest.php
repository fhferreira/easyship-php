<?php

namespace Easyship\Tests;

use Easyship\EasyshipAPI;
use Easyship\Exceptions\UnsupportedApiVersionException;

class PickupsTest extends TestCase
{
    public function test_gets_pickup_slots()
    {
        $courierId = $this->faker->uuid;
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $mock->expects($this->once())
            ->method('request')
            ->with(
                'get',
                'https://api.easyship.com/pickup/v1/pickup_slots/'.$courierId
            );
        $api = new EasyshipAPI($this->faker->word);
        $api->setClient($mock);
        $api->pickups()->get($courierId);
    }

    public function test_gets_pickup_slots_v2()
    {
        $courierId = $this->faker->uuid;
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $api = new EasyshipAPI($this->faker->word, [], 2);
        $api->setClient($mock);
        $this->expectException(UnsupportedApiVersionException::class);
        $api->pickups()->get($courierId);
    }

    public function test_requests_pickup()
    {
        $payload = ['test' => $this->faker->word];
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $mock->expects($this->once())
            ->method('request')
            ->with('post', 'https://api.easyship.com/pickup/v1/pickups');
        $api = new EasyshipAPI($this->faker->word);
        $api->setClient($mock);
        $api->pickups()->request($payload);
    }

    public function test_requests_pickup_v2()
    {
        $payload = ['test' => $this->faker->word];
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $api = new EasyshipAPI($this->faker->word, [], 2);
        $api->setClient($mock);
        $this->expectException(UnsupportedApiVersionException::class);
        $api->pickups()->request($payload);
    }

    public function test_hands_over_shipment()
    {
        $payload = ['test' => $this->faker->word];
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $mock->expects($this->once())
            ->method('request')
            ->with('post', 'https://api.easyship.com/pickup/v1/direct_hand_over');
        $api = new EasyshipAPI($this->faker->word);
        $api->setClient($mock);
        $api->pickups()->handOver($payload);
    }

    public function test_hands_over_shipment_v2()
    {
        $payload = ['test' => $this->faker->word];
        $mock = $this->createMock(\GuzzleHttp\Client::class);
        $api = new EasyshipAPI($this->faker->word, [], 2);
        $api->setClient($mock);
        $this->expectException(UnsupportedApiVersionException::class);
        $api->pickups()->handOver($payload);
    }
}
