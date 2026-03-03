<?php

namespace App\Model;

use PDO;

class Destination
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Récupère toutes les destinations
    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM destinations ORDER BY pays ASC');
        return $stmt->fetchAll();
    }

    // Récupère une destination par son id
    public function find(int $id): array|false
    {
        $stmt = $this->db->prepare('SELECT * FROM destinations WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
    
    public function create(string $nom, string $pays, string $description): bool
    {
        $stmt = $this->db->prepare("INSERT INTO destinations (nom, pays, description) VALUES (?, ?, ?)");
        return $stmt->execute([$nom, $pays, $description]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM destinations WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
