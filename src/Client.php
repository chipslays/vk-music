<?php

namespace Chipslays\VkMusic;

use Chipslays\VkMusic\Traits\Methods;
use Chipslays\Collection\Collection;
use CurlHandle;

class Client
{
    use Methods;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $useragent;

    /**
     * @var string
     */
    private $version;

    /**
     * @var CurlHandle
     */
    private $http;

    public function __construct(string $token, string $useragent, string $version = '5.95')
    {
        $this->token = $token;
        $this->useragent = $useragent;
        $this->version = $version;
    }

    public function method(string $method, array $params)
    {
        $this->http = $this->http ?? $this->initHttpClient();

        $params = array_merge([
            'access_token' => $this->token,
            'v' => $this->version,
        ], $params);

        $url = "https://api.vk.com/method/{$method}?" . http_build_query($params);

        curl_setopt($this->http, CURLOPT_URL, $url);

        $response = json_decode(curl_exec($this->http), true);

        return new Collection($response['response'] ?? []);
    }

    protected function initHttpClient()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTPHEADER, ['User-Agent: ' . $this->useragent]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        return $ch;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return self
     */
    public function setToken(string $token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return string
     */
    public function getUseragent()
    {
        return $this->useragent;
    }

    /**
     * @param string $useragent
     * @return self
     */
    public function setUseragent(string $useragent)
    {
        $this->useragent = $useragent;

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return self
     */
    public function setVersion(string $version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return CurlHandle
     */
    public function getHttp()
    {
        return $this->http;
    }

    /**
     * @param CurlHandle $http
     * @return self
     */
    public function setHttp(CurlHandle $http)
    {
        $this->http = $http;

        return $this;
    }
}
