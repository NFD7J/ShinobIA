<div class="py-5 bckgrd-bois" style="min-height: 80vh;">
    <div class="main_container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="logo_container" style="text-align: center;">

                    <img src="image.php?f=logo_dark_shadow.png" alt="Logo" class="mb-3" style="width: 615px; height: 215px; margin-top: 112px; margin-bottom: 98px; ">
                    <h1 class="mb-4">SELECTIONNEZ VOTRE TAILLE DE GRILLE</h1>
                </div>

                <div class="row g-4 justify-content-center" style="gap: 1.5rem 0;">
                    <!-- Facile -->
                    <div class="col-md-4">
                        <a href="index.php?controller=game&action=play&difficulty=easy"
                            class="text-decoration-none h-100">
                            <div style="width: 80%; margin: 0 auto; position: relative;">
                                <img src="image.php?f=sensei_kawaii_crop.png" alt="Sensei kawaii" style="width: 100px; object-fit: contain; margin-bottom: -1px; display: block;">
                            </div>
                            <div class="card shadow-lg transition-all"
                                style="cursor: pointer; transform: scale(1); transition: all 0.3s ease;">
                                <div class="card-body text-center p-3">
                                    <div class="d-flex align-items-center mb-1">
                                        <img src="image.php?f=difficulty/niveau_facile_genin.png" alt="Facile" style="width: 55px; height: 55px; object-fit: contain; margin-right: 8px;">
                                        <h5 class="card-title mb-0 rank_title">Genin</h5>
                                    </div>
                                    <h5 class="card-title fw-bold mb-1">Facile</h5>
                                    <p class="card-text text-muted mb-2">
                                        Grille 6x6<br>
                                        Parfait pour débuter
                                    </p>
                                    <img src="image.php?f=difficulty/grille_6x6.png" alt="grille 6x6" style="max-width: 100%; max-height: 90px; object-fit: contain;">
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Moyen -->
                    <div class="col-md-4">
                        <a href="index.php?controller=game&action=play&difficulty=medium"
                            class="text-decoration-none h-100">
                            <div style="height: 137.95px;"></div>
                            <div class="card shadow-lg transition-all"
                                style="cursor: pointer; transform: scale(1); transition: all 0.3s ease;">
                                <div class="card-body text-center p-3">
                                    <div class="d-flex align-items-center mb-1">
                                        <img src="image.php?f=difficulty/niveau_moyen_chunin.png" alt="Moyen" style="width: 55px; height: 55px; object-fit: contain; margin-right: 8px;">
                                        <h5 class="card-title mb-0 rank_title">Chunin</h5>
                                    </div>
                                    <h5 class="card-title fw-bold mb-1">Moyen</h5>
                                    <p class="card-text text-muted mb-2">
                                        Grille 8x8<br>
                                        Pour les joueurs expérimentés
                                    </p>
                                    <img src="image.php?f=difficulty/grille_8x8.png" alt="grille 8x8" style="max-width: 100%; max-height: 90px; object-fit: contain;">
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Difficile -->
                    <div class="col-md-4">
                        <a href="index.php?controller=game&action=play&difficulty=hard"
                            class="text-decoration-none h-100">
                            <div style="height: 137.95px;"></div>
                            <div class="card shadow-lg transition-all"
                                style="cursor: pointer; transform: scale(1); transition: all 0.3s ease;">
                                <div class="card-body text-center p-3">
                                    <div class="d-flex align-items-center mb-1">
                                        <img src="image.php?f=difficulty/niveau_difficile_jonin.png" alt="Difficile" style="width: 55px; height: 55px; object-fit: contain; margin-right: 8px;">
                                        <h5 class="card-title mb-0 rank_title">Jonin</h5>
                                    </div>
                                    <h5 class="card-title fw-bold mb-1">Difficile</h5>
                                    <p class="card-text text-muted mb-2">
                                        Grille 10x10<br>
                                        Pour les vrais ninjas
                                    </p>
                                    <img src="image.php?f=difficulty/grille_10x10.png" alt="grille 10x10" style="max-width: 100%; max-height: 90px; object-fit: contain;">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="index.php?controller=home" class="btn btn-outline-light">
                        <p>Retour à l'accueil</p>


                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');


    h1 {
        color: #000000;
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        font-size: 18px;
        text-align: center;
    }

    .transition-all:hover {
        transform: scale(1.05) !important;
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.3) !important;
    }

    .rank_title {
        color: #A82A2A;
        font-family: 'Valentine Season', cursive;
        font-weight: normal;
        font-size: 3rem;
    }

    .main_container {
        background-color: #fae4c1;
        height: 100%;
        max-width: 80%;
        margin: 0 auto;
    }

    .card {
        width: 80%;
        margin: 0 auto;
        height: 344px;
        background-color: #fff1db;
        border-radius: 20px !important;
        border: 2px solid #a82a2a !important;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15) !important;
    }

    .card p {
        font-size: 0.7rem;
        width: 100%;
    }

    .py-5 {
        flex: 1;
        background-image: url('image.php?f=bckgrd_bois.jpg');
        /* background-color: #fae4c1; */
        /* background-color: #A82A2A; */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding: 0 !important;
    }

    .btn {
        font-family: ' ', cursive;
        font-size: 0.8rem;
        border-radius: 20px;
        border: 2px solid #a82a2a !important;
        color: #A82A2A !important;
        background-color: #fff1db !important;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 240px;
        height: 56px;
        margin: 0 auto;
        margin-bottom: 5rem;
    }

    .btn:hover {
        background-color: #a82a2a !important;
        color: #fff !important;
    }
</style>