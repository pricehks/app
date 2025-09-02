<?php
require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->get('/hello', function (Request $request, Response $response) {
    $response->getBody()->write(json_encode(['message' => 'Hola desde PHP + Composer']));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
