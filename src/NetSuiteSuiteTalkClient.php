<?php

namespace Wjbecker\NetSuiteSuiteTalk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use InvalidArgumentException;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class NetSuiteSuiteTalkClient
{
    private Client $client;
    protected array $resources = [];

    public function __construct(protected array $config)
    {
        $stack = HandlerStack::create();
        $stack->push(new Oauth1([
            'realm' => $config['realm'],
            'consumer_key' => $config['consumer_key'],
            'consumer_secret' => $config['consumer_secret'],
            'token' => $config['token'],
            'token_secret' => $config['token_secret'],
            'request_method' => Oauth1::REQUEST_METHOD_HEADER,
            'signature_method' => Oauth1::SIGNATURE_METHOD_HMACSHA256,
        ]));

        $this->client = new Client([
            'base_uri' => $config['base_uri'],
            'handler' => $stack,
            'auth' => 'oauth',
        ]);
    }

    public function __call(string $name, array $arguments)
    {
        $resourceClass = __NAMESPACE__ . '\\Resources\\' . ucfirst($name) . 'Resource';

        if (!class_exists($resourceClass)) {
            throw new InvalidArgumentException("The resource [$name] does not exist.");
        }

        if (!isset($this->resources[$name])) {
            $this->resources[$name] = new $resourceClass($this->client);
        }

        return $this->resources[$name];
    }

    public function query(string $q, array $query = [])
    {
        try {
            $response = $this->client->request('POST', 'query/v1/suiteql', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Prefer' => 'transient'
                ],
                'json' => ['q' => $q],
                'query' => $query
            ]);

            $response = json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            $response = $e->getMessage();
        }
        return $response;
    }
}
