# 🎵 VK Music API for PHP

A simple wrapper for VK Music API.

> For use this library, first you need get a token and user-agent.
>
> See for more [`vodka2/vk-audio-token`](https://github.com/vodka2/vk-audio-token).

## Installation

```bash
composer require chipslays/vk-music
```

## Usage

```php
use Chipslays\VkMusic\Client;

$client = new Client('YOUR_TOKEN', 'YOUR_USERAGENT');

$response = $client->search('Justin Bieber - Baby');

print_r($response->toArray());

// Array
// (
//     [count] => 3693
//     [items] => Array
//         (
//            [0] => ...
//            [1] => ...
//            [2] => ...
//         )
// )
```

You can get the value using dot notation by [`chipslays/collection`](https://github.com/chipslays/collection).

```php
print_r($response->get('items.0.artist'));
```

## Methods

> **NOTICE:** Optional parameter `$extra` is a array of parameters with `key => value`.

#### `search(string $q, int $offset = 0, int $count = 10, array $extra = []): Collection`
#### `getById(string|array $audios): Collection`
#### `get($owner_id, int $offset = 0, int $count = 10, $extra = []): Collection`
#### `getPlaylists($owner_id, int $count = 10): Collection`
#### `getRecommendations(int $count = 10): Collection`
#### `getPopular(int $count = 10): Collection`
#### `method(string $method, array $params): Collection`

## Helpers

You can use `vk_music` helper instead `Client` class.

```php
$client = vk_music('YOUR_TOKEN', 'YOUR_USERAGENT');
```

## Todo

* Write tests 😴💤

## License

MIT
