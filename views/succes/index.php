<?php //Affichage de la page de succès 
?>

<style>
    main {
        background-image: url('../views/game/images/bckgrd_bois.jpg'), linear-gradient(180deg, #f8f6f1 0%, #f0ebe3 100%);
        background-size: cover;
        background-position: center;
    }

    .successes-container {
        min-height: 100vh;
        position: relative;
        background-color: #fae4c1;
        width: 80%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        padding: 50px 40px;
    }

    .successes-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .successes-logo {
        max-height: 250px;
        width: auto;
        margin-bottom: 1rem;
    }

    .successes-header h1 {
        color: #2c3e50;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .successes-header p {
        color: #555;
        font-size: 1.1rem;
    }

    .successes-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 1.4rem;
        padding: 2rem 0;
    }

    .success-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 1.8rem 1.2rem 1.4rem;
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 2px 14px rgba(0, 0, 0, 0.07);
        transition: transform 0.2s, box-shadow 0.2s;
        position: relative;
    }

    .success-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.12);
    }

    /* === DÉBLOQUÉ === */
    .success-card.unlocked .success-image {
        width: 80px;
        height: 80px;
        object-fit: contain;
        margin-bottom: 0.8rem;
        filter: drop-shadow(0 2px 6px rgba(243, 156, 18, 0.45));
    }

    .success-card.unlocked .success-icon {
        font-size: 2.8rem;
        color: #f39c12;
        margin-bottom: 0.8rem;
        filter: drop-shadow(0 2px 6px rgba(243, 156, 18, 0.45));
    }

    .success-card.unlocked .success-name {
        font-size: 1rem;
        font-weight: 700;
        color: #a82a2a;
        margin: 0 0 0.4rem;
    }

    .success-card.unlocked .success-desc {
        font-size: 0.82rem;
        color: #555;
        margin: 0 0 0.8rem;
        flex: 1;
    }

    .badge-unlocked {
        font-size: 0.75rem;
        color: #fff;
        background: #a82a2a;
        border-radius: 20px;
        padding: 0.3rem 0.9rem;
        font-weight: 600;
    }

    /* === VERROUILLÉ === */
    .success-card.locked {
        background: #f4f4f4;
        box-shadow: none;
    }

    .success-card.locked .success-image {
        width: 80px;
        height: 80px;
        object-fit: contain;
        margin-bottom: 0.8rem;
        opacity: 0.4;
        filter: grayscale(100%);
    }

    .success-card.locked .success-icon {
        font-size: 2.8rem;
        color: #ccc;
        margin-bottom: 0.8rem;
    }

    .success-card.locked .success-name {
        font-size: 1rem;
        font-weight: 700;
        color: #aaa;
        margin: 0 0 0.4rem;
    }

    .success-card.locked .success-desc {
        font-size: 0.82rem;
        color: #bbb;
        margin: 0 0 0.8rem;
        flex: 1;
    }

    .unlock-hint {
        font-size: 0.74rem;
        color: #999;
        font-style: italic;
        background: #ebebeb;
        border-radius: 8px;
        padding: 0.35rem 0.7rem;
        line-height: 1.4;
    }

    .lock-icon {
        position: absolute;
        top: 12px;
        right: 14px;
        font-size: 0.85rem;
        color: #ccc;
    }

    /* Barre de progression */
    .progress-bar-wrap {
        background: #e9ecef;
        border-radius: 20px;
        height: 10px;
        overflow: hidden;
        margin-bottom: 0.3rem;
    }

    .progress-bar-fill {
        height: 100%;
        background: #a82a2a;
    }
</style>

<div class="successes-container">

    <div class="successes-header">
        <img src="image.php?f=succes/sensei_success_logo.png" alt="ShinoBinairo Logo" class="successes-logo">
        <h1>
            Succès
        </h1>
        <p>
            <?php if (isset($_SESSION['user'])): ?>
                <?php
                $unlocked = isset($successes) ? count(array_filter($successes, fn($s) => $s->isUnlocked())) : 0;
                $total    = isset($successes) ? count($successes) : 0;
                ?>
                <?= $unlocked ?> / <?= $total ?> débloqué<?= $unlocked > 1 ? 's' : '' ?>
            <?php else: ?>
                Connectez-vous pour suivre votre progression
            <?php endif; ?>
        </p>
    </div>

    <?php if (isset($_SESSION['user']) && isset($successes)): ?>
        <div class="mb-4" style="max-width: 420px;">
            <div class="d-flex justify-content-between small text-muted mb-1">
                <span>Progression globale</span>
                <span><?= $unlocked ?> / <?= $total ?></span>
            </div>
            <div class="progress-bar-wrap">
                <div class="progress-bar-fill"
                    style="width: <?= $total > 0 ? round($unlocked / $total * 100) : 0 ?>%">
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($successes) && count($successes) > 0): ?>
        <div class="successes-grid">
            <?php foreach ($successes as $s): ?>
                <?php $isUnlocked = isset($_SESSION['user']) && $s->isUnlocked(); ?>
                <div class="success-card <?= $isUnlocked ? 'unlocked' : 'locked' ?>">

                    <?php if (!$isUnlocked): ?>
                        <i class="bi bi-lock-fill lock-icon"></i>
                    <?php endif; ?>

                    <img src="image.php?f=succes/<?= htmlspecialchars($s->getIcon()) ?>" alt="<?= htmlspecialchars($s->getName()) ?>" class="success-image">
                    <p class="success-name"><?= htmlspecialchars($s->getName()) ?></p>
                    <p class="success-desc"><?= htmlspecialchars($s->getDescription()) ?></p>

                    <?php if ($isUnlocked): ?>
                        <span class="badge-unlocked">Débloqué</span>
                    <?php else: ?>
                        <span class="unlock-hint">
                            &#128274; <?= htmlspecialchars($s->getUnlockHint()) ?>
                        </span>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
        <div class="text-center py-5 text-muted">
            <i class="bi bi-trophy" style="font-size:3rem; opacity:0.3;"></i>
            <p class="mt-3">Aucun succès disponible pour le moment.</p>
        </div>
    <?php endif; ?>

</div>