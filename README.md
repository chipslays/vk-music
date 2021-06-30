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

#### `search(string $q, int $count = 10, int $offset = 0, array $extra = []): Collection`
```php
$client->search('Justin Bieber - Baby');
```

#### `getById(string|array $audios): Collection`
```php
$client->getById(['371745461_456289486', '-41489995_202246189']);
```

#### `get($owner_id, int $count = 10, int $offset = 0, $extra = []): Collection`
```php
$client->get('371745461');
```

#### `getPlaylists($owner_id, int $count = 10): Collection`
```php
$client->getPlaylists('371745461');
```

#### `getRecommendations(int $count = 10): Collection`
```php
$client->getRecommendations();
```

#### `getPopular(int $count = 10): Collection`
```php
$client->getPopular();
```

#### `method(string $method, array $params): Collection`
```php
$client->method('audio.search', [
    'q' => 'Justin Bieber - Baby',
    'count' => '10',
]);
```

## Helpers

You can use `vk_music` helper instead `Client` class.

```php
$client = vk_music('YOUR_TOKEN', 'YOUR_USERAGENT');
```

## Todo

* Write tests 😴💤

## License

MIT
