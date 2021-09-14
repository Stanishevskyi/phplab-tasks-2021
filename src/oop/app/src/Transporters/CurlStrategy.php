<?php

namespace src\oop\app\src\Transporters;

class CurlStrategy implements TransportInterface
{

    /**
     * @inheritDoc
     */
    public function getContent(string $url): string
    {
        $ch = curl_init();
        //Tell cURL where our certificate bundle is located.
        $certificate = "E:\Server\bin\php\cacert.pem";

        curl_setopt($ch, CURLOPT_CAINFO, $certificate);
        curl_setopt($ch, CURLOPT_CAPATH, $certificate);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        curl_close($ch);

        $encodeResult = mb_convert_encoding($result, 'utf-8', 'windows-1251');

        return $encodeResult;
    }
}