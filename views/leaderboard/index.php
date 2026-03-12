<?php
// Affichage de la page du classement des parties du binairo

// Pré-filtrer les entrées par difficulté
$difficulties = [
    'easy'    => [],
    'medium'     => [],
    'hard' => [],
];
foreach ($leaderboard as $entry) {
    $key = strtolower($entry->getDifficulty());
    if (isset($difficulties[$key])) {
        $difficulties[$key][] = $entry;
    }
}
?>

<!-- Hero section -->
<div class="hero-section">
<div class="lb-wrapper">
    <div class="logo_container" style="text-align: center;">
        <img src="image.php?f=leaderboard/sensei_tropy_logo.png" alt="Logo" class="mb-3" style="width: 615px; height: 215px; margin-top: 112px; margin-bottom: 98px; ">
        <h1 class="mb-4">CLASSEMENT</h1>
        <p class="legende">Devenez une légende de ShinoBinairo</p>
    </div>
    


    <div class="px-4 pb-4">

    <!-- Onglets centrés -->
    <ul class="nav nav-tabs mb-0 justify-content-center" id="leaderboardTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="easy-tab" data-bs-toggle="tab" data-bs-target="#easy" type="button" role="tab">
                <img src="image.php?f=difficulty/niveau_facile_genin.png" alt="Facile" style="width: 33px; height: 33px; object-fit: contain; margin-right: 8px;"> Facile
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="medium-tab" data-bs-toggle="tab" data-bs-target="#medium" type="button" role="tab">
                <img src="image.php?f=difficulty/niveau_moyen_chunin.png" alt="Moyen" style="width: 33px; height: 33px; object-fit: contain; margin-right: 8px;"> Moyen
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="hard-tab" data-bs-toggle="tab" data-bs-target="#hard" type="button" role="tab">
                <img src="image.php?f=difficulty/niveau_difficile_jonin.png" alt="Difficile" style="width: 33px; height: 33px; object-fit: contain; margin-right: 8px;"> Difficile
            </button>
        </li>
    </ul>

    <div class="tab-content" id="leaderboardTabsContent">
        <?php foreach ($difficulties as $diff => $entries): ?>
            <div class="tab-pane fade <?php echo $diff === 'easy' ? 'show active' : ''; ?>"
                 id="<?php echo $diff; ?>" role="tabpanel">
                <div class="lb-card">
                    <div class="card-body p-0">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr class="lb-thead">
                                    <th class="px-4 py-3">RANG</th>
                                    <th class="py-3">JOUEUR</th>
                                    <th class="py-3">TEMPS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($entries as $index => $entry): ?>
                                    <tr>
                                        <td class="px-4">
                                            <?php if ($index === 0): ?>
                                                <span class="badge rounded-pill fs-6" style="background-color: #FFD700; color: #333;">
                                                    <img src="image.php?f=leaderboard/trophy_or.png" alt="Gold Trophy" style="width: 25px; height: 25px; object-fit: contain; margin-right: 4px;"> 1
                                                </span>
                                            <?php elseif ($index === 1): ?>
                                                <span class="badge rounded-pill fs-6" style="background-color: #C0C0C0; color: #333;">
                                                    <img src="image.php?f=leaderboard/trophy_argent.png" alt="Silver Trophy" style="width: 25px; height: 25px; object-fit: contain; margin-right: 4px;"> 2
                                                </span>
                                            <?php elseif ($index === 2): ?>
                                                <span class="badge rounded-pill fs-6" style="background-color: #CD7F32; color: white;">
                                                    <img src="image.php?f=leaderboard/trophy_bronze.png" alt="Bronze Trophy" style="width: 25px; height: 25px; object-fit: contain; margin-right: 4px;"> 3
                                                </span>
                                            <?php else: ?>
                                                <span class="badge rounded-pill fs-6" style="background-color: #fff1db; color: #333; border: 1.5px solid #e8c99a;">
                                                    <?php echo $index + 1; ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($entry->getUsername()); ?>
                                        </td>
                                        <td>
                                            <span class="fw-semibold" style="color: #000;">
                                                <i class="bi bi-stopwatch me-1"></i>
                                                <?php
                                                    $t = $entry->getTotalPoints();
                                                    echo sprintf('%d:%02d', intdiv($t, 60), $t % 60);
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <?php
                                    $shown = count($entries);
                                    $empty = max(0, 10 - $shown);
                                    for ($i = 0; $i < $empty; $i++):
                                        $pos = $shown + $i + 1;
                                ?>
                                    <tr class="lb-empty-row">
                                        <td class="px-4">
                                            <span class="badge rounded-pill fs-6" style="background-color: #fff1db; color: #333; border: 1.5px solid #e8c99a;">
                                                <?php echo $pos; ?>
                                            </span>
                                        </td>
                                        <td><span class="text-muted">-</span></td>
                                        <td>
                                            <span class="text-muted fw-semibold">
                                                <i class="bi bi-stopwatch me-1"></i>0:00
                                            </span>
                                        </td>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
