<?php 

namespace App\Models;

use App\entities\Leaderboard;
use App\Core\DbConnect;


class LeaderboardModel extends DbConnect
{


    public function getLeaderboard()
    {
    $sql = "SELECT l.*, u.name AS username 
            FROM leaderboard l
            JOIN user u ON l.user_id = u.user_id
            ORDER BY l.total_points DESC";
    $result = $this->connection->query($sql);
    $leaderboard = [];
    while ($row = $result->fetch()) {
        $leaderboard[] = new Leaderboard(
            $row->leaderboard_id,
            $row->user_id,
            $row->username,
            $row->difficulty,
            $row->total_points,
            $row->rang
        );
    }
    return $leaderboard;
}}