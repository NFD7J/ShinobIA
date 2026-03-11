<style>
    main {
        background-image: url('../views/game/images/bckgrd_bois.jpg'), linear-gradient(180deg, #f8f6f1 0%, #f0ebe3 100%);
        background-size: cover;
        background-position: center;
    }

    .home-container {
        min-height: 100vh;
        position: relative;
        background-color: #fae4c1;
        width: 80%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0 20px 50px 20px;
    }

    /* --- Hero section (logo + boutons) --- */
    .home-hero {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 112px;
    }

    .home-logo {
        text-align: center;
    }

    .home-logo img {
        max-height: 170px;
        width: auto;
    }

    .home-buttons {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        margin-top: 46px;
    }

    .home-buttons .btn-primary {
        border-radius: 20px;
        width: 240px;
        padding: 10px;
        background-color: #a82a2a;
        border: none;
        font-family: "Montserrat", sans-serif;
        font-weight: 700;
        font-size: 20px;
        text-decoration: none;
        text-align: center;
        color: #fff;
    }

    .home-buttons .btn-primary:hover {
        background-color: #922020;
    }

    .home-buttons .btn-outline {
        border-radius: 20px;
        width: 200px;
        padding: 8px;
        background-color: transparent;
        border: 2px solid #a82a2a;
        font-family: "Montserrat", sans-serif;
        font-weight: 600;
        font-size: 16px;
        color: #a82a2a;
        text-decoration: none;
        text-align: center;
    }

    .home-buttons .btn-outline:hover {
        background-color: #a82a2a;
        color: #fff;
    }

    /* --- Sensei + parchemin wrapper --- */
    .home-sensei-parchemin {
        position: relative;
        width: 100%;
        margin-top: 77px;
    }

    .home-sensei {
        position: absolute;
        bottom: 10px;
        left: 10px;
        z-index: 2;
    }

    .home-sensei img {
        max-height: 280px;
        width: auto;
        filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.2));
    }

    /* --- Parchemin --- */
    .parchemin-section {
        position: relative;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .parchemin-bg {
        width: 100%;
        max-width: 800px;
        display: block;
        position: absolute;
        z-index: 1;
        max-height: 650px;
    }

    .parchemin-content {
        z-index: 2;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        max-width: 580px;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 60px 30px 50px 30px;
        box-sizing: border-box;
        margin-left: 35rem;
        margin-top: 5rem;
    }

    .parchemin-content h2 {
        font-family: "Montserrat", sans-serif;
        font-weight: 800;
        font-size: 1.1rem;
        color: #2c3e50;
        text-align: center;
        margin-bottom: 6px;
        text-transform: uppercase;
    }

    .parchemin-content .parchemin-subtitle {
        font-family: "Montserrat", sans-serif;
        font-weight: 400;
        font-size: 0.72rem;
        color: #4b4b4b;
        text-align: center;
        margin-bottom: 18px;
        line-height: 1.4;
    }

    .parchemin-rules {
        display: flex;
        flex-direction: column;
        gap: 12px;
        width: 100%;
    }

    .parchemin-rule {
        background-color: rgba(255, 241, 219, 0.7);
        border: 1px solid #d4b990;
        border-radius: 14px;
        padding: 12px 18px;
    }

    .parchemin-rule h3 {
        font-family: "Montserrat", sans-serif;
        font-weight: 700;
        font-size: 0.85rem;
        color: #2c3e50;
        margin: 0 0 4px 0;
    }

    .parchemin-rule p {
        font-family: "Montserrat", sans-serif;
        font-weight: 400;
        font-size: 0.72rem;
        color: #4b4b4b;
        margin: 0;
        line-height: 1.4;
    }

    .parchemin-bottom {
        text-align: center;
        margin-top: 18px;
    }

    .parchemin-bottom h4 {
        font-family: "Montserrat", sans-serif;
        font-weight: 700;
        font-size: 0.85rem;
        color: #2c3e50;
        margin-bottom: 4px;
    }

    .parchemin-bottom p {
        font-family: "Montserrat", sans-serif;
        font-weight: 400;
        font-size: 0.68rem;
        color: #4b4b4b;
        margin: 0;
        line-height: 1.4;
    }
</style>

<div class="home-container">
    <!-- Hero : logo + boutons -->
    <div class="home-hero">
        <div class="home-logo">
            <img src="image.php?f=logo_dark_shadow.png" alt="ShinoBinairo">
        </div>

        <div class="home-buttons">
            <?php if (!isset($_SESSION['user'])): ?>
                <a href="index.php?controller=auth&action=login" class="btn-primary">CONNEXION</a>
                <a href="index.php?controller=auth&action=register" class="btn-outline">INSCRIPTION</a>
            <?php else: ?>
                <a href="index.php?controller=game&action=index" class="btn-primary">JOUER</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Sensei + Parchemin -->
    <div class="home-sensei-parchemin">

        <div class="parchemin-section">
            <img src="image.php?f=parchemin_860x1000.png" alt="Parchemin" class="parchemin-bg">
            <div class="parchemin-content">
                <h2>Comment jouer au Shinobinairo ?</h2>
                <p class="parchemin-subtitle">Équilibre la grille pour devenir un maître Ninja<br>en suivant les conseils du Sensei Nidō.</p>

                <div class="parchemin-rules">
                    <div class="parchemin-rule">
                        <h3>Remplissez la grille</h3>
                        <p>Chaque case doit contenir un <strong>Shuriken</strong> ✦ ou un <strong>Kunai</strong> 🗡</p>
                    </div>
                    <div class="parchemin-rule">
                        <h3>Respectez les règles</h3>
                        <p>Pas plus de deux symboles consécutifs identiques.<br>Chaque ligne contient autant de Shurikens que de Kunais.</p>
                    </div>
                    <div class="parchemin-rule">
                        <h3>La voie de l'excellence</h3>
                        <p>Résous les grilles avec l'agilité d'un ninja pour graver ton<br>nom au sommet du classement !</p>
                    </div>
                </div>

                <div class="parchemin-bottom">
                    <h4>Prêts à entrer dans la légende ?</h4>
                    <p>Rejoignez le clan Shinobinairo et prouvez que la logique<br>est votre arme la plus aiguisée.</p>
                </div>
            </div>
        </div>
    </div>
</div>