<?php
/**
 * Created by PhpStorm.
 * User: Neoson Lam
 * Date: 12/31/2018
 * Time: 11:18 AM.
 */

namespace NeoSon\Mocean\Tests;

use Mocean;

class TestServiceProvider extends AbstractTesting
{
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app['config']->set('mocean.mocean.accounts.main', [
            'MOCEAN_API_KEY'    => 'test_api_key',
            'MOCEAN_API_SECRET' => 'test_api_secret',
            'MOCEAN_FROM'       => 'test_from',
        ]);
    }

    public function testWhetherMoceanAbleResolveFromContainer()
    {
        $mocean = app('mocean');
        $this->assertInstanceOf(\NeoSon\Mocean\Manager::class, $mocean);
    }

    public function testFacadeFunction()
    {
        $sdk = Mocean::getMocean();
        $this->assertInstanceOf(Mocean\Client::class, $sdk);
    }
}
