<?php
/**
 * Created by PhpStorm.
 * User: Neoson Lam
 * Date: 12/31/2018
 * Time: 11:01 AM.
 */

namespace NeoSon\Mocean\Tests;

use Orchestra\Testbench\TestCase;

class AbstractTesting extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \NeoSon\Mocean\Laravel\MoceanServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Mocean' => \NeoSon\Mocean\Laravel\Facade::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('mocean.mocean.default', 'main');
    }

    public function getClass($class, $property, $object)
    {
        $reflectionClass = new \ReflectionClass($class);
        $refProperty = $reflectionClass->getProperty($property);
        $refProperty->setAccessible(true);

        return $refProperty->getValue($object);
    }
}
