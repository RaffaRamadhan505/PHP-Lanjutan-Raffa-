<?php $halaman = basename($_SERVER["PHP_SELF"]); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($judul ?? "Website Mini") ?></title>
    <style>
        body { font-family: sans-serif; margin: 0; }
        nav { background: #2c3e50; padding: 12px; }
        nav a { color: #ecf0f1; margin-right: 16px; text-decoration: none; }
        nav a.aktif { color: #f1c40f; font-weight: bold; border-bottom: 2px solid #f1c40f; }
        main { padding: 20px; }
        footer { background: #ecf0f1; padding: 12px; text-align: center; }
    </style>
</head>
<body>
<nav>
    <a href="index.php"  class="<?= $halaman === 'index.php'  ? 'aktif' : '' ?>">Beranda</a>
    <a href="profil.php" class="<?= $halaman === 'profil.php' ? 'aktif' : '' ?>">Profil</a>
    <a href="kontak.php" class="<?= $halaman === 'kontak.php' ? 'aktif' : '' ?>">Kontak</a>
</nav>
<main></main>