<?php 

namespace App\Models;

use App\entities\Leaderboard;
use App\Core\DbConnect;


class LeaderboardModel extends DbConnect
{

    public function index()
    {
        // Recuperation de toutes les parties pour les afficher dans le classement
        $leaderboard = $this->getLeaderboard();


    }


    public function getLeaderboard()
    {
    $sql = "SELECT l.*, u.name AS username 
            FROM leaderboard l
            JOIN user u ON l.user_id = u.user_id
            ORDER BY l.total_points ASC";
    $result = $this->connection->query($sql);
    $leaderboard = [];
    while ($row = $result->fetch()) {
        $leaderboard[] = new Leaderboard(
            $row->leaderboard_id,
            $row->user_id,
            $row->username,
            $row->difficulty,
            $row->total_points,
            $row->rang ?? 0
        );
    }
    return $leaderboard;
    }

    public function addEntry($userId, $difficulty, $totalPoints)
    {
        // Récupérer le rang actuel pour la difficulté
        $sql = "SELECT MAX(rang) AS max_rang FROM leaderboard WHERE difficulty = :difficulty";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['difficulty' => $difficulty]);
        $result = $stmt->fetch();
        $maxRang = $result->max_rang ?? 0;
        $newRang = $maxRang + 1;

        // Insérer la nouvelle entrée
        $sql = "INSERT INTO leaderboard (user_id, difficulty, total_points, rang) 
                VALUES (:user_id, :difficulty, :total_points, :rang)";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([
            'user_id' => $userId,
            'difficulty' => $difficulty,
            'total_points' => $totalPoints,
            'rang' => $newRang
        ]);
    }

    public function getlastGameEntry($userId, $difficulty)
    {
        $sql = "SELECT * FROM leaderboard 
                JOIN user u ON leaderboard.user_id = u.user_id
                WHERE leaderboard.user_id = :user_id AND leaderboard.difficulty = :difficulty 
                ORDER BY leaderboard.leaderboard_id DESC LIMIT 1";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            'user_id' => $userId,
            'difficulty' => $difficulty
        ]);
        $row = $stmt->fetch();
        if ($row) {
            return new Leaderboard(
                $row->leaderboard_id,
                $row->user_id,
                $row->name,
                $row->difficulty,
                $row->total_points,
                $row->rang
            );
        }
        return null;
    }

    public function calculTimer($startTime, $endTime)

    // Calcul du temps écoulé en secondes
    {
        $elapsedTime = ($endTime - $startTime) / 1000; // Convertir de millisecondes à secondes
        return max(0, round($elapsedTime)); // Arrondir et s'assurer que le temps ne soit pas négatif
    }

    // Calcul du temps des erreurs et des indices utilisés en fonction de la difficulté
    public function calculPenality($difficulty, $errors, $hints)
    {
        $penality = 0;
        switch ($difficulty) {
            case 'easy':
                $penality = ($errors * 5) + ($hints * 30);
                break;
            case 'medium':
                $penality = ($errors * 5) + ($hints * 20);
                break;
            case 'hard':
                $penality = ($errors * 5) + ($hints * 10);
                break;
        }
        return $penality;
    }

    public function calculFinalTime($elapsedTime, $penality)
    {
        return $elapsedTime + $penality;
    }

    // Limiter l'affichage du classement à un nombre maximum d'entrées par difficulté (ici 10)
    public function maxRecordsPerDifficulty($difficulty)
    {
        $sql = "SELECT COUNT(*) AS count FROM leaderboard WHERE difficulty = :difficulty";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['difficulty' => $difficulty]);
        $result = $stmt->fetch();
        return $result->count >= 10;
    }

}