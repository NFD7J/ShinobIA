<?php

namespace App\services;

class BineroService
{
    // URL de base de l'API Spring
    private string $apiBaseUrl = 'http://localhost:8080/api/binero';
    private string $logFile;

    public function __construct()
    {
        // Créer un fichier de log pour déboguer
        $this->logFile = dirname(__DIR__) . '/logs/api_calls.log';
        if (!is_dir(dirname($this->logFile))) {
            @mkdir(dirname($this->logFile), 0755, true);
        }
    }

    /**
     * Génère une grille selon la difficulté
     * 
     * @param string $difficulty 'easy', 'medium' ou 'hard'
     * @return array|false La réponse de l'API ou false en cas d'erreur
     */
    public function generateGrid(string $difficulty)
    {
        return $this->makeRequest(
            $this->apiBaseUrl . '/generate-grid',
            ['difficulty' => $difficulty]
        );
    }

    /**
     * Génère un indice basé sur l'état de la grille
     * 
     * @param array $grid L'état actuel de la grille au format Integer[][]
     * @param string $difficulty Le niveau de difficulté ('easy', 'medium', 'hard')
     * @return array|false La réponse de l'API au format ['hint' => '...'] ou false en cas d'erreur
     */
    public function generateHint(array $grid, string $difficulty)
    {
        return $this->makeRequest(
            $this->apiBaseUrl . '/generate-hint',
            [
                'grid' => $grid,
                'difficulty' => $difficulty
            ]
        );
    }

    /**
     * Génère un feedback du joueur
     * 
     * @param string $difficulty
     * @param int $timeElapsed Temps écoulé en secondes
     * @param int $errors Nombre d'erreurs
     * @param int $hintsUsed Nombre d'indices utilisés
     * @param int $progress Progression en pourcentage
     * @return array|false La réponse de l'API ou false en cas d'erreur
     */
    public function generatePlayerFeedback(
        string $difficulty,
        int $timeElapsed,
        int $errors,
        int $hintsUsed,
        int $progress
    ) {
        return $this->makeRequest(
            $this->apiBaseUrl . '/player-feedback',
            [
                'difficulty' => $difficulty,
                'timeElapsed' => $timeElapsed,
                'errors' => $errors,
                'hintsUsed' => $hintsUsed,
                'progress' => $progress
            ]
        );
    }

    /**
     * Effectue une requête POST à l'API
     * 
     * @param string $endpoint L'endpoint complet
     * @param array $data Les données à envoyer
     * @return array|false La réponse décodée ou false en cas d'erreur
     */
    private function makeRequest(string $endpoint, array $data)
    {
        try {
            $this->log("=== APPEL API ===");
            $this->log("Endpoint: {$endpoint}");
            $this->log("Data: " . json_encode($data));

            $ch = curl_init();

            curl_setopt_array($ch, [
                CURLOPT_URL => $endpoint,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Accept: application/json'
                ]
            ]);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            $curlError = curl_errno($ch);
            curl_close($ch);

            $this->log("HTTP Code: {$httpCode}");
            $this->log("cURL Error Code: {$curlError}");
            $this->log("Response: {$response}");

            // Vérifier les erreurs cURL
            if ($error) {
                $this->log("❌ ERROR - cURL Error: {$error}");
                return false;
            }

            // Vérifier le code HTTP
            if ($httpCode !== 200) {
                $this->log("❌ ERROR - HTTP Error {$httpCode}: {$response}");
                return false;
            }

            // Décoder la réponse JSON
            $decoded = json_decode($response, true);

            if ($decoded === null) {
                $this->log("❌ ERROR - Invalid JSON: {$response}");
                return false;
            }

            $this->log("✅ Succès! Données reçues: " . json_encode($decoded));
            return $decoded;
        } catch (\Exception $e) {
            $this->log("❌ ERROR - Exception: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Enregistre un message dans le fichier de log
     */
    private function log(string $message)
    {
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[{$timestamp}] {$message}\n";
        @file_put_contents($this->logFile, $logMessage, FILE_APPEND);
    }

    /**
     * Teste la connexion à l'API
     * 
     * @return array Status et infos de diagnostic
     */
    public function testApiConnection(): array
    {
        $this->log("\n========== TEST CONNEXION API ==========");
        $this->log("URL de base: {$this->apiBaseUrl}");

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->apiBaseUrl . '/generate-grid',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode(['difficulty' => 'easy']),
            CURLOPT_HTTPHEADER => ['Content-Type: application/json']
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        $this->log("HTTP Response Code: {$httpCode}");
        if ($error) {
            $this->log("cURL Error: {$error}");
        }

        return [
            'isConnected' => ($httpCode === 200 && !$error),
            'httpCode' => $httpCode,
            'error' => $error ?: null,
            'apiUrl' => $this->apiBaseUrl,
            'connectTime' => $info['connect_time'] ?? null,
            'totalTime' => $info['total_time'] ?? null
        ];
    }
}
