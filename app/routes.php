<?php

$app->get('/', function () use ($app) {
    $users = $app['dao.user']->findAll();
    return $app['twig']->render('index.html.twig', array('users' => $users));
})->bind('home');

$app->get('/connect/{username}', function ($username) use ($app) {
    $user = $app['dao.user']->findByUserName($username);
    $isHere = $user->isHere();
    $user->setHere(!$isHere);
    $app['dao.user']->updateUser($user);
    return '{"error": "OK", "code" : "200"}';
    //return '{"error": "invalidData", "code" : "401"}';
});

$app->get('/connected', function() use ($app) {
    $users = $app['dao.user']->getConnectedUser();
    return json_encode($users);
});