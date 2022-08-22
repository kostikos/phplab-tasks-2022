<?php

namespace src\oop\app\src\Transporters;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleAdapter implements TransportInterface
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $url
     * @return string
     * @throws GuzzleException
     */
    public function getContent(string $url): string
    {
        $response = $this->client->get($url);
        $result = $response->getBody()->getContents();
        $charset = substr(strstr($response->getHeader('content-type')[0], 'charset='), 8);

        if (strtoupper($charset) != 'UTF_8') {
            $result = iconv($charset, "UTF-8", $result);
        }

        return $result;
    }
}
