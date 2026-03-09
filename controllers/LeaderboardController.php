<?php 

namespace App\controllers;

use App\Models\LeaderboardModel;

class LeaderboardController extends Controller
{
    public function index()
    {
        $leaderboardModel = new LeaderboardModel();
        $leaderboard = $leaderboardModel->getLeaderboard();
        $this->render("leaderboard/index", ["leaderboard" => $leaderboard]);
    }
}