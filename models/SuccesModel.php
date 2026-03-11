<?php

namespace App\models;

use App\core\Dbconnect;
use App\entities\Succes;

class SuccesModel extends Dbconnect
{
    // Retourne tous les succès avec leur statut (débloqué ou non) pour un utilisateur
    public function getAllWithStatus(int $userId): array
    {
        $stmt = $this->connection->prepare("
            SELECT s.*,
                   us.unlocked_at
            FROM success s
            LEFT JOIN user_success us
                   ON us.success_id = s.success_id
                  AND us.user_id    = :user_id
            ORDER BY s.success_id
        ");
        $stmt->execute(['user_id' => $userId]);

        $successes = [];
        foreach ($stmt->fetchAll() as $row) {
            $succes = new Succes(
                $row->success_id,
                $row->name,
                $row->description,
                $row->unlock_hint,
                $row->icon
            );
            $succes->setUnlocked($row->unlocked_at !== null);
            $successes[] = $succes;
        }

        return $successes;
    }

    // Déverrouille un succès — retourne true si c'est une nouveauté
    private function unlock(int $userId, int $successId): bool
    {
        $stmt = $this->connection->prepare("
            INSERT IGNORE INTO user_success (user_id, success_id)
            VALUES (:user_id, :success_id)
        ");
        $stmt->execute([
            'user_id'    => $userId,
            'success_id' => $successId,
        ]);
        return $stmt->rowCount() > 0; // 0 si déjà existant (IGNORE)
    }

    // Vérifie et déverrouille les succès après une partie
    // Retourne la liste des succès nouvellement débloqués
    public function checkAndUnlock(int $userId): array
    {
        $newlyUnlocked = [];

        // Helper : tente de débloquer, si nouveau → charge le nom+icône et l'ajoute
        $try = function(int $successId) use ($userId, &$newlyUnlocked) {
            if ($this->unlock($userId, $successId)) {
                $stmt = $this->connection->prepare(
                    "SELECT name, icon FROM success WHERE success_id = :id"
                );
                $stmt->execute(['id' => $successId]);
                $row = $stmt->fetch();
                if ($row) {
                    $newlyUnlocked[] = ['name' => $row->name, 'icon' => $row->icon];
                }
            }
        };

        $countByDiff = fn(string $diff, bool $noHint) =>
            $this->countGames($userId, $diff, $noHint);
        $countTotal = fn() =>
            $this->countGames($userId, null, false);

        // ── 1 partie par difficulté ────────────────────────────────────────
        if ($countByDiff('easy', false) >= 1)   $try(1);
        if ($countByDiff('medium', false) >= 1) $try(2);
        if ($countByDiff('hard', false) >= 1)   $try(3);

        // ── 1 partie sans indice par difficulté ───────────────────────────
        if ($countByDiff('easy', true) >= 1)    $try(4);
        if ($countByDiff('medium', true) >= 1)  $try(5);
        if ($countByDiff('hard', true) >= 1)    $try(6);

        // ── Séries easy sans indice ────────────────────────────────────────
        if ($countByDiff('easy', true) >= 10)   $try(7);
        if ($countByDiff('easy', true) >= 20)   $try(8);
        if ($countByDiff('easy', true) >= 50)   $try(9);

        // ── Séries medium sans indice ──────────────────────────────────────
        if ($countByDiff('medium', true) >= 10) $try(10);
        if ($countByDiff('medium', true) >= 20) $try(11);
        if ($countByDiff('medium', true) >= 50) $try(12);

        // ── Séries hard sans indice ────────────────────────────────────────
        if ($countByDiff('hard', true) >= 10)   $try(13);
        if ($countByDiff('hard', true) >= 20)   $try(14);
        if ($countByDiff('hard', true) >= 50)   $try(15);

        // ── Vitesse (< 90 secondes) par difficulté ─────────────────────────
        if ($this->countFastGames($userId, 'easy', 90) >= 1)   $try(16);
        if ($this->countFastGames($userId, 'medium', 90) >= 1) $try(17);
        if ($this->countFastGames($userId, 'hard', 90) >= 1)   $try(18);

        // ── Total de parties ───────────────────────────────────────────────
        if ($countTotal() >= 100)  $try(19);
        if ($countTotal() >= 500)  $try(20);
        if ($countTotal() >= 1000) $try(21);

        return $newlyUnlocked;
    }

    // Compte les parties terminées (optionnel : par difficulté et/ou sans indice)
    private function countGames(int $userId, ?string $difficulty, bool $noHint): int
    {
        $where = 'g.user_id = :user_id';
        $params = ['user_id' => $userId];

        if ($difficulty !== null) {
            $where .= ' AND gr.difficulty = :difficulty';
            $params['difficulty'] = $difficulty;
        }
        if ($noHint) {
            $where .= ' AND g.nb_indices = 0';
        }

        $join = ($difficulty !== null)
            ? 'JOIN grille gr ON g.grille_id = gr.grille_id'
            : 'JOIN grille gr ON g.grille_id = gr.grille_id';

        $stmt = $this->connection->prepare("
            SELECT COUNT(*) as nb
            FROM game g
            $join
            WHERE $where
        ");
        $stmt->execute($params);
        return (int)$stmt->fetch()->nb;
    }

    // Compte les parties terminées en moins de $maxSeconds secondes pour une difficulté
    private function countFastGames(int $userId, string $difficulty, int $maxSeconds): int
    {
        $stmt = $this->connection->prepare("
            SELECT COUNT(*) as nb
            FROM game g
            JOIN grille gr ON g.grille_id = gr.grille_id
            WHERE g.user_id     = :user_id
              AND gr.difficulty  = :difficulty
              AND g.duration     < :max_duration
        ");
        $stmt->execute([
            'user_id'      => $userId,
            'difficulty'   => $difficulty,
            'max_duration' => $maxSeconds,
        ]);
        return (int)$stmt->fetch()->nb;
    }
}