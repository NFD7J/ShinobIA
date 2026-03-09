<?php 

// Leaderboard.php : Entité représentant un classement des parties du binairo
namespace App\entities;

class Leaderboard
{
    private ?int $id ;
    private int $userId;
    private string $difficulty;
    private int $totalPoints;
    private int $rank;
    

    public function __construct(?int $id, int $userId, string $difficulty, int $totalPoints, int $rank)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->difficulty = $difficulty;
        $this->totalPoints = $totalPoints;
        $this->rank = $rank;
    }

    // Getters  pour chaque propriété
    public function getId()
    {
    return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getDifficulty()
    {
        return $this->difficulty;
    }

    public function getTotalPoints()
    {
        return $this->totalPoints;
    }

    public function getRank()
    {
        return $this->rank;
    }


    // Setters pour chaque propriété
    public function setId(?int $id)
    {
        $this->id = $id;
    }

    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    public function setDifficulty(string $difficulty)
    {
        $this->difficulty = $difficulty;
    }

    public function setTotalPoints(int $totalPoints)
    {
        $this->totalPoints = $totalPoints;
    }

    public function setRank(int $rank)
    {
        $this->rank = $rank;
    }

}
