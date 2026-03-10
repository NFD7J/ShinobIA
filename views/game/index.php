<div class="py-4" style="min-height: 100vh; background: linear-gradient(135deg, #ecf0f1, #bdc3c7);">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h2 class="fw-bold">
                    <i class="bi bi-controller"></i>
                    Partie - Niveau
                    <span class="badge bg-<?php
                                            echo match ($difficulty) {
                                                'easy' => 'success',
                                                'medium' => 'warning',
                                                'hard' => 'danger',
                                                default => 'secondary'
                                            };
                                            ?>">
                        <?php
                        echo match ($difficulty) {
                            'easy' => 'FACILE',
                            'medium' => 'MOYEN',
                            'hard' => 'DIFFICILE',
                            default => $difficulty
                        };
                        ?>
                    </span>
                </h2>
            </div>
            <div class="col-md-4 text-end">
                <a href="index.php?controller=game" class="btn btn-secondary btn-sm">
                    <i class="bi bi-house"></i> Retour aux niveaux
                </a>
            </div>
        </div>

        <div class="row g-4">
            <!-- Grille principale -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Grille Binero</h5>

                        <div class="table-responsive">
                            <table class="table table-bordered text-center mb-0" id="bineroGrid">
                                <tbody>
                                    <?php for ($i = 0; $i < count($grid); $i++): ?>
                                        <tr>
                                            <?php for ($j = 0; $j < count($grid[$i]); $j++): ?>
                                                <td class="p-2" style="min-width: 45px; min-height: 45px;">
                                                    <input type="button"
                                                        class="btn btn-sm cell-btn"
                                                        id="cell_<?php echo $i; ?>_<?php echo $j; ?>"
                                                        value="<?php
                                                                $val = $grid[$i][$j];
                                                                echo ($val === null || $val === '') ? '' : ($val == 1 ? '1' : '0');
                                                                ?>"
                                                        data-row="<?php echo $i; ?>"
                                                        data-col="<?php echo $j; ?>"
                                                        data-value="<?php
                                                                    $val = $grid[$i][$j];
                                                                    echo ($val === null || $val === '') ? '' : ($val == 1 ? '1' : '0');
                                                                    ?>"
                                                        style="width: 100%; height: 100%; font-weight: bold; cursor: pointer;
                                                                  background-color: <?php
                                                                                    $val = $grid[$i][$j];
                                                                                    if ($val === null || $val === '') {
                                                                                        echo '#fff';
                                                                                    } else {
                                                                                        echo '#e3f2fd';
                                                                                    }
                                                                                    ?>;">
                                                    </input>
                                                </td>
                                            <?php endfor; ?>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4 text-muted small">
                            <p>💡 Cliquez sur une case pour entrer 0 ou 1. Cliquez à nouveau pour effacer.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panneau de contrôle -->
            <div class="col-lg-4">
                <!-- Chronomètre et stats -->
                <div class="card border-0 shadow-lg mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="bi bi-stopwatch"></i> Statistiques
                        </h5>

                        <div class="mb-4 p-3 bg-light rounded text-center">
                            <small class="text-muted d-block mb-2">Temps écoulé</small>
                            <h3 id="timer" class="fw-bold mb-0">00:00</h3>
                        </div>

                        <div class="row g-3">
                            <div class="col-6">
                                <div class="p-3 bg-danger bg-opacity-10 rounded text-center">
                                    <small class="text-muted d-block">Erreurs</small>
                                    <h4 id="errors" class="fw-bold mb-0">0</h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 bg-success bg-opacity-10 rounded text-center">
                                    <small class="text-muted d-block">Progrès</small>
                                    <h4 id="progress" class="fw-bold mb-0">0%</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="card border-0 shadow-lg mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Actions</h5>

                        <button class="btn btn-primary w-100 mb-3" id="hintBtn">
                            <i class="bi bi-lightbulb"></i> Obtenir un indice
                        </button>

                        <button class="btn btn-success w-100 mb-3" id="submitBtn">
                            <i class="bi bi-check-circle"></i> Valider la solution
                        </button>

                        <button class="btn btn-outline-secondary w-100">
                            <i class="bi bi-arrow-counterclockwise"></i> Nouvelle partie
                        </button>

                        <button class="btn btn-outline-info w-100 mt-3 btn-sm" id="testApiBtn">
                            <i class="bi bi-bug"></i> Tester l'API
                        </button>
                    </div>
                </div>

                <!-- Indice affiché -->
                <div class="card border-0 shadow-lg d-none" id="hintCard">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <h5 class="card-title mb-0">💡 Indice</h5>
                            <button type="button" class="btn-close" id="closeHintBtn"></button>
                        </div>
                        <p id="hintText" class="mt-3 mb-0 text-muted"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Données du jeu
    const gridData = <?php echo json_encode($grid); ?>;
    const solutionData = <?php echo json_encode($solution); ?>;
    const difficulty = '<?php echo $difficulty; ?>';
    const gridSize = <?php echo $size; ?>;

    let playerGrid = JSON.parse(JSON.stringify(gridData));
    let startTime = Date.now();
    let errors = 0;
    let hintsUsed = 0;

    // Initialiser les cellules
    document.querySelectorAll('.cell-btn').forEach(cell => {
        cell.addEventListener('click', handleCellClick);
    });

    function handleCellClick(e) {
        const button = e.target;
        const row = parseInt(button.dataset.row);
        const col = parseInt(button.dataset.col);
        let currentValue = button.value;

        // Cycle: vide -> 0 -> 1 -> vide
        let nextValue = '';
        if (currentValue === '') {
            nextValue = '0';
        } else if (currentValue === '0') {
            nextValue = '1';
        }

        // Mettre à jour le bouton et les données
        button.value = nextValue;
        playerGrid[row][col] = nextValue === '' ? null : (nextValue === '0' ? 0 : 1);

        // Changer la couleur
        if (nextValue === '') {
            button.style.backgroundColor = '#fff';
            button.style.color = '#000';
        } else {
            button.style.backgroundColor = '#e3f2fd';
            button.style.color = '#1976d2';
        }

        updateProgress();
    }

    // Bouton indice
    document.getElementById('hintBtn').addEventListener('click', async function() {
        if (!confirm('Utiliser un indice? (cela ne pénalise pas votre score)')) return;

        const response = await fetch('index.php?controller=game&action=hint', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                grid: playerGrid,
                difficulty: difficulty
            })
        });

        const data = await response.json();
        if (data.hint) {
            document.getElementById('hintText').textContent = data.hint;
            document.getElementById('hintCard').classList.remove('d-none');
            hintsUsed++;
        }
    });

    // Fermer la carte d'indice
    document.getElementById('closeHintBtn').addEventListener('click', function() {
        document.getElementById('hintCard').classList.add('d-none');
    });

    // Test API
    document.getElementById('testApiBtn').addEventListener('click', async function() {
        const response = await fetch('index.php?controller=game&action=testApi');
        const data = await response.json();

        let message = '📡 Test de connexion API:\n\n';
        message += '✓ URL: ' + data.apiUrl + '\n';
        message += '✓ HTTP Code: ' + data.httpCode + '\n';

        if (data.isConnected) {
            message += '\n✅ L\'API est CONNECTÉE et réactive!\n';
            message += '⏱️ Temps de connexion: ' + (data.connectTime * 1000).toFixed(2) + 'ms\n';
            message += '⏱️ Temps total: ' + (data.totalTime * 1000).toFixed(2) + 'ms';
        } else {
            message += '\n❌ L\'API n\'est PAS joignable!\n';
            if (data.error) {
                message += '🔴 Erreur: ' + data.error;
            }
        }

        alert(message);
    });

    // Bouton soumettre
    document.getElementById('submitBtn').addEventListener('click', function() {
        checkSolution();
    });

    // Mettre à jour la progression
    function updateProgress() {
        let filledCells = 0;
        playerGrid.forEach(row => {
            row.forEach(cell => {
                if (cell !== null && cell !== '') filledCells++;
            });
        });

        const totalCells = gridSize * gridSize;
        const progressPercent = Math.round((filledCells / totalCells) * 100);
        document.getElementById('progress').textContent = progressPercent + '%';
    }

    // Vérifier la solution
    function checkSolution() {
        let isCorrect = true;

        // Comparer avec la solution
        for (let i = 0; i < gridSize; i++) {
            for (let j = 0; j < gridSize; j++) {
                if (playerGrid[i][j] !== solutionData[i][j]) {
                    isCorrect = false;
                    errors++;

                    // Mettre en rouge la cellule incorrecte
                    const cell = document.getElementById('cell_' + i + '_' + j);
                    if (cell) {
                        cell.style.backgroundColor = '#ffebee';
                        cell.style.animation = 'shake 0.3s';
                        setTimeout(() => {
                            cell.style.animation = '';
                        }, 300);
                    }
                }
            }
        }

        document.getElementById('errors').textContent = errors;

        if (isCorrect) {
            // Envoyer le feedback
            const timeElapsed = Math.floor((Date.now() - startTime) / 1000);
            sendFeedback(timeElapsed);

            alert('🎉 Bravo! Vous avez résolu la grille!\n\nTemps: ' + formatTime(timeElapsed) + '\nErreurs: ' + errors + '\nIndices utilisés: ' + hintsUsed);
        } else {
            alert('❌ La solution n\'est pas correcte. Vérifiez les cellules surlignées en rouge.');
        }
    }

    // Envoyer le feedback
    async function sendFeedback(timeElapsed) {
        const response = await fetch('index.php?controller=game&action=feedback', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                difficulty: difficulty,
                timeElapsed: timeElapsed,
                errors: errors,
                hintsUsed: hintsUsed,
                progress: 100
            })
        });

        const data = await response.json();
        if (data.comment) {
            console.log('Feedback: ' + data.comment);
        }
    }

    // Chronomètre
    setInterval(function() {
        const elapsed = Math.floor((Date.now() - startTime) / 1000);
        document.getElementById('timer').textContent = formatTime(elapsed);
    }, 1000);

    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = seconds % 60;
        return (mins < 10 ? '0' : '') + mins + ':' + (secs < 10 ? '0' : '') + secs;
    }

    // Animation shake
    const style = document.createElement('style');
    style.textContent = `
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 90% { transform: translateX(-5px); }
        20%, 80% { transform: translateX(5px); }
        30%, 70% { transform: translateX(-5px); }
        40%, 60% { transform: translateX(5px); }
        50% { transform: translateX(0); }
    }
`;
    document.head.appendChild(style);
</script>