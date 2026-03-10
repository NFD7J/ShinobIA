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
                                                <?php
                                                $val = $grid[$i][$j];
                                                $hasValue = $val !== null && $val !== '';
                                                $displayValue = $hasValue ? ($val == 1 ? '1' : '0') : '';
                                                ?>
                                                <td class="p-2" style="min-width: 45px; min-height: 45px;">
                                                    <input type="button"
                                                        class="btn btn-sm cell-btn <?php echo $hasValue ? 'locked' : ''; ?>"
                                                        id="cell_<?php echo $i; ?>_<?php echo $j; ?>"
                                                        value="<?php echo $displayValue; ?>"
                                                        data-row="<?php echo $i; ?>"
                                                        data-col="<?php echo $j; ?>"
                                                        data-value="<?php echo $displayValue; ?>"
                                                        data-locked="<?php echo $hasValue ? 'true' : 'false'; ?>"
                                                        <?php echo $hasValue ? 'disabled' : ''; ?>
                                                        style="width: 100%; height: 100%; font-weight: bold; cursor: <?php echo $hasValue ? 'not-allowed' : 'pointer'; ?>;
                                                                  background-color: <?php
                                                                                    if ($hasValue) {
                                                                                        echo '#d0d0d0';  // Gris pour les cellules verrouillées
                                                                                    } else {
                                                                                        echo '#fff';
                                                                                    }
                                                                                    ?>;
                                                                  color: <?php echo $hasValue ? '#666' : '#000'; ?>;
                                                                  border: <?php echo $hasValue ? '2px solid #999' : '1px solid #ddd'; ?>;
                                                                  opacity: <?php echo $hasValue ? '0.7' : '1'; ?>;">
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

                        <button class="btn btn-outline-secondary w-100" id="newGameBtn">
                            <i class="bi bi-arrow-counterclockwise"></i> Nouvelle partie
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

                <!-- Victory modal -->
                <div class="modal fade" id="victoryModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">🎉 Bravo !</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="victoryCloseBtn"></button>
                            </div>
                            <div class="modal-body">
                                <p id="victoryMessage">La grille est correcte.</p>
                                <ul class="list-unstyled">
                                    <li>Temps: <strong id="victoryTime">00:00</strong></li>
                                    <li>Erreurs: <strong id="victoryErrors">0</strong></li>
                                    <li>Indices: <strong id="victoryHints">0</strong></li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <a href="index.php?controller=game" class="btn btn-primary">Nouvelle partie</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="victoryCloseFooter">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Données du jeu
    let gridData = <?php echo json_encode($grid); ?>;
    let solutionData = <?php echo json_encode($solution); ?>;
    const difficulty = '<?php echo $difficulty; ?>';
    const gridSize = <?php echo $size; ?>;

    let playerGrid = JSON.parse(JSON.stringify(gridData));
    let startTime = Date.now();
    let errors = 0;
    let hintsUsed = 0;
    let gameFinished = false;
    let timerInterval = null;

    // Compter le nombre de cellules à remplir (initialement vides)
    let cellsToFill = 0;
    // Normaliser gridData et solutionData -> Number or null to avoid type mismatches
    gridData = gridData.map(row => row.map(cell => (cell === null || cell === '') ? null : Number(cell)));
    solutionData = solutionData.map(row => row.map(cell => (cell === null || cell === '') ? null : Number(cell)));

    gridData.forEach(row => {
        row.forEach(cell => {
            if (cell === null || cell === '') {
                cellsToFill++;
            }
        });
    });

    // Initialiser les cellules
    document.querySelectorAll('.cell-btn').forEach(cell => {
        cell.addEventListener('click', handleCellClick);
    });

    function handleCellClick(e) {
        const button = e.target;

        // Vérifier si la cellule est verrouillée
        if (button.dataset.locked === 'true' || button.disabled) {
            alert('⛔ Cette case est pré-remplie et ne peut pas être modifiée.');
            return;
        }

        // Debug log
        console.log('handleCellClick start', { id: button.id, row: button.dataset.row, col: button.dataset.col, value: button.value });

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
        
        // Debug: show remaining nulls
        const remaining = playerGrid.flat().filter(v => v === null || v === '').length;
        console.log('handleCellClick updated playerGrid; remaining empty cells:', remaining);

        // Vérifier automatiquement si la grille est complète et correcte
        checkAutomatic();
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

    // Bouton soumettre (removed) - replaced by automatic verification and modal

    // Mettre à jour la progression
    function updateProgress() {
        let filledCells = 0;
        playerGrid.forEach(row => {
            row.forEach(cell => {
                if (cell !== null && cell !== '') filledCells++;
            });
        });

        // Soustraire les cellules pré-remplies du total
        let cellsFilledByPlayer = filledCells;
        gridData.forEach(row => {
            row.forEach(cell => {
                if (cell !== null && cell !== '') cellsFilledByPlayer--;
            });
        });

        const progressPercent = cellsToFill > 0 ? Math.round((cellsFilledByPlayer / cellsToFill) * 100) : 0;
        document.getElementById('progress').textContent = Math.max(0, Math.min(100, progressPercent)) + '%';
    }
    
    // Vérification automatique après chaque clic
    function checkAutomatic() {
        console.log('checkAutomatic start', { gameFinished });
        if (gameFinished) return;
        
        // Vérifier si la grille est complète
        // Count empty cells
        let emptyCount = 0;
        for (let i = 0; i < gridSize; i++) {
            for (let j = 0; j < gridSize; j++) {
                if (playerGrid[i][j] === null || playerGrid[i][j] === '') {
                    emptyCount++;
                }
            }
        }
        console.log('checkAutomatic: emptyCount=', emptyCount, 'cellsToFill=', cellsToFill);
        let isComplete = (emptyCount === 0);
        
        if (!isComplete) return; // Pas encore complète
        
        // Vérifier si la solution est correcte (comparer en tant que nombres)
        let isCorrect = true;
        let mismatches = [];
        for (let i = 0; i < gridSize; i++) {
            for (let j = 0; j < gridSize; j++) {
                const left = playerGrid[i][j];
                const right = solutionData[i][j];
                // coerce to number for robust comparison
                const ln = left === null || left === '' ? null : Number(left);
                const rn = right === null || right === '' ? null : Number(right);
                if (ln !== rn) {
                    isCorrect = false;
                    mismatches.push({i,j,left,right,ln,rn});
                    console.debug('Mismatch at', i, j, 'player=', left, 'solution=', right, 'ln=', ln, 'rn=', rn);
                    break;
                }
            }
            if (!isCorrect) break;
        }
        if (!isCorrect) {
            console.log('checkAutomatic: solution incorrect, mismatches=', mismatches);
            // highlight mismatches visually
            mismatches.forEach(m => {
                const id = 'cell_' + m.i + '_' + m.j;
                const el = document.getElementById(id);
                if (el) el.style.outline = '3px solid #ffb74d';
            });
            return; // Solution incorrecte
        }
        
        // 🎉 LA GRILLE EST COMPLÈTE ET CORRECTE!
        finishGame();
    }
    
    // Terminer la partie avec succès
    function finishGame() {
        gameFinished = true;

        // Arrêter le timer
        if (timerInterval) {
            clearInterval(timerInterval);
        }

        // Désactiver le bouton d'indice
        const hintBtnEl = document.getElementById('hintBtn');
        if (hintBtnEl) hintBtnEl.disabled = true;

        // Envoyer le feedback
        const timeElapsed = Math.floor((Date.now() - startTime) / 1000);
        sendFeedback(timeElapsed);

        // Mettre à jour la modale de victoire
        const timeEl = document.getElementById('victoryTime');
        const errEl = document.getElementById('victoryErrors');
        const hintEl = document.getElementById('victoryHints');
        if (timeEl) timeEl.textContent = formatTime(timeElapsed);
        if (errEl) errEl.textContent = String(errors);
        if (hintEl) hintEl.textContent = String(hintsUsed);

        // Afficher la modale (Bootstrap si présent)
        console.log('finishGame: showing victory modal');
        let modalEl = document.getElementById('victoryModal');
        if (typeof bootstrap !== 'undefined') {
            if (!modalEl) {
                console.log('finishGame: modal markup missing, creating dynamic modal');
                // create minimal modal and append to body
                modalEl = document.createElement('div');
                modalEl.className = 'modal fade';
                modalEl.id = 'victoryModal';
                modalEl.setAttribute('tabindex', '-1');
                modalEl.innerHTML = `
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">🎉 Bravo !</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p id="victoryMessage">La grille est correcte.</p>
                                <ul class="list-unstyled">
                                    <li>Temps: <strong id="victoryTime">${formatTime(timeElapsed)}</strong></li>
                                    <li>Erreurs: <strong id="victoryErrors">${errors}</strong></li>
                                    <li>Indices: <strong id="victoryHints">${hintsUsed}</strong></li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <a href="index.php?controller=game" class="btn btn-primary">Nouvelle partie</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>`;
                document.body.appendChild(modalEl);
            }
            try {
                const vm = new bootstrap.Modal(modalEl);
                vm.show();
            } catch (e) {
                console.error('finishGame: bootstrap modal show error', e);
                // fallback simple display
                modalEl.classList.add('show');
                modalEl.style.display = 'block';
                document.body.classList.add('modal-open');
            }
        } else if (modalEl) {
            // Fallback simple
            modalEl.classList.add('show');
            modalEl.style.display = 'block';
            document.body.classList.add('modal-open');
        } else {
            // Ultimate fallback
            alert('🎉 BRAVO! Vous avez résolu la grille!\n\n⏱️ Temps: ' + formatTime(timeElapsed) + '\n❌ Erreurs: ' + errors + '\n💡 Indices utilisés: ' + hintsUsed);
        }
    }

    // Vérifier la solution
    function checkSolution() {
        let isCorrect = true;

        // Comparer avec la solution
        for (let i = 0; i < gridSize; i++) {
            for (let j = 0; j < gridSize; j++) {
                const left = playerGrid[i][j];
                const right = solutionData[i][j];
                const ln = left === null || left === '' ? null : Number(left);
                const rn = right === null || right === '' ? null : Number(right);
                if (ln !== rn) {
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
                    console.debug('checkSolution mismatch at', i, j, 'player=', left, 'solution=', right, 'ln=', ln, 'rn=', rn);
                }
            }
        }

        document.getElementById('errors').textContent = errors;

        if (isCorrect) {
            // Terminer la partie (utilise la même logique que la fin automatique)
            finishGame();
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
    timerInterval = setInterval(function() {
        if (gameFinished) return; // Ne pas continuer si la partie est finie
        const elapsed = Math.floor((Date.now() - startTime) / 1000);
        document.getElementById('timer').textContent = formatTime(elapsed);
    }, 1000);

    // Nouveau bouton partie: relancer une partie de même difficulté
    const newGameBtn = document.getElementById('newGameBtn');
    if (newGameBtn) {
        newGameBtn.addEventListener('click', function() {
            window.location.href = 'index.php?controller=game&action=play&difficulty=' + encodeURIComponent(difficulty);
        });
    }

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
    
    .cell-btn.locked {
        background-color: #d0d0d0 !important;
        color: #666 !important;
        cursor: not-allowed !important;
        opacity: 0.7 !important;
        border: 2px solid #999 !important;
        font-weight: bold !important;
    }
    
    .cell-btn.locked:hover {
        background-color: #d0d0d0 !important;
        opacity: 0.7 !important;
    }
    
    .cell-btn:not(.locked):hover {
        background-color: #fff9e6 !important;
        border-color: #ffc107 !important;
    }
`;
    document.head.appendChild(style);
</script>