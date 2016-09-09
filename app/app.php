<?php
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ExceptionHandler::register();

$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__ . '/../views',));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app['db.options'] = array(
    'driver' => 'pdo_mysql',
    'charset' => 'utf8',
    'host' => 'localhost',
    'port' => '3306',
    'dbname' => 'NFC',
    'user' => 'root',
    'password' => '',
);

$app['dao.user'] = $app->share(function ($app) {
    return new NFC\DAO\UserDAO($app['db']);
});
