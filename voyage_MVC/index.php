<?php

use App\Controller\DestinationController;
use App\Model\Destination;

require 'vendor/autoload.php';

// Connexion BDD
require_once __DIR__ . '/confing/dbconect.php';

// Instanciation du modèle et du contrôleur
$destinationModel      = new Destination($db);
$destinationController = new DestinationController($destinationModel);

// Routing
$url      = trim($_SERVER['REQUEST_URI'], '/');
$segments = explode('/', $url);

match (true) {
    $url === '' || $url === 'destination/list'
        => $destinationController->list(),

    $segments[0] === 'destination' && isset($segments[1]) && $segments[1] === 'show' && isset($segments[2])
        => $destinationController->show((int) $segments[2]),

    $url === 'destination/create'
        => $destinationController->create(),

    $segments[0] === 'destination' && isset($segments[1]) && $segments[1] === 'delete' && isset($segments[2])
        => $destinationController->delete((int) $segments[2]),

    default => http_response_code(404) && die('<h1>404 - Page introuvable</h1>'),
};


