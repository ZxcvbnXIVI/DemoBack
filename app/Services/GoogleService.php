<?php
namespace App\Services;

use GuzzleHttp\Client;

class GoogleService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.googleapis.com/',
            'verify'   => true, 
        ]);
    }

}