<div class="py-5" style="min-height: 80vh; background: linear-gradient(135deg, #2c3e50, #3498db); display: flex; align-items: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body text-center p-5">
                        <div class="mb-4" style="font-size: 4rem; color: #e74c3c;">
                            <i class="bi bi-exclamation-triangle"></i>
                        </div>
                        <h2 class="fw-bold mb-3">Erreur</h2>
                        <p class="text-muted mb-4">
                            <?php echo htmlspecialchars($error); ?>
                        </p>
                        <a href="index.php?controller=game" class="btn btn-primary btn-lg">
                            <i class="bi bi-arrow-left"></i> Retour à la sélection
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>