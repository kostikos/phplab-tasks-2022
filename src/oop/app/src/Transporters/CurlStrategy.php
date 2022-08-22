<?php

namespace src\oop\app\src\Transporters;

class CurlStrategy implements TransportInterface
{
    private $curl;

    public function __construct()
    {
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_HEADER, false);
        curl_setopt($this->curl, CURLOPT_NOBODY, false);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
    }

    function __destruct()
    {
        curl_close($this->curl);
    }

    /**
     * @param string $url
     * @return string
     */
    public function getContent(string $url): string
    {
        $charset = null;

        curl_setopt($this->curl, CURLOPT_URL, $url);
        $result = curl_exec($this->curl);
        $contentType = curl_getinfo($this->curl, CURLINFO_CONTENT_TYPE);

        if (
            ($contentType !== null && preg_match('%charset=([\w-]+)%i', $contentType, $matches))
            || preg_match('%<meta[^>]+charset=[\'"]?([\w-]+)%i', $result, $matches)
        ) {
            $charset = $matches[1];
        }
        if ($charset && strtoupper($charset) !== 'UTF-8') {
            $result = iconv($charset, 'UTF-8', $result);
        }

        return $result ?: "Ошибка CURL: " . curl_error($this->curl);
    }
}
