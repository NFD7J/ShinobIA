<style>
    main{
        background-image: url('../views/game/images/bckgrd_bois.jpg'), linear-gradient(180deg, #f8f6f1 0%, #f0ebe3 100%);
        background-size: cover;
        background-position: center;
    }
    .register-container {
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

    .register-logo {
        text-align: center;

    }

    .register-logo img {
        max-height: 170px;
        width: auto;
    }

    .register-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 60px;
        max-width: 1000px;
        margin-bottom: 40px;
    }

    .register-form-card {
        padding: 56px 40px 0 40px;
        flex: 0 0 400px;
    }
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .register-form-card h5 {
        color: #2c3e50;

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
        flex-direction: column;
    }

    .input-group span{
        font-size: 0.8rem;
        color: #4b4b4b;
        text-align: left;
        padding-left: 15px;
        width: 100%;
        font-family: "Montserrat", sans-serif;
        font-weight: 300;
    }

    .form-control {
        background-color: #fff1db;
        border: 1px solid #a82a2a;
        border-radius: 20px !important;
        padding-left: 30px;
        width: 300px !important;
        height: 48px;
        font-family: "Montserrat", sans-serif;
        font-weight: 400;
        font-style: italic;
    }
    .form-control::placeholder {
        text-align: start;
    }

    .form-control:focus {
        border-color: #a82a2a;
        background: none;
        box-shadow: none;
        z-index: 0 !important;
    }

    .register-form-card .btn-primary {
        border: none;
        font-weight: 600;
    }

    .btn-primary{
        border-radius: 20px;
        width: 240px;
        padding: 10px;
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
        font-weight: 500;
        font-family: "Montserrat", sans-serif;
    }

    .register-sensei {
        position: absolute;
        bottom: 10px;
        left: 10px;
        flex: 0 0 auto;
        text-align: center;
    }

    .register-sensei img {
        max-height: 350px;
        width: auto;
        filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.2));
    }
</style>

<div class="register-container">
    <!-- Logo en haut -->
    <div class="register-logo">
        <img src="image.php?f=logo_dark_shadow.png" alt="ShinoBinairo">
    </div>

    <!-- Layout: Formulaire + Sensei -->
    <div class="register-wrapper">
        <!-- Formulaire à droite -->
        <div class="register-form-card">
            <h5>Inscrivez-vous</h5>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle"></i> <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="index.php?controller=auth&action=register">
                <div>
                    <div class="input-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Pseudo*" required>
                    </div>
                </div>

                <div>
                    <div class="input-group">
                        <input type="email" class="form-control" id="mail" name="mail" placeholder="votre@email.fr*" required>
                    </div>
                </div>

                <div>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe*" required>
                        <span style="font-weight: 400;">Votre mot de passe doit contenir :</span>
                        <span  id="nb">- 12 caractère minimum</span>
                        <span  id="maj_int">- 1 majuscule et 1 chiffre</span>
                        <span  id="special">- 1 caractère spécial</span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Inscription
                </button>
            </form>

            <p class="text-muted">
                Déjà un compte ? <a href="index.php?controller=auth&action=login">Connectez-vous</a>
            </p>
        </div>

        <!-- Sensei à gauche -->
        <div class="register-sensei">
            <img src="image.php?f=sensei_inscription.png" alt="Sensei Inscription">
        </div>
    </div>
</div>
<script>
    const passwordInput = document.getElementById('password');
    passwordInput.addEventListener('input', function() {
        const value = passwordInput.value;
        document.getElementById('nb').style.color = value.length >= 12 ? 'green' : '#4b4b4b';
        document.getElementById('maj_int').style.color = /[A-Z]/.test(value) && /\d/.test(value) ? 'green' : '#4b4b4b';
        document.getElementById('special').style.color = /[!@#$%^&*(),.?":{}|<>]/.test(value) ? 'green' : '#4b4b4b';
    });
</script>