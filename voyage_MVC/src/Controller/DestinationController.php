<?php

namespace App\Controller;

use App\Model\Destination;

class DestinationController
{
    private Destination $destination;

    public function __construct(Destination $destination)
    {
        $this->destination = $destination;
    }

    // Action : afficher la liste des destinations
    public function list(): void
    {
        $destinations = $this->destination->findAll();

        require_once __DIR__ . '/../views/layout/header.php';
        require_once __DIR__ . '/../views/destination/list.php';
        require_once __DIR__ . '/../views/layout/footer.php';
    }

    // Action : afficher le détail d'une destination
    public function show(int $id): void
    {
        $destination = $this->destination->find($id);

        if ($destination === false) {
            http_response_code(404);
            die('<h1>404 - Page introuvable</h1>');
        }

        require_once __DIR__ . '/../views/layout/header.php';
        require_once __DIR__ . '/../views/destination/show.php';
        require_once __DIR__ . '/../views/layout/footer.php';
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom         = htmlspecialchars(trim($_POST['nom'] ?? ''));
            $pays        = htmlspecialchars(trim($_POST['pays'] ?? ''));
            $description = htmlspecialchars(trim($_POST['description'] ?? ''));

            if ($nom && $pays && $description) {
                $this->destination->create($nom, $pays, $description);
            }
            header('Location: /destination/list');
            exit;
        }

        require_once __DIR__ . '/../views/layout/header.php';
        require_once __DIR__ . '/../views/destination/create.php';
        require_once __DIR__ . '/../views/layout/footer.php';
    }

    public function delete(int $id): void
    {
        $this->destination->delete($id);
        header('Location: /destination/list');
        exit;
    }
}