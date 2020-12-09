<?php

namespace Eduzz\ActivityHistory\Library;

use GuzzleHttp\Client as Guzzle;

class QueueSenderApi
{
    private $guzzle;

    public function __construct(Guzzle $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function send(
        $token,
        $data
    ) {
        $response = $this->guzzle->request(
            'POST',
            'https://activity-history.eduzz.com/store',
            [
                'headers' => [
                    'Authorization' => $token,
                ],
                'json' => $data
            ]
        );

        return json_decode($response->getBody()->getContents(), true);
    }
}