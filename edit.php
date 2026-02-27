<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    mysqli_query($koneksi, "UPDATE barang SET
        nama='$_POST[nama]',
        jumlah='$_POST[jumlah]',
        harga='$_POST[harga]',
        tanggal='$_POST[tanggal]'
        WHERE id='$id'
    ");

    header("location:index.php");
}
?>

<!doctype html>
<html>
<head>
<title>Edit Data</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
<h2>Edit Data Barang</h2>

<form method="POST">
<input type="text" name="nama" class="form-control mb-2" value="<?= $row['nama'] ?>" required>
<input type="number" name="jumlah" class="form-control mb-2" value="<?= $row['jumlah'] ?>" required>
<input type="number" name="harga" class="form-control mb-2" value="<?= $row['harga'] ?>" required>
<input type="date" name="tanggal" class="form-control mb-2" value="<?= $row['tanggal'] ?>" required>

<button name="update" class="btn btn-primary">Update</button>
<a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
</div>
</body>
</html>
