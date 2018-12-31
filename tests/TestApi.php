<?php
/**
 * Created by PhpStorm.
 * User: Neoson Lam
 * Date: 12/31/2018
 * Time: 11:50 AM
 */

namespace NeoSon\Mocean\Tests;

class TestApi extends AbstractTesting
{
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app['config']->set('mocean.mocean.accounts.main', [
            'MOCEAN_API_KEY' => 'test_api_key',
            'MOCEAN_API_SECRET' => 'test_api_secret',
            'MOCEAN_FROM' => 'test_from',
        ]);

        $app['config']->set('mocean.mocean.accounts.backup', [
            'MOCEAN_API_KEY' => 'test_backup_api_key',
            'MOCEAN_API_SECRET' => 'test_backup_api_secret',
            'MOCEAN_FROM' => 'test_backup_from',
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
}
