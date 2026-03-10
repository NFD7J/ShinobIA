<style>
.shinobi-game-wrapper {
    min-height: 100vh;
    background-image: url('../views/game/images/bckgrd_bois.jpg');
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 24px 16px;
    font-family: 'Georgia', serif;
}
.shinobi-title {
    font-size: 3rem;
    font-weight: 900;
    color: #1a0800;
    text-shadow: 2px 3px 10px rgba(0,0,0,0.6);
    letter-spacing: 1px;
    margin-bottom: 4px;
    line-height: 1;
}
.shinobi-title .red-part { color: #b52020; }
.game-layout {
    display: flex;
    flex-direction: column;
    gap: 20px;
    align-items: center;
    justify-content: center;
    width: 100%;
    max-width: 1300px;
}
.actions-row {
    display: flex;
    gap: 12px;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}
.shinobi-panel {
    background: rgba(20, 10, 3, 0.82);
    border: 2px solid rgba(180, 130, 55, 0.55);
    border-radius: 10px;
    color: #f5e6c8;
    padding: 18px 20px;
    min-width: 160px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.5);
}
.shinobi-panel small { color: #c8a97e; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; }
.shinobi-panel h3, .shinobi-panel h4 { color: #fff8e8; }
.parchemin-zone {
    position: relative;
    width: 100%;
    max-width: 1200px;
}
.parchemin-zone img.parchemin-img {
    display: block;
    width: 100%;
    height: auto;
    filter: drop-shadow(0 8px 24px rgba(0,0,0,0.55));
}
.parchemin-content {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px 80px;
    padding-right: 120px;
}
.parchemin-inner {
    display: flex;
    align-items: center;
    gap: 30px;
    margin-left: -60px;
    margin-top: -90px;
}
.parchemin-grid-col {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.parchemin-timer {
    text-align: center;
    color: #3d1a00;
    font-family: 'Georgia', serif;
    margin-bottom: 8px;
}
.parchemin-timer small {
    color: #6b4226;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.parchemin-timer h3 {
    color: #2a1000;
    margin: 0;
    font-size: 2rem;
}
.parchemin-stats {
    text-align: center;
    color: #3d1a00;
    font-family: 'Georgia', serif;
}
.parchemin-stats small {
    color: #6b4226;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    display: block;
    margin-bottom: 2px;
}
.parchemin-stats h3, .parchemin-stats h4 {
    color: #2a1000;
    margin: 0;
}
.parchemin-stats .stat-block {
    margin-bottom: 18px;
}
#bineroGrid {
    border-collapse: collapse;
    border: 2px solid rgba(80, 50, 20, 0.7);
    box-shadow: 0 2px 12px rgba(0,0,0,0.25);
    background: linear-gradient(135deg, rgba(205, 185, 145, 0.50) 0%, rgba(255, 252, 245, 0.75) 50%, rgba(205, 185, 145, 0.50) 100%);
}
#bineroGrid td { padding: 0; }
.cell-btn {
    width: 45px;
    height: 45px;
    background: transparent;
    border: 1px solid rgba(80, 50, 20, 0.45);
    font-weight: bold;
    font-size: 1.05rem;
    color: #3d1a00;
    cursor: pointer;
    border-radius: 0;
    transition: background 0.12s, border-color 0.12s;
    font-family: 'Georgia', serif;
    padding: 0;
    outline: none;
}
.cell-btn:not([disabled]):hover {
    background: rgba(255, 220, 80, 0.70) !important;
    border-color: #7a3b0a !important;
}
.cell-btn.locked {
    background: rgba(180, 160, 120, 0.20) !important;
    color: #3a1a00 !important;
    cursor: not-allowed !important;
    border: 1px solid rgba(80, 50, 20, 0.45) !important;
    font-weight: 900 !important;
}
.btn-hint {
    background: linear-gradient(135deg, #c8900a, #9a6e08);
    color: #fffde0;
    border: 1px solid #7a5808;
    font-weight: bold;
    border-radius: 6px;
    font-size: 0.85rem;
}
.btn-hint:hover { background: linear-gradient(135deg, #e0a812, #b07a0a); color: #fffde0; }
.btn-validate {
    background: linear-gradient(135deg, #275c27, #183518);
    color: #d0f0d0;
    border: 1px solid #183518;
    font-weight: bold;
    border-radius: 6px;
    font-size: 0.85rem;
}
.btn-validate:hover { background: linear-gradient(135deg, #306830, #204520); color: #d0f0d0; }
@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 90% { transform: translateX(-5px); }
    20%, 80% { transform: translateX(5px); }
    30%, 70% { transform: translateX(-5px); }
    40%, 60% { transform: translateX(5px); }
    50% { transform: translateX(0); }
}
</style>

<div class="shinobi-game-wrapper">

    <!-- Titre -->
    <div class="text-center mb-3">
        <div class="shinobi-title">Shino<span class="red-part">Binairo</span></div>
        <span class="badge bg-<?php echo match($difficulty){ 'easy'=>'success','medium'=>'warning','hard'=>'danger',default=>'secondary' }; ?> fs-6 px-3 mt-1">
            <?php echo match($difficulty){ 'easy'=>'FACILE','medium'=>'MOYEN','hard'=>'DIFFICILE',default=>$difficulty }; ?>
        </span>
    </div>

    <!-- Zone principale -->
    <div class="game-layout">

        <!-- Parchemin + Grille + Stats -->
        <div class="parchemin-zone">
            <img src="../views/game/images/parchemin.png" alt="parchemin" class="parchemin-img">
            <div class="parchemin-content">
                <div class="parchemin-inner">

                <!-- Stats à gauche (erreurs + progrès) -->
                <div class="parchemin-stats">
                    <div class="stat-block">
                        <small>&#10060; Erreurs</small>
                        <h4 id="errors" class="fw-bold">0</h4>
                    </div>
                    <div class="stat-block">
                        <small>&#128202; Progres</small>
                        <h4 id="progress" class="fw-bold">0%</h4>
                    </div>
                </div>

                <!-- Timer au-dessus + Grille -->
                <div class="parchemin-grid-col">
                    <div class="parchemin-timer">
                        <small>&#9201; Temps</small>
                        <h3 id="timer" class="fw-bold">00:00</h3>
                    </div>
            <table id="bineroGrid">
                <tbody>
                                    <?php for ($i = 0; $i < count($grid); $i++): ?>
                                        <tr>
                                            <?php for ($j = 0; $j < count($grid[$i]); $j++): ?>
                                                <?php
                                                $val = $grid[$i][$j];
                                                $hasValue = $val !== null && $val !== '';
                                                $displayValue = $hasValue ? ($val == 1 ? '1' : '0') : '';
                                                ?>
                                                <td>
                                                    <input type="button"
                                                        class="cell-btn <?php echo $hasValue ? 'locked' : ''; ?>"
                                                        id="cell_<?php echo $i; ?>_<?php echo $j; ?>"
                                                        value="<?php echo $displayValue; ?>"
                                                        data-row="<?php echo $i; ?>"
                                                        data-col="<?php echo $j; ?>"
                                                        data-value="<?php echo $displayValue; ?>"
                                                        data-locked="<?php echo $hasValue ? 'true' : 'false'; ?>"
                                                        <?php echo $hasValue ? 'disabled' : ''; ?>>
                                                </td>
                                            <?php endfor; ?>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                </div>

                </div>
            </div>
        </div>

        <!-- Actions sous le parchemin -->
        <div class="actions-row">
            <button class="btn btn-hint" id="hintBtn">&#128161; Indice</button>
            <button class="btn btn-validate" id="submitBtn">&#10003; Valider la solution</button>
            <a href="index.php?controller=game" class="btn btn-outline-light btn-sm">&#127968; Retour aux niveaux</a>
            <button class="btn btn-outline-info btn-sm" id="testApiBtn">&#128027; Test API</button>
        </div>

        <div class="d-none" id="hintCard" style="background: rgba(20,10,3,0.85); border-radius: 8px; padding: 14px 20px; color: #f5e6c8; max-width: 500px;">
            <div class="d-flex justify-content-between align-items-start">
                <strong>&#128161; Indice</strong>
                <button type="button" class="btn-close btn-close-white btn-sm" id="closeHintBtn"></button>
            </div>
            <p id="hintText" class="mt-2 mb-0" style="font-size:0.85rem;"></p>
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

    // Compter le nombre de cellules à remplir (initialement vides)
    let cellsToFill = 0;
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
            button.style.backgroundColor = 'rgba(255, 248, 200, 0.40)';
            button.style.color = '#3d1a00';
        } else if (nextValue === '0') {
            button.style.backgroundColor = 'rgba(180, 230, 255, 0.65)';
            button.style.color = '#0a2a50';
        } else {
            button.style.backgroundColor = 'rgba(255, 220, 100, 0.65)';
            button.style.color = '#5c2800';
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

    // Erreur : animation shake sur les cellules incorrectes
    document.querySelectorAll('.cell-btn').forEach(cell => {
        cell.style.transition = 'background 0.15s';
    });
</script>