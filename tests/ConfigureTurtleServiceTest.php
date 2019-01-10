<?php

namespace Tests;

use TurtleCoin\TurtleService;

class ConfigureTurtleServiceTest extends TestCase
{
    public function testConfigureDefaultValues()
    {
        $turtleService = new TurtleService();
        $turtleService->configure([]);
        $this->assertEquals([
            'rpcHost'      => 'http://178.238.232.123',
            'rpcPort'      => 8070,
            'rpcPassword'  => 'test',
            'rpcBaseRoute' => '/json_rpc',
        ], $turtleService->config());
    }

    public function testConfigureAllValues()
    {
        $turtleService = new TurtleService();
        $turtleService->configure([
            'rpcHost'      => 'http://178.238.232.123',
            'rpcPort'      => 8080,
            'rpcPassword'  => 'testing',
            'rpcBaseRoute' => '/api/v1',
        ]);

        $this->assertEquals([
            'rpcHost'      => 'http://178.238.232.123',
            'rpcPort'      => 8080,
            'rpcPassword'  => 'testing',
            'rpcBaseRoute' => '/api/v1',
        ], $turtleService->config());
    }

    public function testConfigureViaConstructor()
    {
        $turtleService = new TurtleService([
            'rpcHost'      => 'http://178.238.232.123',
            'rpcPort'      => 8080,
            'rpcPassword'  => 'testing',
            'rpcBaseRoute' => '/api/v1',
        ]);

        $this->assertEquals([
            'rpcHost'      => 'http://178.238.232.123',
            'rpcPort'      => 8080,
            'rpcPassword'  => 'testing',
            'rpcBaseRoute' => '/api/v1',
        ], $turtleService->config());
    }

    public function testConfigureDoesntOverwriteOtherVariables()
    {
        $turtleService = new TurtleService();
        $turtleService->configure([
            'client' => 'should not be able to set this value',
        ]);

        $this->assertNotEquals($turtleService->client(), 'should not be able to set this value');
    }
}
