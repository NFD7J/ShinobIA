<!-- Hero -->
<div class="py-5 text-center text-white" style="background: linear-gradient(135deg, #2c3e50, #3498db);">
    <div class="container">
        <div class="mb-3" style="font-size: 5rem;">
            <span style="display:inline-grid;grid-template-columns:repeat(4,1fr);gap:4px;vertical-align:middle;">
                <span class="rounded" style="width:28px;height:28px;background:#fff;opacity:.9;"></span>
                <span class="rounded" style="width:28px;height:28px;background:#3498db;"></span>
                <span class="rounded" style="width:28px;height:28px;background:#fff;opacity:.9;"></span>
                <span class="rounded" style="width:28px;height:28px;background:#3498db;"></span>
                <span class="rounded" style="width:28px;height:28px;background:#3498db;"></span>
                <span class="rounded" style="width:28px;height:28px;background:#fff;opacity:.9;"></span>
                <span class="rounded" style="width:28px;height:28px;background:#3498db;"></span>
                <span class="rounded" style="width:28px;height:28px;background:#fff;opacity:.9;"></span>
            </span>
        </div>
        <h1 class="display-4 fw-bold">Binero</h1>
        <p class="lead mb-4">Le puzzle logique de 0 et de 1 — Testez votre raisonnement, battez vos records.</p>
        <?php if (!isset($_SESSION['user'])): ?>
            <a href="index.php?controller=auth&action=register" class="btn btn-light btn-lg me-2 fw-semibold">
                <i class="bi bi-person-plus"></i> Créer un compte
            </a>
            <a href="index.php?controller=auth&action=login" class="btn btn-outline-light btn-lg">
                <i class="bi bi-box-arrow-in-right"></i> Se connecter
            </a>
        <?php else: ?>
            <a href="index.php?controller=game" class="btn btn-light btn-lg fw-semibold">
                <i class="bi bi-play-fill"></i> Jouer maintenant
            </a>
        <?php endif; ?>
    </div>
</div>

<!-- Comment jouer -->
<div class="container my-5">
    <h2 class="text-center fw-bold mb-4">Comment jouer ?</h2>
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card h-100 p-4 text-center" style="transition:none;box-shadow:none !important;transform:none;">
                <div class="mb-3" style="font-size:2.5rem; color:#3498db;"><i class="bi bi-grid-3x3"></i></div>
                <h5 class="fw-bold">Remplissez la grille</h5>
                <p class="text-muted">Chaque case doit contenir un <strong>0</strong> ou un <strong>1</strong>.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 p-4 text-center" style="transition:none;box-shadow:none !important;transform:none;">
                <div class="mb-3" style="font-size:2.5rem; color:#3498db;"><i class="bi bi-list-ol"></i></div>
                <h5 class="fw-bold">Respectez les règles</h5>
                <p class="text-muted">Pas plus de deux chiffres identiques consécutifs. Chaque ligne et colonne contient autant de 0 que de 1.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 p-4 text-center" style="transition:none;box-shadow:none !important;transform:none;">
                <div class="mb-3" style="font-size:2.5rem; color:#3498db;"><i class="bi bi-trophy"></i></div>
                <h5 class="fw-bold">Grimpez au classement</h5>
                <p class="text-muted">Résolvez les grilles le plus vite possible et dominez le <a href="index.php?controller=leaderboard">leaderboard</a>.</p>
            </div>
        </div>
    </div>
</div>

<!-- Appel à l'action bas de page -->
<div class="bg-light border-top py-5 text-center">
    <div class="container">
        <h3 class="fw-bold mb-2">Prêt à relever le défi ?</h3>
        <p class="text-muted mb-4">Rejoignez la communauté et prouvez que la logique est votre force.</p>
        <?php if (!isset($_SESSION['user'])): ?>
            <a href="index.php?controller=auth&action=register" class="btn btn-primary btn-lg">
                <i class="bi bi-person-plus"></i> Commencer gratuitement
            </a>
        <?php else: ?>
            <a href="index.php?controller=game" class="btn btn-primary btn-lg">
                <i class="bi bi-controller"></i> Lancer une partie
            </a>
        <?php endif; ?>
    </div>
</div>

