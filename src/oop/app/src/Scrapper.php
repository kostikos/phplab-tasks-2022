<?php
/**
 * Create Class - Scrapper with method getMovie().
 * getMovie() - should return Movie Class object.
 *
 * Note: Use next namespace for Scrapper Class - "namespace src\oop\app\src;"
 * Note: Dont forget to create variables for TransportInterface and ParserInterface objects.
 * Note: Also you can add your methods if needed.
 */

namespace src\oop\app\src;

use src\oop\app\src\Models\Movie;

class Scrapper
{
    private Movie $movie;
    private $parser;
    private $transporter;

    /**
     * @param $transporter
     * @param $parser
     */
    public function __construct( $transporter, $parser)
    {
        $this->parser = $parser;
        $this->transporter = $transporter;
        $this->movie=new Movie();
    }

    /**
     * @param $url
     * @return Movie
     */
    public function getMovie($url): Movie
    {
        $data = $this->parser->parseContent($this->transporter->getContent($url));
        $this->movie->setTitle($data['title']);
        $this->movie->setPoster($data['poster']);
        $this->movie->setDescription($data['description']);

        return $this->movie;
    }
}
