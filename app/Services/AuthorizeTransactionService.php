<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class AuthorizeTransactionService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://run.mocky.io/'
        ]);
    }

    public function verifyAuthorizeTransaction()
    {
        try {
            $result = $this->client->request('GET', 'v3/8fafdd68-a090-496f-8c9a-3442cf30dae6');
            return json_decode($result->getBody(), true);
        } catch (GuzzleException $exception) {
            return ['message' => 'Não Autorizado'];
        }
    }
}