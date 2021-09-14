<?php

namespace src\oop\app\src\Transporters;

use GuzzleHttp\Client;

class GuzzleAdapter implements TransportInterface
{

    /**
     * @inheritDoc
     */
    public function getContent(string $url): string
    {
        $client = new Client();
        //$cert_file = 'E:\Server\bin\php\cacert.pem';
        $response = $client->request('GET', $url, array('verify' => false));
        $result = $response->getBody()->getContents();

        return $result;
    }
}