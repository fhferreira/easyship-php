<?php

namespace Easyship\Modules;

use Easyship\Exceptions\UnsupportedApiVersionException;
use Easyship\Module;
use Psr\Http\Message\ResponseInterface;

class Pickups extends Module
{
    /**
     * Retrieve available pickup slots
     *
     * @link https://developers.easyship.com/v1.0/reference#retrieve-available-pick-up-slots
     *
     * @param string $courierId
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(string $courierId): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 1) {
            $endpoint = '/pickup/v1/pickup_slots/' . $courierId;
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('get', $endpoint);
    }

    /**
     * Request a pickup
     *
     * @link https://developers.easyship.com/v1.0/reference#request-a-pickup
     *
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function request(array $payload): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 1) {
            $endpoint = '/pickup/v1/pickups';
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('post', $endpoint, $payload);
    }

    /**
     * Mark as directly handed over
     *
     * @link https://developers.easyship.com/v1.0/reference#mark-as-handed-over
     *
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handOver(array $payload): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 1) {
            $endpoint = '/pickup/v1/direct_hand_over';
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('post', $endpoint, $payload);
    }
}
