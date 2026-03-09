<div class="container my-5" style="transform: none; box-shadow: none;">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4" style="transition: none; box-shadow: none !important; transform: none;">
                <h2 class="text-center mb-4"><i class="bi bi-box-arrow-in-right"></i> Connexion</h2>

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
                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        <i class="bi bi-box-arrow-in-right"></i> Se connecter
                    </button>
                </form>

                <p class="text-center text-muted">
                    Pas encore de compte ? <a href="index.php?controller=auth&action=register">Inscrivez-vous</a>
                </p>
            </div>
        </div>
    </div>
</div>
