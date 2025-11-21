<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sewa Kendaraan</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="top-decoration"></div>

    <div class="container">
        <div class="glass-card">
            
            <?php 
            $activePage     = isset($_GET['page']) ? $_GET['page'] : 'vehicle';
            $styleActive    = "background: var(--accent-color); color: white; box-shadow: 0 4px 10px rgba(108, 92, 231, 0.3);";
            $styleInactive  = "background: rgba(255,255,255,0.5); color: var(--text-main);";
            ?>

            <div style="margin-bottom: 30px; display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 20px;">
                <a href="index.php?page=armada" class="btn" style="<?= $activePage == 'armada' ? $styleActive : $styleInactive ?>">Data Kendaraan</a>
                <a href="index.php?page=pesan_masuk" class="btn" style="<?= $activePage == 'pesan_masuk' ? $styleActive : $styleInactive ?>">Pesan Masuk</a>
            </div>

            <?php require $view; ?>
            
        </div>
    </div>
</body>
</html>