</div>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap');

    @font-face {
        font-family: 'Valentine Season';
        src: url('fonts/valentine%20season.ttf') format('truetype');
    }

    /* --- Layout --- */
    .hero-section {
        flex: 1;
        background-image: url('image.php?f=bckgrd_bois.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding: 0 !important;
        width: 100%;
        display: flex;
        flex-direction: column;
        margin-bottom:auto;
    }

    .lb-wrapper {
        width: 80%;
        margin: 0 auto;
        background-color: #fae4c1;
        padding: 2rem 2rem 3rem;
        flex: 1;
    }

    h1 {
        color: #000;
        font-family: 'Montserrat semibold', sans-serif;
        font-weight: 700;
        font-size: 30px;
        text-align: center;
        letter-spacing: 0.15em;
    }

    p.legende {
        color: #000;
        font-family: 'Montserrat regular', sans-serif;

        font-size: 24px;
        text-align: center;

    }

    /* --- Nav tabs --- */
    #leaderboardTabs {
        border-bottom: none !important;
        gap: 6px;
    }
    #leaderboardTabs .nav-link {
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        font-size: 16px;
        width: 169px;
        height: 36px;
        border: 1px solid #cf5858;
        border-bottom: none;
        border-radius: 10px 10px 0 0;
        background: transparent;
        color: #cf5858;
        margin: 0;
        padding: 0 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #leaderboardTabs .nav-link.active {
        background: #a82a2a;
        color: #fff1db;
        border-color: #a82a2a;
    }
    #leaderboardTabs .nav-link:hover:not(.active) {
        background: rgba(168, 42, 42, 0.08);
    }

    /* --- Table --- */
    .table {
        width: 100%;
        margin: 0 auto;
        margin-bottom: 0;
        border-radius: 20px;
    }
    .lb-card {
        width: 80%;
        margin: 0 auto;
        border: 2px solid #a82a2a !important;
        border-radius: 0;
        overflow: hidden;
        background: transparent;
    }
    .lb-thead th {
        background-color: #a82a2a;
        color: #fff1db;
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        font-size: 16px;
        letter-spacing: 0.05em;
        border: none;
        height: 48px;
        vertical-align: middle;
    }
    .lb-card tbody tr {
        border-bottom: 1px solid #a82a2a;
        height: 46px;
        vertical-align: middle;
    }
    .lb-card tbody tr:last-child {
        border-bottom: none;
    }
    .lb-card tbody tr:nth-child(odd) td {
        background-color: #fae4c1 !important;
        --bs-table-bg: #fae4c1;
    }
    .lb-card tbody tr:nth-child(even) td {
        background-color: #fff1db !important;
        --bs-table-bg: #fff1db;
    }
    .lb-card tbody tr:hover td {
        background-color: #f5d9b0 !important;
        --bs-table-bg: #f5d9b0;
    }
    /* Top 3 : Semibold */
    .lb-card tbody tr:nth-child(-n+3) td {
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        font-size: 16px;
        color: #000;
    }
    /* Ranks 4+ : Regular */
    .lb-card tbody tr:nth-child(n+4) td {
        font-family: 'Montserrat', sans-serif;
        font-weight: 400;
        font-size: 16px;
        color: #000;
    }

    .btn:hover {
        background-color: #a82a2a !important;
        color: #fff !important;
    }

    .fw-semibold {
        color: black;
                                    }
</style>