<?php

use Chipslays\VkMusic\Client;

require __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/config.php';

$client = new Client($config['token'], $config['useragent']);

$response = $client->method('audio.search', ['q' => 'Justin Bieber - Baby', 'count' => '10']);
print_r($response->toArray());

$response = $client->search('Justin Bieber - Baby');
print_r($response->toArray());

$response = $client->getById(["371745461_456289486", '-41489995_202246189']);
print_r($response->toArray());

$response = $client->get("371745461");
print_r($response->toArray());

$response = $client->getPopular();
print_r($response->toArray());
