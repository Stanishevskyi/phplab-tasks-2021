<?php

namespace src\oop\app\src;

use src\oop\app\src\Models\Movie;

/**
 * Create Class - Scrapper with method getMovie().
 * getMovie() - should return Movie Class object.
 *
 * Note: Use next namespace for Scrapper Class - "namespace src\oop\app\src;"
 * Note: Dont forget to create variables for TransportInterface and ParserInterface objects.
 * Note: Also you can add your methods if needed.
 */

class Scrapper
{
    public $resource;    //достаем данные по определенному сайту
    public $parse;       //для парсинга данных которые мы достанем с определенного сайта

    public function __construct($resource, $parse)
    {
        $this->resource = $resource;
        $this->parse = $parse;
    }

    public function getMovie($url): Movie
    {
        $data = $this->resource->getContent($url);

        return $this->parse->parseContent($data);
    }
}