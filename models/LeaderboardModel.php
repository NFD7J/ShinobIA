<?php 

namespace App\Models;

use App\entities\Leaderboard;
use App\Core\DbConnect;


class LeaderboardModel extends DbConnect
{
    public function getLeaderboard()
    {
        $sql = "SELECT * FROM leaderboard ORDER BY total_points DESC";
        $result = $this->connection->query($sql);
        $leaderboard = [];
        while ($row = $result->fetch()) {
            $leaderboard[] = new Leaderboard(
                $row->leaderboard_id,
                $row->user_id,
                $row->difficulty,
                $row->total_points,
                $row->rang
            );
        }
        return $leaderboard;
    }


}