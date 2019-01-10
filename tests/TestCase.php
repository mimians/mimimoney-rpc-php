<?php

namespace Tests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use stdClass;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    const ADDRESS = 'NsereAyRt93Lseku7d6QFEJjqzK7rRw3A5R3HYetq572GLGEsgbYzVK8S5jfLwN2VDGa5cPgyCLTDF6oH15CDEV6Lt9h3xQfzkX';
    const VIEW_SECRET_KEY = 'eeaa56aac84d2ef2f16c8933ac719f68b3f8d566b760f6ea61a366f53e9cea04';
    const SPEND_PUBLIC_KEY = 'bbae889e76d08d30180659bd6a0d81b500235aa51a6474bca6ece37d5baa2c03';
    const SPEND_SECRET_KEY = '64751b12c98bcde2c86b8cdedb0349e094b1d20f1f050a0ece2b7fff4d6b8b04';
    const BLOCK_HASH = 'c1080ff0997e9411721c51b5e8f52bec3f773e1afe7d91fecdf13af6e95ab273';
    const BLOCK_COUNT = 325000;
    const KNOWN_BLOCK_COUNT = 325000;
    const HEIGHT = 325000;
    const NETWORK_HEIGHT = 325000;
    const PEER_COUNT = 2;
    const AVAILABLE_BALANCE = 100;
    const LOCKED_AMOUNT = 50;

    public function mockHandler($queue)
    {
        return HandlerStack::create(new MockHandler($queue));
    }

    public function emptyResultResponse()
    {
        $json = json_encode([
            'id'      => 0,
            'jsonrpc' => '2.0',
            'result'  => new stdClass(),
        ]);

        return new Response(200, [], $json);
    }

    public function getViewKeyResponse()
    {
        $json = json_encode([
            'id'      => 0,
            'jsonrpc' => '2.0',
            'result'  => [
                'viewSecretKey' => static::VIEW_SECRET_KEY,
            ],
        ]);

        return new Response(200, [], $json);
    }

    public function getSpendKeysResponse()
    {
        $json = json_encode([
            'id'      => 0,
            'jsonrpc' => '2.0',
            'result'  => [
                'spendPublicKey' => static::SPEND_PUBLIC_KEY,
                'spendSecretKey' => static::SPEND_SECRET_KEY,
            ],
        ]);

        return new Response(200, [], $json);
    }

    public function getStatusResponse()
    {
        $json = json_encode([
            'id'      => 0,
            'jsonrpc' => '2.0',
            'result'  => [
                'blockCount'      => static::BLOCK_COUNT,
                'knownBlockCount' => static::KNOWN_BLOCK_COUNT,
                'lastBlockHash'   => static::BLOCK_HASH,
                'peerCount'       => static::PEER_COUNT,
            ],
        ]);

        return new Response(200, [], $json);
    }

    public function getAddressesResponse()
    {
        $json = json_encode([
            'id'      => 0,
            'jsonrpc' => '2.0',
            'result'  => [
                'addresses' => [static::ADDRESS, static::ADDRESS],
            ],
        ]);

        return new Response(200, [], $json);
    }

    public function createAddressResponse()
    {
        $json = json_encode([
            'id'      => 0,
            'jsonrpc' => '2.0',
            'result'  => [
                'address' => static::ADDRESS,
            ],
        ]);

        return new Response(200, [], $json);
    }

    public function getBalanceResponse()
    {
        $json = json_encode([
            'id'      => 0,
            'jsonrpc' => '2.0',
            'result'  => [
                'availableBalance' => static::AVAILABLE_BALANCE,
                'lockedAmount'     => static::LOCKED_AMOUNT,
            ],
        ]);

        return new Response(200, [], $json);
    }

    public function getBlockHashesResponse()
    {
        $json = json_encode([
            'id'      => 0,
            'jsonrpc' => '2.0',
            'result'  => [
                'blockHashes' => [
                    static::BLOCK_HASH,
                    static::BLOCK_HASH,
                    static::BLOCK_HASH,
                ],
            ],
        ]);

        return new Response(200, [], $json);
    }

    public function getBlockCountResponse()
    {
        $json = json_encode([
            'id'      => 0,
            'jsonrpc' => '2.0',
            'result'  => [
                'count'  => static::BLOCK_COUNT,
                'status' => 'OK',
            ],
        ]);

        return new Response(200, [], $json);
    }

    public function getHeightResponse()
    {
        $json = json_encode([
            'id'      => 0,
            'jsonrpc' => '2.0',
            'result'  => [
                'height'         => static::HEIGHT,
                'network_height' => static::NETWORK_HEIGHT,
                'status'         => 'OK',
            ],
        ]);

        return new Response(200, [], $json);
    }
}
