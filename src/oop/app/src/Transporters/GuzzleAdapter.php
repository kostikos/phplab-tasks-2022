<?php

namespace src\oop\app\src\Transporters;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleAdapter implements TransportInterface
{
    private $client;

    /**
     * @param string $url
     * @return string
     * @throws GuzzleException
     */
    public function getContent(string $url): string
    {
        $this->client = new Client();
        $response = $this->client->get($url);
        $result = $response->getBody()->getContents();

        return $result;
    }
}
