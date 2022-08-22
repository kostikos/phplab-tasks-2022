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
        $crawler = new Crawler($siteContent);

        $this->filmData['poster'] = $crawler->filter('.fposter a')->link()->getUri();
        $this->filmData['title'] = $crawler->filter('#fheader h1')->html();
        $this->filmData['description'] = $crawler->filter('#fdesc')->html();

        return $this->filmData;
    }
}
