<?php

namespace src\oop\app\src\Transporters;

class CurlStrategy implements TransportInterface
{
    private $curl;

    /**
     * @param string $url
     * @return string
     */
    public function getContent(string $url): string
    {
        $this->curl = curl_init($url);
        curl_setopt($this->curl, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);

        return curl_exec($this->curl);
    }
}
