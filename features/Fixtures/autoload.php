<?php
/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 29/10/17
 * Time: 00:28
 */

use Doctrine\Common\Annotations\AnnotationRegistry;

if (!file_exists($file = __DIR__.'/../../vendor/autoload.php')) {
    throw new \RuntimeException('Install the dependencies to run the test suite. DIR ' . __DIR__);
}

$loader = require $file;
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));