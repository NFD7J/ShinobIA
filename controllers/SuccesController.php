<?php

namespace App\controllers;

use App\models\SuccesModel;

class SuccesController extends Controller
{
    public function index(): void
    {
        if (!isset($_SESSION['user'])) {
            header('location: index.php?controller=auth&action=login');
            exit();
        }

        $succesModel = new SuccesModel();
        $successes   = $succesModel->getAllWithStatus($_SESSION['user']['id']);

        $this->render('succes/index', [
            'title'    => 'Mes Succès',
            'successes' => $successes,
        ]);
    }
}