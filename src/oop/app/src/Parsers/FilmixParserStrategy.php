<?php

namespace src\oop\app\src\Parsers;


class FilmixParserStrategy implements ParserInterface
{
    private $filmData;

    /**
     * @param string $siteContent
     * @return mixed
     */
    public function parseContent(string $siteContent)
    {
        if (preg_match('%<meta[^>]+charset=[\'"]?([\w-]+)%i', $siteContent, $matches)) {
            $charset = $matches[1];
        }

        if (!empty($charset) && strtoupper($charset) != 'UTF_8') {
            $siteContent = iconv($charset, "UTF-8", $siteContent);
        }

        preg_match('#<h1 class="name" itemprop="name">(.*?)</h1>#', $siteContent, $arResult['title']);
        preg_match('#<div class="full-story">(.*?)</div>#', $siteContent, $arResult['description']);
        preg_match('#<img src="(.*?)" class="poster poster-tooltip"#', $siteContent, $arResult['img']);

        $this->filmData['title'] = $arResult['title'][1];
        $this->filmData['description'] = $arResult['description'][1];
        $this->filmData['poster'] = $arResult['img'][1];

        return $this->filmData;
    }
}
