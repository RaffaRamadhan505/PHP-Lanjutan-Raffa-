<?php
$siswa = [
    ["nama" => "Fikri",  "kelas" => "11 RPL 1", "nilai" => 85],
    ["nama" => "Naufal",  "kelas" => "11 RPL 1", "nilai" => 90],
    ["nama" => "Nur", "kelas" => "11 RPL 2", "nilai" => 72],
    ["nama" => "Fitri",  "kelas" => "11 RPL 2", "nilai" => 68],
    ["nama" => "Ridho",   "kelas" => "11 RPL 1", "nilai" => 78],
    ["nama" => "Raffa",  "kelas" => "11 RPL 2", "nilai" => 95],
];

function tampilTabel(array $data): void {
    echo "<table border='1' cellpadding='6' cellspacing='0'>";
    echo "<tr><th>No</th><th>Nama</th><th>Kelas</th><th>Nilai</th></tr>";
    foreach ($data as $i => $s) {
        echo "<tr><td>" . ($i + 1) . "</td>";
        echo "<td>" . htmlspecialchars($s["nama"]) . "</td>";
        echo "<td>" . htmlspecialchars($s["kelas"]) . "</td>";
        echo "<td>" . $s["nilai"] . "</td></tr>";
    }
    echo "</table>";
}

// 2. Rata-rata
$semuaNilai = array_column($siswa, "nilai");
$rata = array_sum($semuaNilai) / count($semuaNilai);

// 3. Tertinggi & terendah
$maks = max($semuaNilai);
$min  = min($semuaNilai);
$namaMaks = $siswa[array_search($maks, $semuaNilai)]["nama"];
$namaMin  = $siswa[array_search($min, $semuaNilai)]["nama"];

// 4. Nilai di bawah 75
$remedial = array_values(array_filter($siswa, fn($s) => $s["nilai"] < 75));

// 5. Urut dari nilai tertinggi
$urut = $siswa;
usort($urut, fn($a, $b) => $b["nilai"] <=> $a["nilai"]);
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Daftar Siswa</title></head>
<body>
<h2>1. Semua Siswa</h2>
<?php tampilTabel($siswa); ?>

<h2>2. Rata-rata Nilai Kelas</h2>
<p><?= number_format($rata, 2) ?></p>

<h2>3. Nilai Tertinggi dan Terendah</h2>
<p>Tertinggi: <?= htmlspecialchars($namaMaks) ?> (<?= $maks ?>)</p>
<p>Terendah: <?= htmlspecialchars($namaMin) ?> (<?= $min ?>)</p>

<h2>4. Siswa dengan Nilai di Bawah 75</h2>
<?php tampilTabel($remedial); ?>

<h2>5. Tantangan: Urut dari Nilai Tertinggi</h2>
<?php tampilTabel($urut); ?>
</body>
</html>