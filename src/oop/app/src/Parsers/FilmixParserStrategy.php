<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;

class FilmixParserStrategy implements ParserInterface
{
    /**
     * @inheritDoc
     */
    public function parseContent(string $siteContent)
    {
        preg_match('/<title[^>]*>(.*?)<\/title>/si', $siteContent, $titleSearchArray);
        $title = $titleSearchArray[1];

        preg_match('/"fancybox" rel="group" href="[^"]*/i', $siteContent, $posterSearchArray);
        $poster = strchr($posterSearchArray[0], 'https');

        preg_match('/class="full-story">(?:[^\\\\"]|\\\\\\\\|\\\\")*/i', $siteContent, $descriptionSearchArray);
        $description = ltrim(strchr($descriptionSearchArray[0], '>'), '>');

        return new Movie($title, $poster, $description);
    }
}