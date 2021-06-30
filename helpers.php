<?php

use Chipslays\VkMusic\Client;

if (! function_exists('vk_music')) {
    function vk_music(string $token, string $useragent, string $version = '5.95') {
        return new Client($token, $useragent, $version);
    }
}