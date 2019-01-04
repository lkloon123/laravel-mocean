<?php
/**
 * Created by PhpStorm.
 * User: Neoson Lam
 * Date: 12/31/2018
 * Time: 11:29 AM.
 */

namespace NeoSon\Mocean\Tests;

class TestNoConfiguration extends AbstractTesting
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('mocean.accounts.main.MOCEAN_API_KEY', '');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage MOCEAN_API_KEY is not configured
     */
    public function testExceptionRaisedIfSettingNotConfigured()
    {
        app('mocean')->getMocean();
    }
}
