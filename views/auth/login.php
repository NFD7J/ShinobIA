<style>
    main{
        background-image: url('../views/game/images/bckgrd_bois.jpg'), linear-gradient(180deg, #f8f6f1 0%, #f0ebe3 100%);
        background-size: cover;
        background-position: center;
    }
    .login-container {
        min-height: 100vh;
        position: relative;
        background-color: #fae4c1;
        width: 66%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 90px 20px 50px 20px;
    }

    .login-logo {
        margin-bottom: 40px;
        text-align: center;

    }

    .login-logo img {
        max-height: 170px;
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
        padding: 40px;
        padding-top: 56px;
        flex: 0 0 400px;
    }
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .login-form-card h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
        font-size: 1.8rem;
    }

    .input-group-text {
        height: 56px;
        position: absolute;
        background: none;
        border: none;
        color: #a82a2a;
        z-index: 1;
    }
    .input-group-text.masque {
        left: -33px;
    }
    .input-group-text.rouleau {
        left: -21px;
    }
    .input-group-text img {
        height: 125%;
        width: auto;
    }
    .input-group-text.masque img {
        height: 137%;
        transform: translateY(-5px);
    }

    .input-group{
        position: relative;
        display: flex;
        align-items: center;
    }

    .form-control {
        background-color: #fff1db;
        border: 1px solid #a82a2a;
        border-radius: 0 20px 20px 0;
        padding-left: 30px;
        width: 280px !important;
        height: 48px;
        font-family: "Montserrat", sans-serif;
        font-weight: 400;
        font-style: italic;
    }
    .form-control::placeholder {
        text-align: center;
    }

    .form-control:focus {
        border-color: #a82a2a;
        background: none;
        box-shadow: none;
        z-index: 0 !important;
    }

    .login-form-card .btn-primary {
        border: none;
        font-weight: 600;
    }

    .btn-primary{
        border-radius: 20px;
        width: 240px;
        padding: 10px;
        margin-top: 104px;
        background-color: #a82a2a;
        font-family: "Montserrat", sans-serif;
        font-weight: 700;
        font-size: 20px;
    }
    .btn-primary:hover {
        background-color: #922020;
    }
    
    .text-muted {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 0;
    }
    
     .text-muted a {
        color: #a82a2a;
        font-weight: 400;
        font-family: "Montserrat", sans-serif;
    }

    .login-sensei {
        position: absolute;
        bottom: 50px;
        right: 10px;
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

            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle"></i> <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="index.php?controller=auth&action=login">
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text masque"><img src="image.php?f=icons/user_account_masque.png" alt="Email Icon"></span>
                        <input type="email" class="form-control" id="mail" name="mail" placeholder="votre@email.fr" required>
                    </div>
                </div>

                <div>
                    <div class="input-group">
                        <span class="input-group-text rouleau"><img src="image.php?f=icons/mdp_rouleau.png" alt="Password Icon"></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Connexion
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