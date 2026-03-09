<?php
// Affichage de la page du classement des parties du binairo
?>

<!-- Hero section -->
<div class="hero-section">
    <div class="container text-center">
        <h1 class="fw-bold mb-2">
            <i class="bi bi-trophy-fill text-warning me-2"></i>Classement Binairo
        </h1>
        <p class="mb-0 opacity-75">Les meilleures performances des joueurs</p>
    </div>
</div>

<div class="container pb-5">
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr style="background: linear-gradient(135deg, var(--primary), #34495e); color: white;">
                        <th class="px-4 py-3 rounded-top-start">Rang</th>
                        <th class="py-3">Joueur</th>
                        <th class="py-3">Difficulté</th>
                        <th class="py-3">Total de points</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($leaderboard as $index => $entry): ?>
                        <tr class="<?php echo $index === 0 ? 'table-warning fw-bold' : ''; ?>">
                            <!-- Médailles pour le top 3 -->
                            <td class="px-4">
                                <?php if ($index === 0): ?>
                                    <span class="badge rounded-pill fs-6" style="background-color: #FFD700; color: #333;">
                                        <i class="bi bi-trophy-fill"></i> 1
                                    </span>
                                <?php elseif ($index === 1): ?>
                                    <span class="badge rounded-pill fs-6" style="background-color: #C0C0C0; color: #333;">
                                        <i class="bi bi-trophy-fill"></i> 2
                                    </span>
                                <?php elseif ($index === 2): ?>
                                    <span class="badge rounded-pill fs-6" style="background-color: #CD7F32; color: white;">
                                        <i class="bi bi-trophy-fill"></i> 3
                                    </span>
                                <?php else: ?>
                                    <span class="text-muted fw-semibold"><?php echo $index + 1; ?></span>
                                <?php endif; ?>
                            </td>

                            <!-- Joueur : avatar initiale + user_id -->
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                                         style="width:38px; height:38px; background-color: var(--secondary); font-size: 1rem; flex-shrink:0;">
                                        <?php echo strtoupper(substr((string)$entry->getUserName(), 0, 1)); ?>
                                    </div>
                                    <span><?php echo htmlspecialchars($entry->getUsername()); ?></span>
                                </div>
                            </td>

                            <!-- Difficulté avec badge coloré -->
                            <td>
                                <?php
                                    $diff = strtolower($entry->getDifficulty());
                                    $badgeClass = match($diff) {
                                        'facile'  => 'bg-success',
                                        'moyen'   => 'bg-warning text-dark',
                                        'difficile' => 'bg-danger',
                                        default   => 'bg-secondary'
                                    };
                                ?>
                                <span class="badge <?php echo $badgeClass; ?> rounded-pill px-3">
                                    <?php echo htmlspecialchars($entry->getDifficulty()); ?>
                                </span>
                            </td>

                            <!-- Points -->
                            <td>
                                <span class="fw-semibold" style="color: var(--secondary);">
                                    <i class="bi bi-star-fill text-warning me-1"></i>
                                    <?php echo $entry->getTotalPoints(); ?> pts
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if (empty($leaderboard)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-emoji-neutral fs-1 d-block mb-2"></i>
                                Aucune partie enregistrée pour le moment.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>