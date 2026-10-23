<?php
class Siswa {
    public string $nama;
    public string $kelas;
    private float $nilai;

    public function __construct(string $nama, string $kelas, float $nilai) {
        $this->nama  = $nama;
        $this->kelas = $kelas;
        $this->nilai = $nilai;
    }

    public function getNilai(): float {
        return $this->nilai;
    }

    public function predikat(): string {
        if ($this->nilai >= 90) return "A";
        if ($this->nilai >= 80) return "B";
        if ($this->nilai >= 75) return "C";
        return "D";
    }

    public function lulus(): bool {
        return $this->nilai >= 75;
    }
}

// Tantangan: pewarisan
class SiswaBerprestasi extends Siswa {
    public function beasiswa(): string {
        return $this->getNilai() >= 90
            ? "Berhak menerima beasiswa"
            : "Belum memenuhi syarat beasiswa";
    }
}

$daftar = [
    new Siswa("Fikri", "11 RPL 1", 85),
    new Siswa("Rizky", "11 RPL 1", 72),
    new Siswa("Dwiki", "11 RPL 2", 78),
    new Siswa("Nur", "11 RPL 2", 60),
    new Siswa("Raffa", "11 RPL 1", 92),
];
$berprestasi = new SiswaBerprestasi("Fani", "11 RPL 2", 95);
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Class Siswa</title></head>
<body>
<h2>Daftar Siswa</h2>
<table border="1" cellpadding="6" cellspacing="0">
    <tr><th>No</th><th>Nama</th><th>Kelas</th><th>Nilai</th><th>Predikat</th><th>Status</th></tr>
    <?php foreach ($daftar as $i => $s): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= htmlspecialchars($s->nama) ?></td>
            <td><?= htmlspecialchars($s->kelas) ?></td>
            <td><?= $s->getNilai() ?></td>
            <td><?= $s->predikat() ?></td>
            <td><?= $s->lulus() ? "Lulus" : "Remedial" ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Tantangan: SiswaBerprestasi</h2>
<p><?= htmlspecialchars($berprestasi->nama) ?> (nilai <?= $berprestasi->getNilai() ?>):
   <?= $berprestasi->beasiswa() ?></p>
</body>
</html>