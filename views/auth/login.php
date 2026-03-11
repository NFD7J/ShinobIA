<style>
    .login-container {
        background: linear-gradient(180deg, #f8f6f1 0%, #f0ebe3 100%);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px 20px;
    }

    .login-logo {
        margin-bottom: 40px;
        text-align: center;
    }

    .login-logo img {
        max-height: 100px;
        width: auto;
    }

    .login-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 60px;
        max-width: 1000px;
        margin-bottom: 40px;
    }

    .login-form-card {
        background: white;
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        flex: 0 0 400px;
    }

    .login-form-card h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
        font-size: 1.8rem;
    }

    .login-form-card .form-label {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .login-form-card .input-group-text {
        background: #f0ebe3;
        border: none;
        color: #3498db;
    }

    .login-form-card .form-control {
        border: 1px solid #ddd;
    }

    .login-form-card .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    .login-form-card .btn-primary {
        background: #3498db;
        border: none;
        font-weight: 600;
        padding: 10px;
        margin-top: 15px;
    }

    .login-form-card .btn-primary:hover {
        background: #2980b9;
    }

    .login-form-card .text-muted {
        text-align: center;
        margin-top: 20px;
    }

    .login-sensei {
        flex: 0 0 auto;
        text-align: center;
    }

    .login-sensei img {
        max-height: 350px;
        width: auto;
        filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.2));
    }
</style>

<div class="login-container">
    <!-- Logo en haut -->
    <div class="login-logo">
        <img src="image.php?f=logo_dark_shadow.png" alt="ShinoBinairo">
    </div>

    <!-- Layout: Formulaire + Sensei -->
    <div class="login-wrapper">
        <!-- Formulaire à gauche -->
        <div class="login-form-card">
            <h2><i class="bi bi-box-arrow-in-right"></i> Connexion</h2>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle"></i> <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="index.php?controller=auth&action=login">
                <div class="mb-3">
                    <label for="mail" class="form-label">Adresse email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="mail" name="mail" placeholder="votre@email.fr" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-box-arrow-in-right"></i> Se connecter
                </button>
            </form>

            <p class="text-muted">
                Pas encore de compte ? <a href="index.php?controller=auth&action=register">Inscrivez-vous</a>
            </p>
        </div>

        <!-- Sensei à droite -->
        <div class="login-sensei">
            <img src="image.php?f=sensei_connexion.png" alt="Sensei Connexion">
        </div>
    </div>
</div>