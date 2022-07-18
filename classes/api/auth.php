<?php

require_once __DIR__ . '/../../vendor/autoload.php';
use GuzzleHttp\Client;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

/**
 * Connect to time4vps api
 *
 * @return object
 */
function client()
{
    return $client = new Client(
        [
        'base_uri' => 'https://billing.time4vps.com',
        'auth' => [$_ENV['USER_EMAIL'], $_ENV['USER_PASSWORD']]
        ]
    );
}