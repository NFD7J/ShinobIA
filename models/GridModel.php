<?php

namespace App\models;

use App\core\Dbconnect;

class GridModel extends Dbconnect
{
    // Insère une grille en BDD et retourne son ID
    public function save(string $difficulty): int
    {
        $stmt = $this->connection->prepare(
            "INSERT INTO grille (difficulty) VALUES (:difficulty)"
        );
        $stmt->execute(['difficulty' => $difficulty]);

        return (int)$this->connection->lastInsertId();
    }
}
