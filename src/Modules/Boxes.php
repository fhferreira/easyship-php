<?php

namespace Easyship\Modules;

use Easyship\Exceptions\UnsupportedApiVersionException;
use Easyship\Module;
use Psr\Http\Message\ResponseInterface;

class Boxes extends Module
{
    /**
     * Retrieve a list of all boxes
     *
     * @link https://developers.easyship.com/reference#boxes
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function list(): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 2) {
            $endpoint = '/v2/boxes';
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('get', $endpoint);
    }
}
