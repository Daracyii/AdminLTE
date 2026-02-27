<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    mysqli_query($koneksi, "INSERT INTO barang VALUES (
        '',
        '$_POST[nama]',
        '$_POST[jumlah]',
        '$_POST[harga]',
        '$_POST[tanggal]'
    )");

    header("location:index.php");
}
?>

<!doctype html>
<html>
<head>
<title>Tambah Data</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
<h2>Tambah Data Barang</h2>

<form method="POST">
<input type="text" name="nama" class="form-control mb-2" placeholder="Nama Barang" required>
<input type="number" name="jumlah" class="form-control mb-2" placeholder="Jumlah" required>
<input type="number" name="harga" class="form-control mb-2" placeholder="Harga" required>
<input type="date" name="tanggal" class="form-control mb-2" required>

<button name="simpan" class="btn btn-primary">Simpan</button>
<a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
</div>
</body>
</html>
