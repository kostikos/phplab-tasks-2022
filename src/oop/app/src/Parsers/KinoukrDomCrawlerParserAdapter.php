<?php

namespace src\oop\app\src\Parsers;

use Symfony\Component\DomCrawler\Crawler;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{
    private $filmData;

    /**
     * @param string $siteContent
     * @return mixed
     */
    public function parseContent(string $siteContent)
    {
        if ($siteContent !== null && preg_match('%<meta[^>]+charset=[\'"]?([\w-]+)%i', $siteContent, $matches)) {
            $charset = $matches[1];
        }

        if (!empty($charset) && strtoupper($charset) != 'UTF_8') {
            $siteContent = iconv($charset, "UTF-8", $siteContent);
        }

        $crawler = new Crawler($siteContent);

        $this->filmData['poster'] = $crawler->filter('.fposter a')->link()->getUri();
        $this->filmData['title'] = $crawler->filter('#fheader h1')->text();
        $this->filmData['description'] = $crawler->filter('#fdesc')->text();

        return $this->filmData;
    }
}
