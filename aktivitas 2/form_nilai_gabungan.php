<?php
function predikat(float $nilai): string {
    if ($nilai >= 90) return "A";
    if ($nilai >= 80) return "B";
    if ($nilai >= 75) return "C";
    return "D";
}

$nama = "";
$n = ["", "", ""];
$error = [];
$hasil = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $n = [$_POST["n1"] ?? "", $_POST["n2"] ?? "", $_POST["n3"] ?? ""];

    if ($nama === "") $error[] = "Nama tidak boleh kosong.";
    foreach ($n as $i => $v) {
        if (!is_numeric($v) || $v < 0 || $v > 100) {
            $error[] = "Nilai ke-" . ($i + 1) . " harus angka 0 sampai 100.";
        }
    }
    if (!$error) {
        $rata = array_sum($n) / count($n);
        $hasil = [
            "rata" => $rata,
            "predikat" => predikat($rata),
            "status" => $rata >= 75 ? "Lulus" : "Remedial",
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Kalkulator Nilai</title></head>
<body>
<h2>Kalkulator Nilai</h2>

<?php if ($error): ?>
    <ul style="color:red">
        <?php foreach ($error as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <p>Nama: <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>"></p>
    <p>Nilai 1: <input type="text" name="n1" value="<?= htmlspecialchars($n[0]) ?>"></p>
    <p>Nilai 2: <input type="text" name="n2" value="<?= htmlspecialchars($n[1]) ?>"></p>
    <p>Nilai 3: <input type="text" name="n3" value="<?= htmlspecialchars($n[2]) ?>"></p>
    <button type="submit">Hitung</button>
</form>

<?php if ($hasil): ?>
    <h3>Hasil untuk <?= htmlspecialchars($nama) ?></h3>
    <p>Rata-rata: <?= number_format($hasil["rata"], 2) ?></p>
    <p>Predikat: <?= $hasil["predikat"] ?></p>
    <p>Status: <?= $hasil["status"] ?></p>
<?php endif; ?>
</body>
</html>