<?php
function predikat(float $nilai): string {
    if ($nilai >= 90) return "A";
    if ($nilai >= 80) return "B";
    if ($nilai >= 75) return "C";
    return "D";
}

$nama  = trim($_POST["nama"] ?? "");
$input = [
    "Matematika"       => $_POST["n1"] ?? "",
    "Bahasa Indonesia" => $_POST["n2"] ?? "",
    "Pemrograman"      => $_POST["n3"] ?? "",
];

$error = [];
if ($nama === "") {
    $error[] = "Nama tidak boleh kosong.";
}
foreach ($input as $mapel => $n) {
    if (!is_numeric($n) || $n < 0 || $n > 100) {
        $error[] = "Nilai $mapel harus berupa angka 0 sampai 100.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Hasil Nilai</title></head>
<body>
<?php if ($error): ?>
    <h2>Terjadi Kesalahan</h2>
    <ul>
        <?php foreach ($error as $e): ?>
            <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="form_nilai.html">Kembali</a>
<?php else:
    $rata   = array_sum($input) / count($input);
    $status = $rata >= 75 ? "Lulus" : "Remedial";
?>
    <h2>Hasil untuk <?= htmlspecialchars($nama) ?></h2>
    <p>Rata-rata: <?= number_format($rata, 2) ?></p>
    <p>Predikat: <?= predikat($rata) ?></p>
    <p>Status: <?= $status ?></p>
    <a href="form_nilai.html">Hitung lagi</a>
<?php endif; ?>
</body>
</html>