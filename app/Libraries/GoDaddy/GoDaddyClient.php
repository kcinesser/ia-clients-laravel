<?php

namespace App\Libraries\GoDaddy;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\RequestOptions;
use function GuzzleHttp\json_decode;
use Log;

/**
 * Class FdpApiClient
 *
 * @package App\Libraries\GuzzleHttp
 */
class GoDaddyClient
{
    /**
     * @var string
     */
    private $apiUrl;

    /**
     * @var Guzzle
     */
    private $httpClient;

    /**
     * @var string
     */
    private $apiKey = '';
    
    /**
     * @var string
     */
    private $apiSecret = '';

    /**
     * FdpApiClient constructor.
     *
     * @param Guzzle $httpClient
     * @param string $apiUrl
     * @param bool   $verify
     */
    public function __construct(Guzzle $httpClient, $apiUrl, $apiKey, $apiSecret)
    {
        $this->httpClient = $httpClient;
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    /**
     * @param string $uri
     * @param array  $queryParams
     *
     * @return array
     */
    public function get($uri, array $queryParams = [])
    {
        $options = [
            RequestOptions::QUERY => $queryParams
        ];
        return $this->sendRequest('GET', $uri, $options);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array  $options
     *
     * @return array
     */
    public function sendRequest($method, $uri, array $options = [])
    {
        $defaultOptions = $this->getDefaultOptions();

        $options = array_merge($defaultOptions, $options);

        $response = $this->httpClient->request($method, $uri, $options);
        $responseData = json_decode($response->getBody()->getContents(), TRUE);
        
        return $responseData;
    }

    /**
     * @return array
     */
    private function getDefaultOptions()
    {
        return [
            'base_uri' => $this->apiUrl,
            'headers'  => [
                'Content-Type' => 'application/json', 
                'Accept' => 'application/json', 
                'Authorization' => "sso-key {$this->apiKey}:{$this->apiSecret}",
            ],
            'debug' => true,
        ];
    }
}