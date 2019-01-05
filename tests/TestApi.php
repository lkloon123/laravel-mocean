<?php
/**
 * Created by PhpStorm.
 * User: Neoson Lam
 * Date: 12/31/2018
 * Time: 11:50 AM.
 */

namespace NeoSon\Mocean\Tests;

class TestApi extends AbstractTesting
{
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app['config']->set('mocean.mocean.accounts.main', [
            'MOCEAN_API_KEY'     => 'test_api_key',
            'MOCEAN_API_SECRET'  => 'test_api_secret',
            'MOCEAN_RESP_FORMAT' => 'json',
        ]);

        $app['config']->set('mocean.mocean.accounts.backup', [
            'MOCEAN_API_KEY'     => 'test_backup_api_key',
            'MOCEAN_API_SECRET'  => 'test_backup_api_secret',
            'MOCEAN_RESP_FORMAT' => 'json',
        ]);
    }

    public function testBasicCredentialCreatedObject()
    {
        $mocean = app('mocean');
        $crendentialObject = $this->getClass(\Mocean\Client::class, 'credentials', $mocean->getMocean());
        $crendentialData = $this->getClass(\Mocean\Client\Credentials\Basic::class, 'credentials', $crendentialObject);

        $this->assertInstanceOf(\Mocean\Client\Credentials\Basic::class, $crendentialObject);
        $this->assertEquals(['mocean-api-key' => 'test_api_key', 'mocean-api-secret' => 'test_api_secret'], $crendentialData);
    }

    public function testUsingDifferentAccount()
    {
        $mocean = app('mocean');
        $crendentialObject = $this->getClass(\Mocean\Client::class, 'credentials', $mocean->using('backup')->getMocean());
        $crendentialData = $this->getClass(\Mocean\Client\Credentials\Basic::class, 'credentials', $crendentialObject);

        $this->assertInstanceOf(\Mocean\Client\Credentials\Basic::class, $crendentialObject);
        $this->assertEquals(['mocean-api-key' => 'test_backup_api_key', 'mocean-api-secret' => 'test_backup_api_secret'], $crendentialData);
    }

    public function testUsingBasicCrendetialAccount()
    {
        $mocean = app('mocean');
        $basicCrendentials = new \Mocean\Client\Credentials\Basic('test_basic_key', 'test_basic_secret');

        $crendentialObject = $this->getClass(\Mocean\Client::class, 'credentials', $mocean->using($basicCrendentials)->getMocean());
        $crendentialData = $this->getClass(\Mocean\Client\Credentials\Basic::class, 'credentials', $crendentialObject);

        $this->assertInstanceOf(\Mocean\Client\Credentials\Basic::class, $crendentialObject);
        $this->assertEquals(['mocean-api-key' => 'test_basic_key', 'mocean-api-secret' => 'test_basic_secret'], $crendentialData);
    }

    public function testUsingArrayAccount()
    {
        $mocean = app('mocean');
        $crendentials = [
            'MOCEAN_API_KEY'    => 'test_array_key',
            'MOCEAN_API_SECRET' => 'test_array_secret',
        ];

        $crendentialObject = $this->getClass(\Mocean\Client::class, 'credentials', $mocean->using($crendentials)->getMocean());
        $crendentialData = $this->getClass(\Mocean\Client\Credentials\Basic::class, 'credentials', $crendentialObject);

        $this->assertInstanceOf(\Mocean\Client\Credentials\Basic::class, $crendentialObject);
        $this->assertEquals(['mocean-api-key' => 'test_array_key', 'mocean-api-secret' => 'test_array_secret'], $crendentialData);
    }
}
