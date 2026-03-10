<div class="py-5" style="min-height: 80vh; background: linear-gradient(135deg, #2c3e50, #3498db);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center text-white mb-5">
                    <h1 class="display-4 fw-bold mb-3">Sélectionnez votre niveau</h1>
                    <p class="lead mb-0">Choisissez la difficulté et lancez votre défi!</p>
                </div>

                <div class="row g-4">
                    <!-- Facile -->
                    <div class="col-md-4">
                        <a href="index.php?controller=game&action=play&difficulty=easy"
                            class="text-decoration-none h-100">
                            <div class="card h-100 border-0 shadow-lg transition-all"
                                style="cursor: pointer; transform: scale(1); transition: all 0.3s ease;">
                                <div class="card-body text-center p-5">
                                    <div class="mb-3" style="font-size: 3rem; color: #27ae60;">
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <h5 class="card-title fw-bold mb-2">Facile</h5>
                                    <p class="card-text text-muted mb-3">
                                        Grille 4x4<br>
                                        Parfait pour débuter
                                    </p>
                                    <span class="badge bg-success">Recommandé</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Moyen -->
                    <div class="col-md-4">
                        <a href="index.php?controller=game&action=play&difficulty=medium"
                            class="text-decoration-none h-100">
                            <div class="card h-100 border-0 shadow-lg transition-all"
                                style="cursor: pointer; transform: scale(1); transition: all 0.3s ease;">
                                <div class="card-body text-center p-5">
                                    <div class="mb-3" style="font-size: 3rem; color: #f39c12;">
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <h5 class="card-title fw-bold mb-2">Moyen</h5>
                                    <p class="card-text text-muted mb-3">
                                        Grille 6x6<br>
                                        Pour les joueurs expérimentés
                                    </p>
                                    <span class="badge bg-warning">Stimulant</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Difficile -->
                    <div class="col-md-4">
                        <a href="index.php?controller=game&action=play&difficulty=hard"
                            class="text-decoration-none h-100">
                            <div class="card h-100 border-0 shadow-lg transition-all"
                                style="cursor: pointer; transform: scale(1); transition: all 0.3s ease;">
                                <div class="card-body text-center p-5">
                                    <div class="mb-3" style="font-size: 3rem; color: #e74c3c;">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <h5 class="card-title fw-bold mb-2">Difficile</h5>
                                    <p class="card-text text-muted mb-3">
                                        Grille 8x8<br>
                                        Pour les vrais ninjas
                                    </p>
                                    <span class="badge bg-danger">Expert</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="index.php?controller=home" class="btn btn-outline-light">
                        <i class="bi bi-arrow-left"></i> Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .transition-all:hover {
        transform: scale(1.05) !important;
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.3) !important;
    }
</style>