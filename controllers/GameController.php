<?php

namespace App\controllers;

use App\models\GameModel;
use App\models\GridModel;
use App\models\SuccesModel;
use App\services\BineroService;

class GameController extends Controller
{
    private BineroService $bineroService;

    public function __construct()
    {
        $this->bineroService = new BineroService();
    }

    /**
     * Page de sélection de la difficulté
     */
    public function index()
    {
        $this->render('game/select-difficulty');
    }

    /**
     * Lance une nouvelle partie avec la difficulté sélectionnée
     */
    public function play(array $params = [])
    {
        // Vérifier que l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=auth&action=login');
            exit;
        }

        // Récupérer la difficulté depuis les paramètres GET
        $difficulty = $params['difficulty'] ?? 'easy';

        // Valider la difficulté
        if (!in_array($difficulty, ['easy', 'medium', 'hard'])) {
            $difficulty = 'easy';
        }

        // Appeler l'API pour générer la grille
        $gridData = $this->bineroService->generateGrid($difficulty);

        if (!$gridData) {
            // En cas d'erreur, afficher un message d'erreur
            $this->render('game/error', [
                'error' => 'Erreur lors de la génération de la grille. Veuillez réessayer.'
            ]);
            return;
        }

        // Préparer les données pour la vue
        $data = [
            'difficulty' => $difficulty,
            'grid' => $gridData['grid'] ?? [],
            'solution' => $gridData['solution'] ?? [],
            'size' => $gridData['size'] ?? 6,
            'gridId' => uniqid('grid_') // ID unique pour cette grille
        ];

        // Stocker la grille en session pour validation ultérieure
        $_SESSION['current_game'] = [
            'grid' => $data['grid'],
            'solution' => $data['solution'],
            'difficulty' => $difficulty,
            'startTime' => time(),
            'gridId' => $data['gridId']
        ];

        $this->render('game/index', $data);
    }

    /**
     * Obtient un indice pour la grille actuelle
     */
    public function hint(array $params = [])
    {
        header('Content-Type: application/json');

        // Vérifier que l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Non authentifié']);
            return;
        }

        // Vérifier qu'une partie est en cours
        if (!isset($_SESSION['current_game'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Aucune partie en cours']);
            return;
        }

        $difficulty = $_SESSION['current_game']['difficulty'] ?? 'easy';
        $grid = $_POST['grid'] ?? $_SESSION['current_game']['grid'] ?? [];

        // Appeler l'API pour générer un indice
        $hintData = $this->bineroService->generateHint($grid, $difficulty);

        if (!$hintData) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur lors de la génération de l\'indice']);
            return;
        }

        echo json_encode($hintData);
    }

    /**
     * Génère un feedback du joueur
     */
    public function feedback(array $params = [])
    {
        header('Content-Type: application/json');

        // Vérifier que l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Non authentifié']);
            return;
        }

        // Vérifier qu'une partie est en cours
        if (!isset($_SESSION['current_game'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Aucune partie en cours']);
            return;
        }

        // Récupérer les données POST
        $input = json_decode(file_get_contents('php://input'), true);

        $difficulty = $input['difficulty'] ?? $_SESSION['current_game']['difficulty'] ?? 'easy';
        $timeElapsed = $input['timeElapsed'] ?? 0;
        $errors = $input['errors'] ?? 0;
        $hintsUsed = $input['hintsUsed'] ?? 0;
        $progress = $input['progress'] ?? 0;

        // Appeler l'API pour générer un feedback
        $feedbackData = $this->bineroService->generatePlayerFeedback(
            $difficulty,
            $timeElapsed,
            $errors,
            $hintsUsed,
            $progress
        );

        if (!$feedbackData) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur lors de la génération du feedback']);
            return;
        }

        echo json_encode($feedbackData);
    }

    /**
     * Teste la connexion à l'API (endpoint diagnostic)
     */
    public function testApi(array $params = [])
    {
        header('Content-Type: application/json');

        $testResult = $this->bineroService->testApiConnection();

        echo json_encode($testResult);
    }

    public function save(): void
    {
        header('Content-Type: application/json');

        if (!isset($_SESSION['user']) || !isset($_SESSION['current_game'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Session invalide']);
            return;
        }

        $input       = json_decode(file_get_contents('php://input'), true);
        $hintsUsed   = (int)($input['hintsUsed']   ?? 0);
        $timeElapsed = (int)($input['timeElapsed']  ?? 0);
        $difficulty  = $_SESSION['current_game']['difficulty'];
        $userId      = (int)$_SESSION['user']['id'];

        // 1. Sauvegarder la grille dans la table `grille`
        $gridModel = new GridModel();
        $grilleId  = $gridModel->save($difficulty);

        // 2. Sauvegarder la partie dans la table `game`
        $gameModel = new GameModel();
        $gameModel->save(
            userId:    $userId,
            grilleId:  $grilleId,
            duration:  $timeElapsed,
            nbIndices: $hintsUsed,
            points:    $this->calcPoints($difficulty, $timeElapsed, $hintsUsed)
        );

        // 3. Vérifier et débloquer les succès
        $succesModel = new SuccesModel();
        $newSuccesses = $succesModel->checkAndUnlock($userId);

        unset($_SESSION['current_game']);
        echo json_encode([
            'success'      => true,
            'newSuccesses' => $newSuccesses,
        ]);
    }

private function calcPoints(string $difficulty, int $duration, int $hints): int
{
    $base = match($difficulty) { 'easy' => 100, 'medium' => 200, 'hard' => 400, default => 100 };
    $penalty = $hints * 10 + (int)($duration / 30) * 5;
    return max(0, $base - $penalty);
}
}
