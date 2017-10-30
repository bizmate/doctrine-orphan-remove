<?php

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;


class AppKernel extends Kernel
{
    use MicroKernelTrait;

    /**
     * @return array
     */
    public function registerBundles()
    {
        return array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new App\TestBundle\AppTestBundle()
        );
    }


    /**
     * @return string
     */
    public function getCacheDir()
    {
        return sys_get_temp_dir().'/AppTest/cache';
    }

    /**
     * @return string
     */
    public function getLogDir()
    {
        return sys_get_temp_dir().'/AppTest/logs';
    }

    /**
     * @param RouteCollectionBuilder $routes
     */
    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        //$routes->import('@AppTest/Controller/', '/', 'annotation');
    }

    /**
     * @param ContainerBuilder $c
     * @param LoaderInterface  $loader
     */
    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', [
            'secret' => 'my$ecret',
            'test' => null,
            'profiler' => [
                'collect' => false,
            ],
        ]);
        $c->loadFromExtension('doctrine', [
            'dbal' => [
                'driver' => 'pdo_mysql',
                'host' => 'db',
                'dbname' => 'app_test',
                'user'  => 'root',
                'password' => 'example'
            ],
            'orm' => [
                'naming_strategy' => 'doctrine.orm.naming_strategy.underscore',
                'auto_mapping' => true,
                'mappings' => [
                    'AppTestBundle' => [
                        'type' => 'yml'
                    ]
                ]
            ]
        ]);
    }
}
