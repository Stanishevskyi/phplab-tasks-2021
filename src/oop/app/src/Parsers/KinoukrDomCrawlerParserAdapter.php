<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;
use Symfony\Component\DomCrawler\Crawler;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{

    /**
     * @inheritDoc
     */
    public function parseContent(string $siteContent)
    {
        $crawler = new Crawler($siteContent);

        $crawlerTitle = $crawler->filter('title')->text();
        $crawlerImage = $crawler->filter('a[data-fancybox]')->link()->getUri();

        $htmlDescription = $crawler->filter('div[class="fdesc full-text noselect clearfix"]')->html();
        $crawlerDescription = trim(preg_replace("'<h2[^>]*?>.*?</h2>'si", "", $htmlDescription));

        return new Movie($crawlerTitle, $crawlerImage, $crawlerDescription);
    }
}