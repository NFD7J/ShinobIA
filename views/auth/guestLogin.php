<div class="container guest-login-container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <h1 class="card-title text-center mb-4">
                        <img src="image.php?f=logo_dark_shadow.png" alt="ShinobIA" style="height: 50px; margin-right: 10px;">
                        Jouer en Guest
                    </h1>

                    <p class="text-center text-muted mb-4">
                        Entrez un pseudonyme pour commencer à jouer et apparaître dans le classement!
                    </p>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="bi bi-exclamation-triangle"></i> <?= $error ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="index.php?controller=auth&action=guestLogin">
                        <div class="mb-3">
                            <label for="guest_name" class="form-label">Pseudonyme</label>
                            <input type="text"
                                class="form-control form-control-lg"
                                id="guest_name"
                                name="guest_name"
                                placeholder="Ex: Ninja123, ShinobiMaster..."
                                maxlength="30"
                                required>
                            <small class="form-text text-muted">Min 3 caractères, Max 30</small>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                            <i class="bi bi-play-fill"></i> COMMENCER À JOUER
                        </button>
                    </form>

                    <hr>

                    <p class="text-center text-muted">
                        Vous avez un compte?
                        <a href="index.php?controller=auth&action=login">Se connecter</a>
                    </p>
                    <p class="text-center text-muted">
                        Pas encore de compte?
                        <a href="index.php?controller=auth&action=register">S'inscrire</a>
                    </p>

                    <div class="alert alert-info mt-4">
                        <small>
                            <strong>💡 Astuce:</strong> En tant que guest, votre score apparaîtra dans le classement
                            avec votre pseudonyme. Vous pourrez créer un compte ultérieurement pour tracker vos progrès!
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-image: url('../views/game/images/bckgrd_bois.jpg'), linear-gradient(180deg, #f8f6f1 0%, #f0ebe3 100%);
        background-size: cover;
        background-position: center;
        min-height: 100vh;
    }

    main {
        background-color: transparent;
        padding-top: 0;
    }

    .guest-login-container {
        background-color: #fae4c1;
        padding: 40px;
        min-height: 100vh;
        border-radius: 0;
        width: 80%;
        margin: -100px auto 0 auto;
    }

    .card {
        border-radius: 20px;
        border: 2px solid #a82a2a;
        background-color: #fae4c1;
    }

    .card-title {
        color: #a82a2a;
        font-weight: 700;
    }

    .btn-primary {
        background-color: #a82a2a;
        border-color: #a82a2a;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #8b2222;
        border-color: #8b2222;
    }

    .form-control:focus {
        border-color: #a82a2a;
        box-shadow: 0 0 0 0.2rem rgba(168, 42, 42, 0.25);
    }

    a {
        color: #a82a2a;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .alert-info {
        background-color: #a82a2a;
        border-color: #8b2222;
        color: #fff;
    }
</style>