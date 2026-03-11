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
        max-width: 1200px;
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
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px 60px;
    }

    .parchemin-inner {
        display: flex;
        align-items: center;
        justify-content: space-around;
        gap: 60px;
        width: 100%;
        margin-left: 20rem;
    }

    .parchemin-stats {
        text-align: center;
        color: #3d1a00;
        font-family: 'Georgia', serif;
        flex: 0 0 auto;
        min-width: 120px;
    }

    .parchemin-grid-col {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 0 0 auto;
    }

    .parchemin-sensei {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        height: 320px;
        position: relative;
    }

    .parchemin-sensei img {
        max-height: 100%;
        width: auto;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
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

    .parchemin-stats h3,
    .parchemin-stats h4 {
        color: #2a1000;
        margin: 0;
    }

    .parchemin-stats .stat-block {
        margin-bottom: 18px;
    }

    #bineroGrid {
        border-collapse: collapse;
        border: 2px solid rgba(80, 50, 20, 0.7);
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.25);
        background: linear-gradient(135deg, rgba(205, 185, 145, 0.50) 0%, rgba(255, 252, 245, 0.75) 50%, rgba(205, 185, 145, 0.50) 100%);
    }

    #bineroGrid td {
        padding: 0;
    }

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
</style>

<div class="shinobi-game-wrapper">

    <!-- Titre -->
    <div class="text-center mb-3">
        <img src="image.php?f=logo_dark_shadow.png" alt="ShinoBinairo" class="game-logo">
        <div>
            <span class="badge bg-<?php echo match ($difficulty) {
                                        'easy' => 'success',
                                        'medium' => 'warning',
                                        'hard' => 'danger',
                                        default => 'secondary'
                                    }; ?> fs-6 px-3 mt-1">
                <?php echo match ($difficulty) {
                    'easy' => 'FACILE',
                    'medium' => 'MOYEN',
                    'hard' => 'DIFFICILE',
                    default => $difficulty
                }; ?>
            </span>
        </div>
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

                    <!-- Grille au milieu -->
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

                    <!-- Sensei à droite -->
                    <div class="parchemin-sensei">
                        <img id="senseiImage" src="image.php?f=sensei_landingpage.png" alt="Sensei">
                    </div>

                </div>
            </div>
        </div>

        <!-- Actions sous le parchemin -->
        <div class="actions-row">
            <button class="btn btn-hint" id="hintBtn">&#128161; Indice</button>
            <a href="index.php?controller=game" class="btn btn-outline-light btn-sm">&#127968; Retour aux niveaux</a>
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
                    triggerSenseiCommentary('error');
                }
            }
            // IMPORTANT: Appeler checkAutomatic APRÈS vérifier les violations
            checkAutomatic();
            delete cellModificationTimers[cellKey];
        }, 900);

        // Appeler l'API à intervalle adapté selon l'avancement et les erreurs
        // - Plus fréquent si beaucoup d'erreurs ou peu avancé
        // - Moins fréquent si bien avancé et pas d'erreur
        const progress = parseInt(document.getElementById('progress').textContent);
        const errorCount = parseInt(document.getElementById('errors').textContent);

        let apiInterval = 15; // Par défaut : tous les 15 coups
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
        if (!confirm('Utiliser un indice? (cela ne pénalise pas votre score)')) return;

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

    // Fermer la carte d'indice
    document.getElementById('closeHintBtn').addEventListener('click', function() {
        document.getElementById('hintCard').classList.add('d-none');
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
                    progress: parseInt(document.getElementById('progress').textContent)
                })
            });

            if (!response.ok) {
                console.error('Erreur API:', response.status);
                return;
            }

            const data = await response.json();
            if (data.comment) {
                // Utiliser l'expression retournée par le backend, sinon fallback
                let emote = data.expression ? mapExpressionToEmote(data.expression) : getSenseiEmoteFromStats();

                if (type === 'error') {
                    emote = 'sensei_fear'; // Peur en cas d'erreur (override)
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

    // Affiche le commentaire du sensei dans la bulle
    function displaySenseiComment(comment, onComplete) {
        const senseiImg = document.getElementById('senseiImage');
        if (!senseiImg) {
            if (onComplete) onComplete();
            return;
        }

        // Créer un conteneur parent pour les bulles s'il n'existe pas
        let bubbleContainer = senseiImg.parentElement.querySelector('#senseiBubbleContainer');
        if (!bubbleContainer) {
            bubbleContainer = document.createElement('div');
            bubbleContainer.id = 'senseiBubbleContainer';
            bubbleContainer.style.cssText = `
                position: relative;
                width: 100%;
                height: 120px;
                pointer-events: none;
            `;
            senseiImg.parentElement.style.position = 'relative';
            senseiImg.parentElement.insertBefore(bubbleContainer, senseiImg);
        }

        // Créer une nouvelle bulle unique
        const textOverlay = document.createElement('div');
        textOverlay.className = 'senseiTextBubble';
        textOverlay.style.cssText = `
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #faf5f0 0%, #f5ede5 100%);
            border: 3px solid #6b4226;
            border-radius: 15px;
            padding: 16px 20px;
            max-width: 280px;
            font-size: 0.95rem;
            color: #3d1a00;
            font-family: 'Georgia', serif;
            font-weight: 500;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            z-index: 1000;
            line-height: 1.5;
            text-align: center;
            white-space: normal;
            word-wrap: break-word;
            animation: bubbleAppear 0.3s ease-out;
            pointer-events: auto;
        `;

        textOverlay.textContent = comment;
        bubbleContainer.appendChild(textOverlay);

        // Afficher la bulle 15 secondes, puis la retirer
        setTimeout(() => {
            textOverlay.style.animation = 'bubbleDisappear 0.3s ease-out';
            setTimeout(() => {
                textOverlay.remove();
                if (onComplete) onComplete();
            }, 300);
        }, 15000);
    }

    // Ajouter les animations CSS si pas déjà présentes
    if (!document.getElementById('senseiAnimations')) {
        const style = document.createElement('style');
        style.id = 'senseiAnimations';
        style.textContent = `
            @keyframes bubbleAppear {
                from {
                    opacity: 0;
                    transform: translateX(-50%) translateY(10px);
                }
                to {
                    opacity: 1;
                    transform: translateX(-50%) translateY(0);
                }
            }
            @keyframes bubbleDisappear {
                from {
                    opacity: 1;
                    transform: translateX(-50%) translateY(0);
                }
                to {
                    opacity: 0;
                    transform: translateX(-50%) translateY(-10px);
                }
            }
        `;
        document.head.appendChild(style);
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
        const response = await fetch('index.php?controller=game&action=save', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                hintsUsed: hintsUsed,
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

        // Mettre à jour l'emote du sensei toutes les 10 secondes pour réagir au temps passé
        if (elapsed % 10 === 0 && elapsed > 0) {
            const senseiImg = document.getElementById('senseiImage');
            if (senseiImg) {
                const newEmote = getSenseiEmoteFromStats();
                senseiImg.src = `image.php?f=emotes_sensei/${newEmote}.png`;
                senseiImg.alt = newEmote;
            }
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