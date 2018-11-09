<?php

use Slim\App;
use Slim\Http\Request;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Http\Response;
use Slim\Exception\NotFoundException;
use Slim\Http\Environment;

$app = new \Slim\App;

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

//Sample test with request SQL

$app->get('/api/testdb', function (Request $request, Response $response, array $args){

    $sql = "select * from users";

    try{
        $db = new db();
        $db = $db->getDB();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();

        return json_encode(array('status' => 'Sucess!', "result:" => $result),JSON_UNESCAPED_UNICODE,200);

        

    } catch(PDOException $e){
        return '{"error": {"text": '.$e->getMessage().'}';
        $this->logger->addInfo('{"error": {"text": '.$e->getMessage().'}');
    }
});

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

// Catch-all route to serve a 404 Not Found page if none of the routes match
// NOTE: make sure this route is defined last
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->errorHandler; 
    return $handler($req, $res);
});


