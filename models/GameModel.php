<?php

namespace App\models;

use App\core\Dbconnect;

class GameModel extends Dbconnect
{
    public function save(
        int $userId,
        int $grilleId,
        int $duration,
        int $nbIndices,
        int $nbErrors,
        int $points
    ): void {
        $stmt = $this->connection->prepare("
            INSERT INTO game (time_start, time_end, duration, nb_indices, nb_errors, points, grille_id, user_id)
            VALUES (:time_start, :time_end, :duration, :nb_indices, :nb_errors, :points, :grille_id, :user_id)
        ");
        $stmt->execute([
            'time_start' => date('Y-m-d H:i:s', time() - $duration),
            'time_end'   => date('Y-m-d H:i:s'),
            'duration'   => $duration,
            'nb_indices' => $nbIndices,
            'nb_errors'  => $nbErrors,
            'points'     => $points,
            'grille_id'  => $grilleId,
            'user_id'    => $userId,
        ]);
    }
}
