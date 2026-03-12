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
        font-family: 'Georgia', serif;
        overflow-x: hidden;
    }

    .shinobi-title {
        font-size: 3rem;
        font-weight: 900;
        color: #1a0800;
        text-shadow: 2px 3px 10px rgba(0, 0, 0, 0.6);
        letter-spacing: 1px;
        margin-bottom: 4px;
        line-height: 1;
    }

    .shinobi-title .red-part {
        color: #b52020;
    }

    .game-logo {
        max-height: 110px;
        display: inline-block;
    }

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
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
    }

    .shinobi-panel small {
        color: #c8a97e;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .shinobi-panel h3,
    .shinobi-panel h4 {
        color: #fff8e8;
    }

    .parchemin-zone {
        position: relative;
        width: 100%;
        max-width: 1400px;
    }

    .parchemin-zone img.parchemin-img {
        display: block;
        width: 100%;
        height: auto;
        filter: drop-shadow(0 8px 24px rgba(0, 0, 0, 0.55));
    }

    .parchemin-content {
        position: absolute;
        top: 0;
        left: 25rem;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px 20px;
        box-sizing: border-box;
    }

    .parchemin-inner {
        display: flex;
        align-items: flex-start;
        justify-content: center;
        gap: 35px;
        max-width: 100%;
        padding-top: 20px;
        margin: 0 auto;
        box-sizing: border-box;
    }

    /* Panneaux latéraux */
    .left-panel,
    .right-panel {
        display: flex;
        flex-direction: column;
        gap: 20px;
        flex: 0 0 auto;
        min-width: 145px;
    }


    .difficulty-card,
    .stat-card,
    .chrono-card,
    .hint-card {
        background: rgba(230, 200, 150, 0.8);
        border: 2px solid #8b6f47;
        border-radius: 15px;
        padding: 14px;
        text-align: center;
        color: #3d1a00;
        font-family: 'Georgia', serif;
    }

    .difficulty-card {
        min-height: 100px;
    }

    .stat-card {
        min-height: 85px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .stat-card h4 {
        color: #2a1000;
        margin: 6px 0 0 0;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .stat-card small {
        color: #6b4226;
        font-size: 0.65rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .difficulty-card img {
        width: 55px;
        height: 55px;
        object-fit: contain;
        margin-bottom: 6px;
    }

    .difficulty-card .difficulty-name {
        font-weight: bold;
        color: #b52020;
        font-size: 0.85rem;
        display: none;
    }

    .difficulty-card .difficulty-level {
        font-size: 0.75rem;
        color: #2a1000;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: bold;
    }

    .stat-icon {
        width: 32px;
        height: 32px;
        object-fit: contain;
    }

    .parchemin-grid-col {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 0 0 auto;
    }

    .parchemin-sensei-section {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        flex: 0 0 auto;
    }

    .parchemin-sensei {
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 auto;
        height: auto;
        position: relative;
    }

    .parchemin-sensei img {
        max-height: 280px;
        width: auto;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
    }

    .sensei-message-zone {
        background: linear-gradient(135deg, rgba(220, 200, 170, 0.85) 0%, rgba(230, 210, 180, 0.85) 100%);
        border: 2px solid #9d7c54;
        border-radius: 12px;
        padding: 16px 18px;
        min-height: 100px;
        min-width: 180px;
        max-width: 250px;
        flex: 0 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: 'Georgia', serif;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        position: relative;
        left: -12rem;
    }

    .sensei-message-zone .message-content {
        color: #2a1000;
        font-size: 0.9rem;
        text-align: center;
        line-height: 1.6;
        min-height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
    }

    .chrono-card {
        min-height: 45px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-width: 150px;
    }

    .chrono-card .chrono-icon {
        width: 32px;
        height: 32px;
        object-fit: contain;
        margin: 0 auto 4px;
    }

    .chrono-card .chrono-time {
        font-size: 0.8rem;
        font-weight: bold;
        color: #b52020;
        letter-spacing: 2px;
    }

    .chrono-card .chrono-penalty {
        font-size: 0.55rem;
        color: #6b4226;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 2px;
        line-height: 1;
    }

    .hint-card {
        min-height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        max-width: 150px;
    }

    .hint-card button {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #b52020, #8b0000);
        color: #fff;
        border: 1px solid #6b0000;
        border-radius: 12px;
        padding: 6px 4px;
        font-weight: bold;
        cursor: pointer;
        font-size: 0.55rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 2px;
        transition: background 0.2s;
        font-family: 'Georgia', serif;
    }

    .hint-card button:hover {
        background: linear-gradient(135deg, #d52020, #aa0000);
    }

    .hint-card button img {
        width: 16px;
        height: 16px;
        object-fit: contain;
    }

    :root {
        --cell-size: 60px;
    }

    #bineroGrid {
        border-collapse: collapse;
        border: 2px solid rgba(80, 50, 20, 0.7);
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.25);
        background: linear-gradient(135deg, rgba(205, 185, 145, 0.50) 0%, rgba(255, 252, 245, 0.75) 50%, rgba(205, 185, 145, 0.50) 100%);
        table-layout: fixed;
    }

    #bineroGrid td {
        padding: 0;
        width: var(--cell-size, 60px);
        height: var(--cell-size, 60px);
    }

    .cell-btn {
        width: var(--cell-size, 60px);
        height: var(--cell-size, 60px);
        background: transparent;
        background-size: 70%;
        background-repeat: no-repeat;
        background-position: center;
        border: 1px solid rgba(80, 50, 20, 0.45);
        font-weight: bold;
        font-size: 0;
        color: transparent;
        cursor: pointer;
        border-radius: 0;
        transition: background 0.12s, border-color 0.12s;
        font-family: 'Georgia', serif;
        padding: 0;
        outline: none;
    }

    .cell-btn[data-value="0"] {
        background-image: url('image.php?f=shuriken.svg');
    }

    .cell-btn[data-value="1"] {
        background-image: url('image.php?f=kunai.svg');
    }

    .cell-btn:not([disabled]):hover {
        background-color: rgba(255, 220, 80, 0.70) !important;
        border-color: #7a3b0a !important;
    }

    .cell-btn.locked {
        color: transparent !important;
        cursor: not-allowed !important;
        border: 2px solid rgba(80, 50, 20, 0.7) !important;
        font-weight: 900 !important;
        opacity: 0.75;
    }

    .btn-hint {
        background: linear-gradient(135deg, #c8900a, #9a6e08);
        color: #fffde0;
        border: 1px solid #7a5808;
        font-weight: bold;
        border-radius: 6px;
        font-size: 0.85rem;
    }

    .btn-hint:hover {
        background: linear-gradient(135deg, #e0a812, #b07a0a);
        color: #fffde0;
    }

    .btn-validate {
        background: linear-gradient(135deg, #275c27, #183518);
        color: #d0f0d0;
        border: 1px solid #183518;
        font-weight: bold;
        border-radius: 6px;
        font-size: 0.85rem;
    }

    .btn-validate:hover {
        background: linear-gradient(135deg, #306830, #204520);
        color: #d0f0d0;
    }

    .btn {
        font-family: ' ', cursive;
        font-size: 0.8rem;
        border-radius: 20px;
        border: 2px solid #a82a2a !important;
        color: #A82A2A !important;
        background-color: #fff1db !important;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 240px;
        height: 56px;
        margin: 0 auto;
        margin-bottom: 5rem;
    }

    .modal-victoire {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(4px);
        align-items: center;
        justify-content: center;
        color: #fff8e8;
        font-family: 'Georgia', serif;
        font-size: 2rem;
        z-index: 10000;
    }

    .modal-victoire-content {
        position: relative;
        background: rgba(0, 0, 0, 0);
        width: fit-content;
        height: fit-content;
    }

    .modal-victoire-text {
        font-family: "Montserrat", sans-serif;
        font-weight: 400;
        font-size: 16px;
        color: #fae4c1;
        position: absolute;
        top: 20%;
        right: 20%;
        text-align: center;
    }

    .btn-modal {
        font-family: "Montserrat", sans-serif;
        font-weight: 600;
        font-size: 20px;
        border: none;
        display: block;
        width: 60%;
        margin: 0 auto;
        border-radius: 20px;
        border: 1px solid #fff8e8;
    }

    .btn-new-grid {
        background-color: #fae4c1;
        color: #a82a2a;
    }

    .btn-new-grid:hover {
        background-color: #d2c1a2;
        color: #a82a2a;
        border: 1px solid #d2c1a2;
    }

    .btn-new-grid:focus,
    .btn-new-grid:active {
        background-color: #d2c1a2;
        color: #a82a2a;
        border-color: #a82a2a;
        box-shadow: 0 0 0 0.2rem rgba(168, 42, 42, 0.35);
    }

    .btn-retour {
        background-color: #a82a2a;
        color: #fae4c1;
    }

    .btn-retour:hover {
        background-color: #8e2222;
        color: #fae4c1;
        border: 1px solid #fae4c1;
    }

    .btn-retour:focus,
    .btn-retour:active {
        background-color: #8e2222;
        color: #fae4c1;
        border-color: #fae4c1;
        box-shadow: 0 0 0 0.2rem rgba(142, 34, 34, 0.45);
    }

    @keyframes shake {

        0%,
        100% {
            transform: translateX(0);
        }

        10%,
        90% {
            transform: translateX(-5px);
        }

        20%,
        80% {
            transform: translateX(5px);
        }

        30%,
        70% {
            transform: translateX(-5px);
        }

        40%,
        60% {
            transform: translateX(5px);
        }

        50% {
            transform: translateX(0);
        }
    }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.95);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes fadeOutScale {
        from {
            opacity: 1;
            transform: scale(1);
        }

        to {
            opacity: 0;
            transform: scale(0.95);
        }
    }
</style>

<?php
// Calculer la taille adaptée des cellules selon la grille
$cellSize = '60px';
if ($size == 6) {
    $cellSize = '55px';
} elseif ($size == 8) {
    $cellSize = '48px';
} elseif ($size == 10) {
    $cellSize = '42px';
}
?>
<div class="shinobi-game-wrapper" style="--cell-size: <?php echo $cellSize; ?>;">
    <!-- Titre -->
    <div class="text-center mb-3">
        <img src="image.php?f=logo_dark_shadow.png" alt="ShinoBinairo" class="game-logo">
    </div>

    <!-- Zone principale -->
    <div class="game-layout">

        <!-- Parchemin + Grille + Stats -->
        <div class="parchemin-zone">
            <img src="../views/game/images/parchemin.png" alt="parchemin" class="parchemin-img">
            <div class="parchemin-content">
                <div class="parchemin-inner">

                    <!-- PANNEAU GAUCHE: Difficulté + Erreurs + Progrès -->
                    <div class="left-panel">
                        <!-- Difficulté -->
                        <div class="difficulty-card">
                            <img src="image.php?f=grille_jeux/<?php echo match ($difficulty) {
                                                                    'easy' => 'niveau_facile_genin.png',
                                                                    'medium' => 'niveau_moyen_chunin.png',
                                                                    'hard' => 'niveau_difficile_jonin.png',
                                                                    default => 'niveau_facile_genin.png'
                                                                }; ?>" alt="Niveau">
                            <div class="difficulty-name">Genin / Chunin / Jonin</div>
                            <div class="difficulty-level"><?php echo match ($difficulty) {
                                                                'easy' => 'FACILE',
                                                                'medium' => 'MOYEN',
                                                                'hard' => 'DIFFICILE',
                                                                default => $difficulty
                                                            }; ?></div>
                        </div>

                        <!-- Erreurs -->
                        <div class="stat-card">
                            <img class="stat-icon" src="image.php?f=grille_jeux/error_shuriken.png" alt="Erreurs">
                            <small>ERREURS</small>
                            <h4 id="errors">0</h4>
                        </div>

                        <!-- Progrès -->
                        <div class="stat-card">
                            <img class="stat-icon" src="image.php?f=grille_jeux/progres_fujisan.png" alt="Progrès">
                            <small>PROGRÈS</small>
                            <h4 id="progress">0%</h4>
                        </div>
                    </div>

                    <!-- GRILLE AU CENTRE -->
                    <div class="parchemin-grid-col">
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

                    <!-- PANNEAU DROIT: Chrono + Indice + Sensei -->
                    <div class="right-panel">
                        <!-- Chrono -->
                        <div class="chrono-card">
                            <img class="chrono-icon" src="image.php?f=grille_jeux/chrono_hourglass.svg" alt="Chrono">
                            <div class="chrono-time" id="timer">00:00</div>
                            <div class="chrono-penalty">Pénalité erreurs +00:00<br />Pénalité indice +00:00</div>
                        </div>

                        <!-- Bouton Indice -->
                        <div class="hint-card">
                            <button id="hintBtn" type="button">
                                <img src="image.php?f=grille_jeux/clue_lightbulb.svg" alt="Indice">
                                <span>INDICE</span>
                            </button>
                        </div>

                        <!-- Sensei + Zone de messages -->
                        <div class="parchemin-sensei-section">
                            <div class="parchemin-sensei">
                                <img id="senseiImage" src="image.php?f=grille_jeux/sensei_smile.png" alt="Sensei">
                            </div>
                            <div class="sensei-message-zone" id="senseiMessageZone">
                                <div class="message-content" id="senseiMessageContent">
                                    <span style="color: #999;">Sensei Nidō</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Actions sous le parchemin -->
        <div class="actions-row">
            <a href="index.php?controller=game" class="btn btn-outline-light btn-sm">Abandonner</a>
        </div>



    </div>
</div>

<audio id="victorySound" preload="auto">
    <source src="../views/game/audio/shamisen_win.mp3" type="audio/mpeg">
</audio>
<audio autoplay loop id="backgroundSound">
    <source src="../views/game/audio/background_music.mp3" type="audio/mpeg">
</audio>
<script>
    const backgroundSound = document.getElementById('backgroundSound').volume = 0.2; // Volume de la musique de fond
</script>

<!-- modal victoire -->
<div class="modal-victoire">
    <div class="modal-victoire-content">
        <img src="image.php?f=sensei_ellips_win.png" alt="modal victoire">
        <div class="modal-victoire-text">
            <p style="font-weight: 900; font-size: 35px;" class="mb-0">Mission accomplie !</p>
            <p>Un coup, une victoire : l'essence même du shinobi</p>
            <p class="mb-5 mt-4">TEMPS <span id="victoryTime"></span> | ERREURS <span id="victoryErrors"></span></p>
            <a class="btn btn-modal mb-3 btn-new-grid" href="index.php?controller=game&action=play&difficulty=<?php echo $difficulty; ?>">Nouvelle grille</a>
            <a class="btn btn-modal btn-retour" href="index.php?controller=home">Retour au dojo</a>
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
    let moveCount = 0; // Compteur de coups du joueur
    let lastAPICallMove = 0; // Dernier coup où l'API a été appelée
    let cellModificationTimers = {}; // Timers pour vérifier les violations après délai
    let lastGoodMoveTime = 0; // Cooldown pour éviter spam de feedback bons coups
    let lastErrorCommentTime = 0; // Cooldown pour les commentaires d'erreur (max 1 par 4s)
    let currentEmote = 'sensei_idea'; // Emote actuelle du sensei (persiste jusqu'à changement)
    let lastMoveType = null; // 'good' ou 'bad' (pour tracker l'humeur)
    let lastMoveTime = 0; // Timestamp du dernier coup (pour changer après inactivité)

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
        console.log('handleCellClick start', {
            id: button.id,
            row: button.dataset.row,
            col: button.dataset.col,
            value: button.value
        });

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
        button.dataset.value = nextValue;
        playerGrid[row][col] = nextValue === '' ? null : (nextValue === '0' ? 0 : 1);

        // Incrémenter le compteur de coups
        moveCount++;

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

        // Vérifier les violations des règles du Binero avec un délai
        // Cela permet au joueur de cliquer plusieurs fois sans compter le passage intermédiaire comme erreur
        const cellKey = `${row}_${col}`;

        // Annuler le timer précédent s'il existe
        if (cellModificationTimers[cellKey]) {
            clearTimeout(cellModificationTimers[cellKey]);
        }

        // Vérifier les violations après 900ms (délai suffisant pour cycler vide→0→1 sans compter les erreurs temporaires)
        cellModificationTimers[cellKey] = setTimeout(() => {
            const currentValue = playerGrid[row][col];
            if (currentValue !== null && currentValue !== '') {
                const hasViolation = checkRuleViolations(row, col, currentValue);
                if (hasViolation) {
                    errors++;
                    document.getElementById('errors').textContent = errors;
                    // Feedback d'ERREUR LOCAL (compassion + message motivant)
                    displayBadMoveLocal();
                } else {
                    // ✅ BON COUP validé! Feedback LOCAL immédiat (pas d'API)
                    displayGoodMoveLocal();
                }
            }
            // IMPORTANT: Appeler checkAutomatic APRÈS vérifier les violations
            checkAutomatic();
            delete cellModificationTimers[cellKey];
        }, 900);

        // Appeler l'API à intervalle adapté selon l'avancement et les erreurs
        // - Plus fréquent si beaucoup d'erreurs ou peu avancé
        // - Moins fréquent si bien avancé et pas d'erreur
        // Feedback "Ninja" => commentaires variés de l'IA tous les 10-15 coups
        const progress = parseInt(document.getElementById('progress').textContent);
        const errorCount = parseInt(document.getElementById('errors').textContent);

        let apiInterval = 15; // Par défaut : tous les 15 coups pour feedback ninja
        if (errorCount >= 3) apiInterval = 12; // Plus fréquent si erreurs
        if (progress >= 80) apiInterval = 18; // Moins fréquent si bien avancé

        if (moveCount - lastAPICallMove >= apiInterval) {
            lastAPICallMove = moveCount;
            triggerSenseiCommentary('regular');
        }

        // DEBUG: show remaining nulls
        const remaining = playerGrid.flat().filter(v => v === null || v === '').length;
        console.log('handleCellClick updated playerGrid; remaining empty cells:', remaining);
    }

    // Bouton indice
    document.getElementById('hintBtn').addEventListener('click', async function() {
        try {
            // Convertir la grille en format proper pour l'API (Integer[][])
            const gridToSend = playerGrid.map(row =>
                row.map(cell => {
                    if (cell === null || cell === '') return null;
                    return parseInt(cell);
                })
            );

            console.log('Envoi indice avec grille:', gridToSend);

            const response = await fetch('index.php?controller=game&action=hint', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    grid: gridToSend,
                    difficulty: difficulty
                })
            });

            console.log('Réponse HTTP status:', response.status);

            const data = await response.json();
            console.log('Données reçues:', data);

            if (!response.ok) {
                console.error('Erreur HTTP:', response.status, data);
                alert('Erreur du serveur: ' + (data.error || 'Impossible de récupérer l\'indice'));
                return;
            }

            if (data.hint) {
                hintsUsed++;

                // Changer l'emote du sensei en pensif (il réfléchit pour donner l'indice)
                const senseiImg = document.getElementById('senseiImage');
                if (senseiImg) {
                    senseiImg.src = `image.php?f=emotes_sensei/sensei_idea.png`;
                    senseiImg.alt = 'sensei_idea';
                }

                // Afficher l'indice dans une bulle à côté du sensei
                queueSenseiComment('💡 ' + data.hint);
                console.log('Indice affiché:', data.hint);
            } else {
                console.error('Pas d\'indice dans la réponse:', data);
                queueSenseiComment('Le Sensei n\'a pas d\'indice pour toi en ce moment. Continue à réfléchir!');
            }
        } catch (error) {
            console.error('Erreur réseau lors de la récupération de l\'indice:', error);
            alert('Impossible de contacter le Sensei. Vérifiez la connexion.');
        }
    });



    // Vérifie les violations de règles du Binero pour une cellule donnée
    function checkRuleViolations(row, col, value) {
        if (value === '' || value === null) return false; // Pas de violation si cellule vide

        // Accepter les nombres ET les strings
        const val = (value === '0' || value === 0) ? 0 : ((value === '1' || value === 1) ? 1 : null);
        if (val === null) return false;

        // Règle 1: Vérifier 3 identiques consécutifs en ligne (gauche-droite)
        if (col >= 2) {
            if (playerGrid[row][col - 1] === val && playerGrid[row][col - 2] === val) return true;
        }
        if (col >= 1 && col < gridSize - 1) {
            if (playerGrid[row][col - 1] === val && playerGrid[row][col + 1] === val) return true;
        }
        if (col <= gridSize - 3) {
            if (playerGrid[row][col + 1] === val && playerGrid[row][col + 2] === val) return true;
        }

        // Règle 1: Vérifier 3 identiques consécutifs en colonne (haut-bas)
        if (row >= 2) {
            if (playerGrid[row - 1][col] === val && playerGrid[row - 2][col] === val) return true;
        }
        if (row >= 1 && row < gridSize - 1) {
            if (playerGrid[row - 1][col] === val && playerGrid[row + 1][col] === val) return true;
        }
        if (row <= gridSize - 3) {
            if (playerGrid[row + 1][col] === val && playerGrid[row + 2][col] === val) return true;
        }

        // Règle 2: Compter les 0 et 1 dans la ligne
        let count0 = 0,
            count1 = 0;
        for (let j = 0; j < gridSize; j++) {
            if (playerGrid[row][j] === 0) count0++;
            else if (playerGrid[row][j] === 1) count1++;
        }
        const expected = gridSize / 2;
        if (count0 > expected || count1 > expected) return true;

        // Règle 2: Compter les 0 et 1 dans la colonne
        count0 = 0;
        count1 = 0;
        for (let i = 0; i < gridSize; i++) {
            if (playerGrid[i][col] === 0) count0++;
            else if (playerGrid[i][col] === 1) count1++;
        }
        if (count0 > expected || count1 > expected) return true;

        return false;
    }

    // Affichage local d'un bon coup (SANS appel API pour économiser)
    function displayGoodMoveLocal() {
        const senseiImg = document.getElementById('senseiImage');
        if (!senseiImg) return;

        // Mettre l'emote sensei_kawaii (content/approuvé) et PERSISTER
        currentEmote = 'sensei_kawaii';
        lastMoveType = 'good';
        lastMoveTime = Date.now();

        senseiImg.src = `image.php?f=emotes_sensei/sensei_kawaii.png`;
        senseiImg.alt = 'sensei_kawaii';

        // Messages positifs variés et motivants - THÈME NINJA & BINEIRO
        const goodComments = [
            'Coup de maître!',
            'Logique ninja!',
            'Pattern maîtrisé!',
            'Stratégie gagnante!',
            'Analyse parfaite!',
            'Précision du sabre!',
            'Tactique implacable!',
            'L\'art du Binero!',
            'Piège évité!',
            'Équilibre trouvé!'
        ];

        const randomComment = goodComments[Math.floor(Math.random() * goodComments.length)];
        queueSenseiComment(randomComment);
    }

    // Affichage local d'un mauvais coup (erreur motivante - SANS appel API)
    function displayBadMoveLocal() {
        const senseiImg = document.getElementById('senseiImage');
        if (!senseiImg) return;

        // Emote sensei_fear ou sensei_doubt (inquiet/déçu) et PERSISTER
        const emotes = ['sensei_fear', 'sensei_doubt'];
        const randomEmote = emotes[Math.floor(Math.random() * emotes.length)];
        currentEmote = randomEmote;
        lastMoveType = 'bad';
        lastMoveTime = Date.now();

        senseiImg.src = `image.php?f=emotes_sensei/${randomEmote}.png`;
        senseiImg.alt = randomEmote;

        // Messages d'erreur MOTIVANTS & THÉMATIQUES - NINJA & BINEIRO
        const badComments = [
            '3 identiques de suite!',
            'Déséquilibre 0-1!',
            'Relecture requise!',
            'Scannez la ligne!',
            'Logique brisée!',
            'Colonne surchargée!',
            'Trop d\'un côté!',
            'À repenser...',
            'Les règles l\'interdisent!',
            'Coup interdit!'
        ];

        const randomComment = badComments[Math.floor(Math.random() * badComments.length)];
        queueSenseiComment(randomComment);
    }

    // Fonction déclenchée pour faire appel à l'API et afficher un commentaire
    async function triggerSenseiCommentary(type) {
        if (gameFinished) return;

        try {
            const timeElapsed = Math.floor((Date.now() - startTime) / 1000);
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
                    progress: parseInt(document.getElementById('progress').textContent),
                    moveType: type // ← 'error' ou 'regular' (plus 'good_move' = local)
                })
            });

            if (!response.ok) {
                console.error('Erreur API:', response.status);
                return;
            }

            const data = await response.json();
            if (data.comment) {
                // Déterminer l'emote selon le type
                let emote = 'sensei_kawaii';

                if (type === 'error') {
                    emote = 'sensei_fear'; // Peur en cas d'erreur
                } else {
                    // Pour 'regular': utiliser l'expression du backend
                    emote = data.expression ? mapExpressionToEmote(data.expression) : getSenseiEmoteFromStats();
                }

                // Mettre à jour l'image du sensei
                const senseiImg = document.getElementById('senseiImage');
                if (senseiImg) {
                    senseiImg.src = `image.php?f=emotes_sensei/${emote}.png`;
                    senseiImg.alt = emote;
                }

                // Afficher le commentaire
                queueSenseiComment(data.comment);
            }
        } catch (error) {
            console.error('Erreur lors de la mise à jour du sensei:', error);
        }
    }

    // Queue pour afficher les bulles une par une
    let commentQueue = [];
    let isDisplayingComment = false;

    // Ajoute un commentaire à la queue (affichage séquentiel)
    function queueSenseiComment(comment) {
        commentQueue.push(comment);
        processCommentQueue();
    }

    // Traite la queue de commentaires (un par un)
    async function processCommentQueue() {
        if (isDisplayingComment || commentQueue.length === 0) return;

        isDisplayingComment = true;
        const comment = commentQueue.shift();

        await new Promise((resolve) => {
            displaySenseiComment(comment, resolve);
        });

        isDisplayingComment = false;

        // Traiter le prochain commentaire après un petit délai
        if (commentQueue.length > 0) {
            setTimeout(processCommentQueue, 500);
        }
    }

    // Affiche le commentaire du sensei dans la zone dédiée
    function displaySenseiComment(comment, onComplete) {
        const messageZone = document.getElementById('senseiMessageZone');
        const messageContent = document.getElementById('senseiMessageContent');

        if (!messageZone || !messageContent) {
            if (onComplete) onComplete();
            return;
        }

        // Ajouter une animation d'apparition
        messageContent.style.animation = 'none';
        setTimeout(() => {
            messageContent.style.animation = 'fadeInScale 0.3s ease-out';
        }, 10);

        // Afficher le nouveau message
        messageContent.textContent = comment;
        messageZone.style.opacity = '1';

        // Garder le message 4 secondes
        setTimeout(() => {
            messageContent.style.animation = 'fadeOutScale 0.3s ease-out';
            setTimeout(() => {
                messageContent.textContent = '';
                if (onComplete) onComplete();
            }, 300);
        }, 4000);
    }

    // Map les expressions du Sensei (du backend) aux fichiers d'emotes
    function mapExpressionToEmote(expression) {
        const expressionMap = {
            'happy': 'sensei_rofl', // Très content = rire
            'laughing': 'sensei_lol', // Rire bienveillant
            'thinking': 'sensei_idea', // Pensif = avec ampoule (nouvelle idée)
            'pointing': 'sensei_kawaii', // Approbation enthousiaste
            'amused': 'sensei_lol', // Amusé = qui rit
            'sad': 'sensei_doubt', // Triste/déçu = douteux
            'shocked': 'sensei_fear', // Choqué/inquiet = peur
            'crying': 'sensei_fear' // Catastrophe = peur
        };
        return expressionMap[expression] || 'sensei_omg'; // Par défaut: surpris
    }

    // Map des emotes basées sur les conditions de performance (fallback si pas de backend)
    function getSenseiEmoteFromStats() {
        const progress = parseInt(document.getElementById('progress').textContent);
        const errorCount = parseInt(document.getElementById('errors').textContent);
        const timeElapsed = Math.floor((Date.now() - startTime) / 1000);

        // Priorité 1: États catastrophiques
        if (errorCount >= 5) return 'sensei_fear'; // Peur si trop d'erreurs (>=5)
        if (errorCount >= 3 && progress < 30) return 'sensei_fear'; // Peur si beaucoup d'erreurs ET peu avancé

        // Priorité 2: États négatifs
        if (errorCount >= 3) return 'sensei_doubt'; // Doute si quelques erreurs (3-4)
        if (timeElapsed > 300 && progress < 50) return 'sensei_doubt'; // Stress si > 5 min et peu avancé
        if (hintsUsed >= 4) return 'sensei_doubt'; // Frustration si beaucoup d'indices (>=4)

        // Priorité 3: États positifs basés sur la progression
        if (progress >= 95) return 'sensei_rofl'; // Rire fort si presque parfait (95%+)
        if (progress >= 80) return 'sensei_kawaii'; // Heureux si bien avancé (80%+)
        if (progress >= 60) return 'sensei_lol'; // Rire si bon progrès (60%+)
        if (progress >= 30) return 'sensei_smile'; // Sourire si en bonne voie (30%+)

        // Par défaut: pensif et prêt à aider (même au démarrage)
        return 'sensei_idea';
    }

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

    // Valide que la grille complète respecte les règles du Binero
    function validateBineroRules() {
        // Règle 1 : Pas plus de 2 chiffres identiques consécutifs
        // Règle 2 : Autant de 0 que de 1 par ligne et par colonne

        // 1. Vérifier pas 3+ consécutifs dans les lignes
        for (let i = 0; i < gridSize; i++) {
            for (let j = 0; j < gridSize - 2; j++) {
                const v1 = playerGrid[i][j];
                const v2 = playerGrid[i][j + 1];
                const v3 = playerGrid[i][j + 2];
                if (v1 !== null && v1 !== '' && v1 === v2 && v2 === v3) {
                    console.log('Rule violation: 3 consecutive in row', i, 'at col', j);
                    return false;
                }
            }
        }

        // 2. Vérifier pas 3+ consécutifs dans les colonnes
        for (let j = 0; j < gridSize; j++) {
            for (let i = 0; i < gridSize - 2; i++) {
                const v1 = playerGrid[i][j];
                const v2 = playerGrid[i + 1][j];
                const v3 = playerGrid[i + 2][j];
                if (v1 !== null && v1 !== '' && v1 === v2 && v2 === v3) {
                    console.log('Rule violation: 3 consecutive in col', j, 'at row', i);
                    return false;
                }
            }
        }

        // 3. Vérifier autant de 0 que de 1 par ligne (gridSize/2 chacun)
        const expectedCount = gridSize / 2;
        for (let i = 0; i < gridSize; i++) {
            let count0 = 0,
                count1 = 0;
            for (let j = 0; j < gridSize; j++) {
                const v = playerGrid[i][j];
                if (v === 0) count0++;
                else if (v === 1) count1++;
            }
            if (count0 !== expectedCount || count1 !== expectedCount) {
                console.log('Rule violation: row', i, 'has', count0, '0s and', count1, '1s (expected', expectedCount, 'each)');
                return false;
            }
        }

        // 4. Vérifier autant de 0 que de 1 par colonne (gridSize/2 chacun)
        for (let j = 0; j < gridSize; j++) {
            let count0 = 0,
                count1 = 0;
            for (let i = 0; i < gridSize; i++) {
                const v = playerGrid[i][j];
                if (v === 0) count0++;
                else if (v === 1) count1++;
            }
            if (count0 !== expectedCount || count1 !== expectedCount) {
                console.log('Rule violation: col', j, 'has', count0, '0s and', count1, '1s (expected', expectedCount, 'each)');
                return false;
            }
        }

        return true;
    }

    // Vérification automatique après chaque clic
    function checkAutomatic() {
        console.log('checkAutomatic start', {
            gameFinished
        });
        if (gameFinished) return;

        // Vérifier si la grille est complète
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

        // Vérifier si la grille respecte les règles du Binero
        const isCorrect = validateBineroRules();

        if (!isCorrect) {
            console.log('checkAutomatic: grille ne respecte pas les règles du Binero');
            return; // Règles non respectées
        }

        // 🎉 LA GRILLE EST COMPLÈTE ET RESPECTE LES RÈGLES!
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

        const modalEl = document.querySelector('.modal-victoire');
        modalEl.style.display = 'flex';

        // Fermer la modal en cliquant en dehors du contenu
        modalEl.addEventListener('click', function(e) {
            if (e.target === modalEl) {
                modalEl.style.display = 'none';
            }
        });

        // Jouer le son de victoire
        const victorySound = document.getElementById('victorySound');
        victorySound.play();
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
        const response = await fetch('index.php?controller=game&action=save', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                hintsUsed: hintsUsed,
                errors: errors,
                timeElapsed: timeElapsed
            })
        });

        const data = await response.json();
        if (data.newSuccesses && data.newSuccesses.length > 0) {
            data.newSuccesses.forEach((s, i) => {
                setTimeout(() => showSuccessToast(s.name, s.icon), i * 800);
            });
        }
    }

    function showSuccessToast(name, icon) {
        const toast = document.createElement('div');
        toast.style.cssText = `
            position: fixed; bottom: 24px; right: 24px; z-index: 9999;
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: #fff; border-radius: 12px; padding: 14px 20px;
            display: flex; align-items: center; gap: 14px;
            box-shadow: 0 6px 24px rgba(0,0,0,0.3);
            animation: slideIn 0.4s ease; min-width: 260px; max-width: 320px;
        `;

        const isIcon = icon.startsWith('bi-');
        const iconHtml = isIcon ?
            `<i class="bi ${icon}" style="font-size:2rem; color:#f39c12;"></i>` :
            `<img src="public/images/succes/${icon}" style="width:40px;height:40px;object-fit:contain;">`;

        toast.innerHTML = `
            ${iconHtml}
            <div>
                <div style="font-size:0.7rem; color:#f39c12; font-weight:700; letter-spacing:1px; text-transform:uppercase;">
                    🏆 Succès débloqué !
                </div>
                <div style="font-size:0.95rem; font-weight:600; margin-top:2px;">${name}</div>
            </div>
        `;

        document.body.appendChild(toast);
        setTimeout(() => {
            toast.style.animation = 'slideOut 0.4s ease forwards';
            setTimeout(() => toast.remove(), 400);
        }, 4000);
    }

    // Chronomètre
    timerInterval = setInterval(function() {
        if (gameFinished) return; // Ne pas continuer si la partie est finie
        const elapsed = Math.floor((Date.now() - startTime) / 1000);
        document.getElementById('timer').textContent = formatTime(elapsed);

        // Mettre à jour l'emote du sensei SEULEMENT si inactivité depuis 45s
        // Sinon garder l'emote du dernier coup (good/bad)
        if (elapsed % 10 === 0 && elapsed > 0) {
            const timeSinceLastMove = (Date.now() - lastMoveTime) / 1000;

            // Si > 45s depuis dernier coup: changer vers emote dynamique
            // Sinon: garder l'emote du coup (kawaii pour bon, fear/doubt pour bad)
            if (timeSinceLastMove > 45) {
                const senseiImg = document.getElementById('senseiImage');
                if (senseiImg) {
                    const newEmote = getSenseiEmoteFromStats();
                    // Si on a déjà une emote kawaii/fear, garder celle-ci pour pas changer trop
                    if (currentEmote !== newEmote) {
                        currentEmote = newEmote;
                        senseiImg.src = `image.php?f=emotes_sensei/${newEmote}.png`;
                        senseiImg.alt = newEmote;
                    }
                }
            }
            // Sinon: garder l'emote actuelle (du dernier coup)
        }
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

    @keyframes slideIn {
        from { transform: translateX(120%); opacity: 0; }
        to   { transform: translateX(0);    opacity: 1; }
    }

    @keyframes slideOut {
        from { transform: translateX(0);    opacity: 1; }
        to   { transform: translateX(120%); opacity: 0; }
    }
    
    .cell-btn.locked {
        color: transparent !important;
        cursor: not-allowed !important;
        opacity: 0.75 !important;
        border: 2px solid rgba(80, 50, 20, 0.7) !important;
        font-weight: bold !important;
    }
    
    .cell-btn.locked:hover {
        opacity: 0.75 !important;
        border: 2px solid rgba(80, 50, 20, 0.7) !important;
    }
    
    .cell-btn:not(.locked):hover {
        background-color: #fff9e6 !important;
        border-color: #ffc107 !important;
    }
`;
    document.head.appendChild(style);
</script>