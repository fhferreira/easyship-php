<?php

namespace Easyship\Modules;

use Easyship\Exceptions\UnsupportedApiVersionException;
use Easyship\Module;
use Psr\Http\Message\ResponseInterface;

class Shipments extends Module
{
    /**
     * Retrieve a shipment's details
     *
     * @link https://developers.easyship.com/reference#get-a-shipment
     *
     * @param string $id
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(string $shipmentId): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 1) {
            $endpoint = '/shipment/v1/shipments/' . $shipmentId;
        } elseif ($this->easyship->getApiVersion() == 2) {
            $endpoint = '/v2/shipments/' . $shipmentId;
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('get', $endpoint);
    }

    /**
     * Retrieve a list of shipments
     *
     * @link https://developers.easyship.com/reference#get-shipments
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function list(): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 1) {
            $endpoint = '/shipment/v1/shipments';
        } elseif ($this->easyship->getApiVersion() == 2) {
            $endpoint = '/v2/shipments';
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('get', $endpoint);
    }

    /**
     * Create a shipment
     *
     * @link https://developers.easyship.com/reference#create-a-shipment
     *
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create(array $payload): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 1) {
            $endpoint = '/shipment/v1/shipments';
        } elseif ($this->easyship->getApiVersion() == 2) {
            $endpoint = '/v2/shipments';
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('post', $endpoint, $payload);
    }

    /**
     * Create a shipment and request the label in a single request
     *
     * @link https://developers.easyship.com/v1.0/reference#create-a-shipment-and-buy-label
     *
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createAndBuyLabel(array $payload): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 1) {
            $endpoint = '/shipment/v1/shipments/create_and_buy_label';
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('post', $endpoint, $payload);
    }

    /**
     * Update a shipment
     *
     * @link https://developers.easyship.com/v1.0/reference#update-a-shipment
     *
     * @param string $id
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update(string $shipmentId, array $payload): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 1) {
            $endpoint = '/shipment/v1/shipments/' . $shipmentId;
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('patch', $endpoint, $payload);
    }

    /**
     * Delete a shipment
     *
     * @link https://developers.easyship.com/v1.0/reference#delete-a-shipment
     *
     * @param string $id
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete(string $shipmentId): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 1) {
            $endpoint = '/shipment/v1/shipments/' . $shipmentId;
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('delete', $endpoint);
    }

    /**
     * Update the warehouse state of one or more shipments
     *
     * @link https://developers.easyship.com/reference#update-warehouse-state
     *
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function updateWarehouseState(array $payload): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 1) {
            $endpoint = '/shipment/v1/shipments/update_warehouse_state';
        } elseif ($this->easyship->getApiVersion() == 2) {
            $endpoint = '/v2/shipments/warehouse_state';
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('patch', $endpoint, $payload);
    }
}
