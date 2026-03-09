<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Bibliothèque' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --bg-light: #f8f9fa;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background: linear-gradient(135deg, var(--primary), #34495e) !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
        }
        .navbar-brand i {
            color: var(--secondary);
        }
        .hero-section {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 25px rgba(0,0,0,0.12);
        }
        .badge-disponible {
            background-color: #27ae60;
        }
        .badge-indisponible {
            background-color: var(--accent);
        }
        .badge-en-retard {
            background-color: var(--accent);
            animation: pulse 1.5s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        .btn-primary {
            background-color: var(--secondary);
            border-color: var(--secondary);
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        .stat-card {
            border-left: 4px solid var(--secondary);
        }
        .stat-card .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
        }
        footer {
            background: var(--primary);
            color: rgba(255,255,255,0.7);
            padding: 1.5rem 0;
            margin-top: auto;
        }
        main {
            flex: 1;
        }
        .book-icon {
            font-size: 4rem;
            color: var(--secondary);
            opacity: 0.3;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="bi bi-book"></i> BiblioCEFII
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="bi bi-house"></i> Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=livre"><i class="bi bi-journal-bookmark"></i> Catalogue</a>
                </li>
                <?php if (isset($_SESSION["user"])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=emprunt&action=mesEmprunts">
                            <i class="bi bi-bookmark-check"></i> Mes emprunts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=emprunt&action=historique">
                            <i class="bi bi-clock-history"></i> Historique
                        </a>
                    </li>
                    <?php if ($_SESSION["user"]["role"] === 'admin'): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-gear"></i> Administration
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?controller=admin"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=admin&action=emprunts"><i class="bi bi-list-check"></i> Emprunts en cours</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=admin&action=historique"><i class="bi bi-archive"></i> Historique global</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="index.php?controller=livre&action=gestion"><i class="bi bi-journal-bookmark"></i> Gestion des livres</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=user"><i class="bi bi-people"></i> Gestion des utilisateurs</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION["user"])): ?>
                    <li class="nav-item">
                        <span class="nav-link text-light">
                            <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION["user"]["prenom"] . ' ' . $_SESSION["user"]["nom"]) ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=auth&action=logout">
                            <i class="bi bi-box-arrow-right"></i> Déconnexion
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=auth&action=login">
                            <i class="bi bi-box-arrow-in-right"></i> Connexion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=auth&action=register">
                            <i class="bi bi-person-plus"></i> Inscription
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<?php if (isset($_SESSION["flash"])): ?>
    <div class="container mt-3">
        <div class="alert alert-<?= $_SESSION["flash"]["type"] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION["flash"]["message"] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
    <?php unset($_SESSION["flash"]); ?>
<?php endif; ?>

<main>
    <?= $content ?>
</main>

<footer>
    <div class="container text-center">
        <p class="mb-0"><i class="bi bi-book"></i> BiblioCEFII &copy; <?= date('Y') ?> — Votre bibliothèque en ligne</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
