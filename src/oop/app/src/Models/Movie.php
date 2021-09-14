<?php

namespace src\oop\app\src\Models;

class Movie implements MovieInterface
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $poster;

    /**
     * @var string
     */
    private $description;

    /**
     * Movie constructor.
     *
     * @param string $title
     * @param string $poster
     * @param string $description
     */
    public function __construct(string $title, string $poster, string $description)
    {
        $this->setTitle($title);
        $this->setPoster($poster);
        $this->setDescription($description);
    }

    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @inheritDoc
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @inheritDoc
     */
    public function getPoster(): string
    {
        return $this->poster;
    }

    /**
     * @inheritDoc
     */
    public function setPoster(string $poster): void
    {
        $this->poster = $poster;
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @inheritDoc
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}