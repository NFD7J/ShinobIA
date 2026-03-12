<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'ShinoBinairo' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-Thin.ttf') format('truetype');
            font-weight: 100;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-ThinItalic.ttf') format('truetype');
            font-weight: 100;
            font-style: italic;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-ExtraLight.ttf') format('truetype');
            font-weight: 200;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-ExtraLightItalic.ttf') format('truetype');
            font-weight: 200;
            font-style: italic;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-Light.ttf') format('truetype');
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-LightItalic.ttf') format('truetype');
            font-weight: 300;
            font-style: italic;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-Regular.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-Italic.ttf') format('truetype');
            font-weight: 400;
            font-style: italic;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-Medium.ttf') format('truetype');
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-MediumItalic.ttf') format('truetype');
            font-weight: 500;
            font-style: italic;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-SemiBold.ttf') format('truetype');
            font-weight: 600;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-SemiBoldItalic.ttf') format('truetype');
            font-weight: 600;
            font-style: italic;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-Bold.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-BoldItalic.ttf') format('truetype');
            font-weight: 700;
            font-style: italic;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-ExtraBold.ttf') format('truetype');
            font-weight: 800;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-ExtraBoldItalic.ttf') format('truetype');
            font-weight: 800;
            font-style: italic;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-Black.ttf') format('truetype');
            font-weight: 900;
            font-style: normal;
        }

        @font-face {
            font-family: 'Montserrat';
            src: url('public/fonts/montserra/Montserrat-BlackItalic.ttf') format('truetype');
            font-weight: 900;
            font-style: italic;
        }

        @font-face {
            font-family: 'Valentine Season';
            src: url('fonts/valentine%20season.ttf') format('truetype');
        }

        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --bg-light: #f8f9fa;
        }

        body {
            font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }



        .navbar {
            background: #a82a2a;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
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
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.12);
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

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
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
            background: #a82a2a;
            color: rgba(255, 255, 255, 0.7);
            padding: 1.5rem 0;
            margin-top: auto;
            z-index: 1000;
        }

        main {
            flex: 1;
        }

        .book-icon {
            font-size: 4rem;
            color: var(--secondary);
            opacity: 0.3;
        }

        .navbar-nav .nav-item {
            margin-right: 1.5rem;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            color: #fae4c1;
        }

        .navbar-brand {
            margin-right: 5rem;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            object-fit: contain;
            vertical-align: middle;
        }

        /* === MODAL DÉCONNEXION === */
        .modal-content {
            background-color: #fae4c1;
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            padding: 1.5rem;
            background-color: #fae4c1;
            justify-content: center;
            position: relative;
        }

        .modal-title {
            color: #a82a2a;
            font-weight: 700;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            text-align: center;
        }

        .modal-title img {
            width: 28px;
            height: 28px;
            object-fit: contain;
        }

        .btn-close {
            filter: invert(0.3);
            position: absolute;
            right: 1.5rem;
            top: 1.5rem;
        }

        .modal-body {
            color: #555;
            font-size: 1rem;
            padding: 2rem 1.5rem;
            text-align: center;
        }

        .modal-footer {
            background-color: #fae4c1;
            padding: 1.2rem;
            gap: 0.8rem;
        }

        .modal-footer .btn-secondary {
            background-color: #fae4c1;
            border: 1px solid #6d6d6d;
            border-radius: 20px;
            color: #6d6d6d;
            font-weight: 600;
            padding: 0.6rem 1.6rem;
            transition: background-color 0.2s;
        }

        .modal-footer .btn-secondary:hover {
            background-color: #7a7a7a;
        }

        .modal-footer .btn-danger {
            background-color: #a82a2a;
            border: none;
            border-radius: 20px;
            color: #fff;
            font-weight: 600;
            padding: 0.6rem 1.6rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: background-color 0.2s;
            text-decoration: none;
        }

        .modal-footer .btn-danger:hover {
            background-color: #8a2222;
            color: #fff;
        }
    </style>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="image.php?f=logo_header.png" alt="ShinobIA">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"></i>Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=game"></i>Grille</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=leaderboard"></i>Classement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=succes"></i>Succès</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php if (isset($_SESSION["user"])): ?>
                        <li class="nav-item">
                            <span class="nav-link">
                                <img src="image.php?f=icons/user_account_masque.png" alt="User" style="height: 20px; object-fit: contain; margin-right: 8px; vertical-align: middle;"> <?= htmlspecialchars($_SESSION["user"]["name"]) ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalLogout">
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
            <p class="mb-0"><img src="image.php?f=logo_header.png" alt="ShinobIA" style="height:20px; vertical-align:middle; margin-right:8px;">&copy; <?= date('Y') ?> ShinobIA — Tous droits réservés.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Modal déconnexion -->
    <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="modalLogoutLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLogoutLabel">
                        <img src="image.php?f=logout_torii.png" alt="Logout Icon">
                        Déconnexion
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir vous déconnecter ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <a href="index.php?controller=auth&action=logout" class="btn btn-danger">
                        <i class="bi bi-box-arrow-right"></i> Se déconnecter
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>